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
            display: inline-block;
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
            background: #119c0a;
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
            border-bottom: 2px solid #119c0a;
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
                                        <a class="new-a" href="controller/home.php">หน้าหลัก</a>
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
                                            <li class="menu-item dropdownWit">
                                                <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                                <div class="dropdown-contentWit">
                                                    <a class="new-a" href="controller/allproject.php">โครงงานทั้งหมด</a>
                                                    <a class="new-a" href="controller/myproject.php">โครงงานของตนเอง</a>
                                                </div>
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
                                <li class="menu-item"><a data-target="#myModal" data-toggle="modal" style="cursor: pointer">เข้าสู่ระบบ</a></li>
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
                                        $img = "images/mainpic.jpg";
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
        $("#user").keydown(function (e) {
            console.log(e['key'].charCodeAt(0));
        });
    });
</script>


</body>

</html>
