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
                    "titleWall"=>$obResult['titleWall'],
                    "status"=>$obResult['status']);
                array_push($resultArray,$arrCol);
            }
            return $resultArray;
        }

        $wall = getWallProject();

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
                    <img src="images/logo.png" alt="" class="logo">
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
                                <p><?=$wall[$wall_c]['titleWall']?></p>
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
                <h2 class="section-title">Latest News</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="post">
                            <figure class="featured-image"><img src="images/news-1.jpg" alt=""></figure>
                            <h2 class="entry-title"><a href="">Magni dolores rationale</a></h2>
                            <small class="date">2 oct 2014</small>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post">
                            <figure class="featured-image"><img src="images/news-2.jpg" alt=""></figure>
                            <h2 class="entry-title"><a href="">Perspiciatis unde omnus</a></h2>
                            <small class="date">2 oct 2014</small>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post">
                            <figure class="featured-image"><img src="images/news-3.jpg" alt=""></figure>
                            <h2 class="entry-title"><a href="">Voluptatem laundantium  totam</a></h2>
                            <small class="date">2 oct 2014</small>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium...</p>
                        </div>
                    </div>
                </div> <!-- .row -->
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="controller/home.php" method="post">
                    <input type="text" id="user" name="user" placeholder="ชื่อผู้ใช้"/>
                    <br/>
                    <br/>
                    <input type="password" id="pass" name="pass" placeholder="รหัสผ่าน"/>
                    <br/>
                    <br/>
                    <input type="submit" name="login" id="login" value="Login"/>
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
