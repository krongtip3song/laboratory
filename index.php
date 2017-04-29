<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/3/2560
 * Time: 23:31
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Science Labs</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

    <style>
        a:hover{
            text-decoration: none;
        }
        .dropdown-menu{
            background:#fff !important;
            right: 0px;
            left: auto;
        }
        .navbar-login
        {
            width: 350px;
            padding: 10px;
            padding-bottom: 0px;
        }
    </style>

    <style>
        .dropbtnWit {
            background-color: white;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .dropdownWit {
            position: relative;
        }
        .dropdown-contentWit {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
        }

        .dropdown-contentWit a {
            color: black;
            text-decoration: none;
            display: block;
        }
        .dropdown-contentWit a:hover {background-color: #f1f1f1}

        .dropdownWit:hover .dropdown-contentWit {
            display: block;
        }
        .dropdownWit:hover .dropbtnWit {
            background-color: aliceblue;
        }
        li.menu-item.dropdownWit div.dropdown-contentWit a.new-a{
            padding: 10px 10px;
            text-decoration: none;
            padding-left: 20px;
        }
        .post .featured-image img {
            width: 300px;
            height: 250px;
        }
        .banner{
            background: seagreen;
            position: absolute;
            z-index: 100;
            padding-right: 15px;
            width: 100%;
            color: white;
            line-height: 18px;
            font-weight: normal;
            font-size: 0.9em;
            text-align: right;
            text-transform: uppercase;
            height: 18px;
        }
        .name_pro{
            margin-top: 30px;
            padding: 0 15px;
            overflow: hidden;
            color: black;
            font-size: 1em;
        }
        .post{
            z-index: 10;
            box-shadow: -5px -5px #c2c2c2;
            border: 1px solid #dbdbdb;
            border-bottom: 2px solid mediumseagreen;
        }
        .date{
            padding: 0 15px;
            overflow: hidden;
            color: #999999;
        }
        .btn-more{
            padding: 10px 20px;
            text-align: center;
            background-color: #4798ff;
            color: white;
            border-radius: 2px;
        }
        .btn-more:hover{
            color: white;
            background-color: #4489ec;
        }
    </style>
    <?php

        include ("config.inc.php");
        include ("class/Member.class.php");
        session_start();

        //-----------------------------------------------------------------------------

        $counter_name = "counter.txt";
        // Check if a text file exists. If not create one and initialize it to zero.
        if (!file_exists($counter_name)) {
            $f = fopen($counter_name, "w");
            fwrite($f,"0");
            fclose($f);
        }
        // Read the current value of our counter file
        $f = fopen($counter_name,"r");
        $counterVal = fread($f, filesize($counter_name));
        fclose($f);
        // Has visitor been counted in this session?
        // If not, increase counter value by one
        if(!isset($_SESSION['hasVisited'])){
            $_SESSION['hasVisited']="yes";
            $counterVal++;
            $f = fopen($counter_name, "w");
            fwrite($f, $counterVal);
            fclose($f);
        }
        $conn->query("UPDATE visitor SET num='$counterVal'");

        //-----------------------------------------------------------------------------

        function getWallProject(){
            global $conn;
            $sql = "SELECT * FROM project INNER JOIN wall_index ON project.id_project=wall_index.id_project WHERE status=1";
            $res = $conn->query($sql);
            $resultArray = array();
            while($obResult = $res->fetch(PDO::FETCH_ASSOC))
            {
                $arrCol = array();
                $arrCol = array("id_project"=>$obResult['id_project'],
                    "title"=>$obResult['title'],
                    "description"=>$obResult['description'],
                    "date_Published"=>$obResult['date_Published'],
                    "date_Occurred"=>$obResult['date_Occurred'],
                    "id_category"=>$obResult['id_category'],
                    "id_wall"=>$obResult['id_wall'],
                    "path_wall"=>$obResult['path_wall'],
                    "status"=>$obResult['status']);
                array_push($resultArray,$arrCol);
            }
            return $resultArray;
        }
        function getLastProject(){
            global $conn;
            $sql = "SELECT * FROM project INNER JOIN category ON project.id_category = category.id_category ORDER BY date_Published DESC LIMIT 8";
            $res = $conn->query($sql);
            $resultArray = array();
            while($obResult = $res->fetch(PDO::FETCH_ASSOC))
            {
                $arrCol = array();
                $arrCol = array("id_project"=>$obResult['id_project'],
                    "title"=>$obResult['title'],
                    "description"=>$obResult['description'],
                    "date_Published"=>$obResult['date_Published'],
                    "date_Occurred"=>$obResult['date_Occurred'],
                    "id_category"=>$obResult['id_category'],
                    "name_category"=>$obResult['name_category']);
                array_push($resultArray,$arrCol);
            }
            return $resultArray;
        }
        function getMainPicProject($id){
            global $conn;
            $sql = "SELECT * FROM wall_index WHERE id_project='$id' ORDER BY id_wall DESC LIMIT 1";
            $res = $conn->query($sql);
            $resultArray = array();
            if($obResult = $res->fetch(PDO::FETCH_ASSOC))
            {
                $arrCol = array();
                $arrCol = array("id_wall"=>$obResult['id_wall'],
                    "id_project"=>$obResult['id_project'],
                    "path_wall"=>$obResult['path_wall'],
                    "status"=>$obResult['status']);
                array_push($resultArray,$arrCol);
                return $resultArray[0]['path_wall'];
            }
            return null;
        }

        $wall = getWallProject();
        $last_pro = getLastProject();

        if(isset($_SESSION["user"])){
            $person = $_SESSION["user"];
            $type_user = $person->getType();
        }
    ?>
</head>


<body>

<div class="site-content">
    <header class="site-header collapsed-nav" data-bg-image="">
        <div class="container">
            <div class="header-bar">
                <a href="index.php" class="branding">
                    <img src="images/chip_sm.png" alt="" class="logo">
                    <div class="logo-type">
                        <h1 class="site-title">Technology Laboratory</h1>
                        <small class="site-description">Tagline goes here</small>
                    </div>
                </a>

                <nav class="main-navigation">
                    <button class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <?php
                            if(isset($_SESSION["user"])) {
                                if($type_user == "ADMIN"){
                                    ?>
                                    <li class="menu-item">
                                        <a class="new-a" href="index.php">หน้าหลักผู้ใช้ทั่วไป</a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="new-a" href="controller/home.php">หน้าหลักผู้ดูแลระบบ</a>
                                    </li>

                                    <li class="menu-item dropdownWit">
                                        <a class="dropbtnWit">จัดการผู้ใช้ <span class="glyphicon glyphicon-chevron-down"></span></a>
                                        <div class="dropdown-contentWit">
                                            <a class="new-a" href="controller/datauser.php">แก้ไขข้อมูลผู้ใช้</a>
                                            <a class="new-a" href="controller/adduser.php">เพิ่มผู้ใช้</a>
                                            <a class="new-a" href="controller/submituser.php">ยืนยันผู้ใช้</a>
                                        </div>
                                    </li>
                                    <li class="menu-item dropdownWit">
                                        <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                        <div class="dropdown-contentWit">
                                            <a class="new-a" href="controller/allproject.php">โครงงานทั้งหมด</a>
                                            <a class="new-a" href="controller/createproject.php">สร้างโครงงาน</a>
                                            <a class="new-a" href="controller/category.php">หมวดหมู่โครงงาน</a>
                                        </div>
                                    </li>
                                    <li class="menu-item">
                                        <a class='menu_th' href="controller/managehome.php">จัดการหน้าแรก</a>
                                    </li>
                                    <?php
                                }
                                else{
                                    if($type_user == "TEACHER") {
                                        ?>
                                        <li class="menu-item">
                                            <a class="new-a" href="index.php">หน้าหลัก</a>
                                        </li>
                                        <li class="menu-item dropdownWit">
                                            <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                            <div class="dropdown-contentWit">
                                                <a class="new-a" href="controller/allproject.php">โครงงานทั้งหมด</a>
                                                <a class="new-a" href="controller/myproject.php">โครงงานของตนเอง</a>
                                                <a class="new-a" href="controller/createproject.php">สร้างโครงงาน</a>
                                            </div>
                                        </li>
                                        <li class="menu-item">
                                            <a class='menu_th' href="controller/submituser.php">ยืนยันผู้ใช้</a>
                                        </li>
                                        <?php
                                    }else{
                                        if($type_user == "STUDENT"){
                                            ?>
                                            <li class="menu-item">
                                                <a class="new-a" href="index.php">หน้าหลัก</a>
                                            </li>
                                            <li class="menu-item">
                                                <a class="new-a" href="controller/allproject.php">โครงงานทั้งหมด</a>
                                            </li>
                                            <li class="menu-item">
                                                <a class="new-a" href="controller/myproject.php">โครงงานของตนเอง</a>
                                            </li>
                                            <?php
                                        }
                                }}
                        ?>

                                <li class="menu-item dropdownWit">
                                    <a class="dropbtnWit"><strong><?=$person?></strong><span class="glyphicon glyphicon-chevron-down"></span></a>
                                    <div class="dropdown-contentWit">
                                        <a class="new-a" href="controller/profile.php?id=<?=$person->getId()?>">โปรไฟล์</a>
                                        <a class="new-a" href="controller/home.php?logout=1">ออกจากระบบ</a>
                                    </div>
                                </li>
                        <?php
                            }
                            else
                            {
                        ?>
                                <li class="home menu-item current-menu-item"><a href="index.php"><img src="images/home-icon.png" alt="Home"></a></li>
                                <li class="menu-item"><a href="controller/allproject.php">โครงงานทั้งหมด</a></li>
                                <li class="menu-item"><a href="view/about.php">เกี่ยวกับ</a></li>
                                <li class="menu-item"><a data-target="#myModal-register" data-toggle="modal" style="cursor: pointer">สมัครสมาชิก</a></li>
                                <li class="menu-item"><a data-target="#myModal-login" data-toggle="modal" style="cursor: pointer">เข้าสู่ระบบ</a></li>
                        <?php
                            }
                        ?>

                    </ul>
                </nav>

                <div class="mobile-navigation"></div>
            </div>
        </div>
    </header>

    <div class="hero">
        <ul class="slides">
            <?php
                for($wall_c = 0;$wall_c<count($wall);$wall_c++) {
                    ?>
                    <li data-bg-image="<?=$wall[$wall_c]['path_wall']?>">
                        <div class="container">
                            <div class="slide-content">
                                <h2 class="slide-title"><?=$wall[$wall_c]['title']?></h2>
                                <a href="controller/project.php?id=<?=$wall[$wall_c]['id_project']?>" class="button">See details</a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>

    <main class="main-content">


        <div class="fullwidth-block" data-bg-color="#edf2f4">
            <div class="container">
                <div style="width:100%;display:inline-block;">
                    <h2 style="float: left" class="section-title">Latest Project</h2>
                    <a href="controller/allproject.php" style="float: right" class="btn-more">เพิ่มเติม</a>
                </div>
                <?php
                for($l_pro = 0;$l_pro<count($last_pro);$l_pro++) {
                    if($l_pro%4==0){
                        echo "<div class=\"row\">";
                    }
                    ?>
                        <div class="col-md-3">
                            <a href="controller/project.php?id=<?=$last_pro[$l_pro]['id_project']?>">
                                <div class="post" style="background-color: white">
                                    <?php
                                    $img = getMainPicProject($last_pro[$l_pro]['id_project']);
                                    if($img == null){
                                        $img = "images/ON40SA0.jpg";
                                    }
                                    ?>
                                    <div><img src="<?=$img?>" alt="" width="100%" height="200px"></div>
                                    <div class="banner"><?=$last_pro[$l_pro]['name_category']?></div>
                                    <div class="name_pro">
                                        <h2 class="entry-title"><?=$last_pro[$l_pro]['title']?></h2>
                                    </div>
                                    <div>
                                        <small class="date"><?=date("d F Y",strtotime($last_pro[$l_pro]['date_Occurred']))?></small>
                                    </div>


                                </div>
                            </a>
                        </div>
                    <?php
                    if($l_pro%4==3){
                        echo "</div>";
                    }
                }
                ?>
            </div> <!-- .container -->
        </div> <!-- .fullwidth-block -->

    </main> <!-- .main-content -->

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget">
                        <h3 class="widget-title">Our address</h3>
                        <strong>Technology Laboratory</strong>
                        <address>ภาควิชาวิศวกรรมคอมพิวเตอร์ อาคาร 8 คณะวิศวกรรมศาสตร์ กำแพงแสน มหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตกำแพงแสน อ.กำแพงแสน จ.นครปฐม 73140</address>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="widget">
                        <h3 class="widget-title">Social media</h3>
                        <div class="social-links">
                            <p>โทรศัพท์: 034-281074 ต่อ 7523 หรือ 099-6954159 | โทรสาร: 099-6954159 | </br>ติดต่อผู้ดูแลระบบ : fengsstc@ku.ac.th</p>
                            <a href="https://www.facebook.com/cpe.eng.kps/" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->

            <p class="colophon">copyright 2014 Company name. Designed by <a href="http://www.vandelaydesign.com/" title="Designed by VandelayDesign.com" target="_blank">VandelayDesign.com</a>. All rights reserved</p>
        </div> <!-- .container -->
    </footer>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="width: 400px">
    </div>
</div>
<!-- Modal Login-->
<div class="modal fade" id="myModal-login" role="dialog">
    <div class="modal-dialog" style="width: 400px">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body" align="center" style="margin: 0px 20px 0px 20px">
                <form action="controller/home.php" method="post">
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                        <input class="form-control" type="text" id="user" name="user" placeholder="ชื่อผู้ใช้"/>
                    </div>
                    <br/>
                    <br/>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control" type="password" id="pass" name="pass" placeholder="รหัสผ่าน"/>
                    </div>
                    <br/>
                    <br/>
                    <input type="submit" name="login" id="login" value="Login" style="width: 100%"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Register-->
<div class="modal fade" id="myModal-register" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <div class="modal-body" align="center">
                <form id ="register" method="post" name="register" enctype="multipart/form-data" action="model/register.php">
                    <table>
                        <tr>
                            <td><label for="username" style="color: darkviolet">Username</label></td>
                            <td><input type="text" class="form-control" name="username" id="username" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="password" style="color: navy">Password</label></td>
                            <td><input type="text" class="form-control" name="password" id="password" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="name" style="color: deepskyblue">Name</label></td>
                            <td><input type="text" class="form-control" name="name" id="name" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="surname" style="color: greenyellow">Surname</label></td>
                            <td><input type="text" class="form-control" name="surname" id="surname" maxlength="20"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="tel" style="color: yellow">Tel. No.</label></td>
                            <td><input type="text" class="form-control" name="tel" id="tel" minlength="9" maxlength="10"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="email" style="color: orange">E-mail</label></td>
                            <td><input type="text" class="form-control" name="email" id="email" maxlength="50"/><br/></td>
                        </tr>
                        <tr>
                            <td><label for="picture" style="color: orange">Picture</label></td>
                            <script>
                                var a;
                                function showpic(pic) {
                                        check_pic();
                                        if(a != 1) {
                                            if (pic.files && pic.files[0]) {
                                                var readpic = new FileReader();
                                                readpic.onload = function (e) {
                                                    $('#picture')
                                                        .attr('src', e.target.result)
                                                        .width(150)
                                                        .height(200);
                                                };
                                                readpic.readAsDataURL(pic.files[0]);
                                                $("#pic_chk").css("display", "none");
                                                $("#picture").css("display", "inline");
                                            }
                                        }
                                }

                                function check_pic() {
                                    var type_file = document.getElementById('pic').value;
                                    var length_file = document.getElementById('pic').value.length;
                                    /*if(length_file == 0){
                                        alert('กรุณาเลือกรูปด้วยจ้า');
                                        document.getElementById('pic_id').innerHTML="";
                                        $("#picture").css("display","none");
                                        return false;*/
                                    if(length_file != 0) {
                                        if (type_file.substring(type_file.lastIndexOf('.') + 1, length_file) != "jpg" &&
                                            type_file.substring(type_file.lastIndexOf('.') + 1, length_file) != "gif" &&
                                            type_file.substring(type_file.lastIndexOf('.') + 1, length_file) != "PNG") {
                                            alert('เลือกเฉพาะไฟล์นามสกุล jpg / gif / png เท่านั้นจ้า');
                                            $("#pic").val("");
                                            $("#pic").click();
                                            document.getElementById('pic_id').innerHTML = "";
                                            $("#picture").css("display", "none");
                                            a = 1;
                                            return a;
                                        } else {
                                            a = 2;
                                            return a;
                                        }
                                    }
                                }
                            </script>
                            <span id="pic_id"></span>
                            <td><input type="file" id="pic" name="pic" style="border: 0" onchange="showpic(this)"/></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: left"><label id="pic_chk" style="display: none; color: red;">ได้โปรดเลือกรูปด้วยเถอะนะขอรับ</label><br/></td>
                        </tr>
                    </table>
                    <br/>
                    <img id="picture" class="btn" name="picture" src="#" alt="your picture" style="display: none"/>
                    <br/>
                    <input type="submit" class="btn btn-success" name="regis" id="regis" value="ยืนยัน"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#login").click(function () {
            var user = $("#user").val();
            var pass = $("#pass").val();
            if(user == "" || pass == ""){
                if(user == ""){
                    $("#user").css("border","1px solid red");
                }
                else{
                    $("#user").css("border","1px solid #ccc");
                }
                if(pass == ""){
                    $("#pass").css("border","1px solid red");
                }
                else{
                    $("#pass").css("border","1px solid #ccc");
                }
                return false;
            }
        });
        $("#regis").click(function () {
            var user = $("#username").val();
            var pass = $("#password").val();
            var name = $("#name").val();
            var surname = $("#surname").val();
            var tel = $("#tel").val();
            var email = $("#email").val();
            var type = document.register.pic.value;
            if(user == "" || pass == "" || name == "" || surname == "" || tel == "" || email == "" || type == ""){
                alert("กรุณากรอกข้อมูลให้ครบ");
                if (user == "") {
                    $("#username").css("border", "1px solid red");
                }
                else {
                    $("#username").css("border", "1px solid #ccc");
                }
                if (pass == "") {
                    $("#password").css("border", "1px solid red");
                }
                else {
                    $("#password").css("border", "1px solid #ccc");
                }
                if (name == "") {
                    $("#name").css("border", "1px solid red");
                }
                else {
                    $("#name").css("border", "1px solid #ccc");
                }
                if (surname == "") {
                    $("#surname").css("border", "1px solid red");
                }
                else {
                    $("#surname").css("border", "1px solid #ccc");
                }
                if (tel == "") {
                    $("#tel").css("border", "1px solid red");
                }
                else {
                    $("#tel").css("border", "1px solid #ccc");
                }
                if (email == "") {
                    $("#email").css("border", "1px solid red");
                }
                else {
                    $("#email").css("border", "1px solid #ccc");
                }
                if (type == "") {
                    $("#pic_chk").css("display","inline");
                }
                else {
                    $("#pic_chk").css("display","none");
                }
                return false;
            }
        });
        $("#tel").keydown(function (e) {
            var tel_chk = e['key'].charCodeAt(0);
            console.log(tel_chk);
            if(tel_chk != 66){
                if(tel_chk < 48 || tel_chk > 57){
                    if(tel_chk < 84 || tel_chk > 84) {
                        alert("กรอกเฉพาะตัวเลขนะจ๊");
                        return false;
                    }
                }
            }
        });
        $("#name").keydown(function (e) {
            var name_chk = e['key'].charCodeAt(0);
            console.log(name_chk);
            if(name_chk != 66) {
                if (name_chk < 65 || name_chk > 90) {
                    if(name_chk < 97 || name_chk > 122) {
                        if(name_chk < 161 || name_chk > 206) {
                            if(name_chk < 3585 || name_chk > 3630) {
                                if(name_chk < 3632 || name_chk > 3641) {
                                    if(name_chk < 3648 || name_chk > 3661) {
                                        alert("ห้าม!!กรอกตัวอักษรพิเศษหรือตัวเลขสิ");
                                        return false;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
        $("#surname").keydown(function (e) {
            var sname_chk = e['key'].charCodeAt(0);
            console.log(sname_chk);
            if(sname_chk != 66) {
                if (sname_chk < 65 || sname_chk > 90) {
                    if(sname_chk < 97 || sname_chk > 122) {
                        if(sname_chk < 161 || sname_chk > 206) {
                            if(sname_chk < 3585 || sname_chk > 3630) {
                                if(sname_chk < 3632 || sname_chk > 3641) {
                                    if(sname_chk < 3648 || sname_chk > 3661) {
                                        alert("ห้าม!!กรอกตัวอักษรพิเศษหรือตัวเลขสิ");
                                        return false;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
        $("#username").keydown(function (e) {
            var id_chk = e['key'].charCodeAt(0);
            console.log(id_chk);
            if(id_chk < 48 || id_chk > 57){
                if(id_chk < 65 || id_chk > 90){
                    if(id_chk < 97 || id_chk > 122){
                        alert("กรอกได้เฉพาะตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้นครับ");
                        return false;
                    }
                }
            }
        });
        $("#password").keydown(function (e) {
            var pass_chk = e['key'].charCodeAt(0);
            console.log(pass_chk);
            if(pass_chk < 48 || pass_chk > 57){
                if(pass_chk < 65 || pass_chk > 90){
                    if(pass_chk < 97 || pass_chk > 122){
                        alert("กรอกได้เฉพาะตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้นครับ");
                        return false;
                    }
                }
            }
        });
    });
</script>
</body>
</html>
