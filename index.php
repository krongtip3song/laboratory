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
                                    <li class="dropdown menu-item">
                                        <a class='menu_th dropdown-toggle' href="#" data-toggle="dropdown">จัดการผู้ใช้
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <div class="dropdown-menu" style="padding:17px;">
                                            <div class="dropdown-content">

                                                <a class="new-a" href="controller/datauser.php">แก้ไขข้อมูลผู้ใช้</a>
                                                <a class="new-a" href="controller/adduser.php">เพิ่มผู้ใช้</a>
                                                <a class="new-a" href="controller/submituser.php">ยืนยันผู้ใช้</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown menu-item">
                                        <a class='menu_th dropdown-toggle' href="#" data-toggle="dropdown">จัดการโครงงาน
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <div class="dropdown-menu" style="padding:17px;">
                                            <div class="dropdown-content">
                                                <a class="new-a" href="controller/allproject.php">โครงงานทั้งหมด</a>
                                                <a class="new-a" href="controller/allproject.php">เพิ่มโครงงาน</a>
                                                <a class="new-a" href="controller/category.php">หมวดหมู่โครงงาน</a>
                                            </div>
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
                                        <li class="dropdown menu-item">
                                            <a class='menu_th dropdown-toggle' href="#" data-toggle="dropdown">จัดการโครงงาน
                                                <span class="glyphicon glyphicon-chevron-down"></span>
                                            </a>
                                            <div class="dropdown-menu" style="padding:17px;">
                                                <div class="dropdown-content">
                                                    <a class="new-a"
                                                       href="controller/allproject.php">โครงงานทั้งหมด</a>
                                                    <a class="new-a"
                                                       href="../controller/adduser.php">โครงงานของตนเอง</a>
                                                    <a class="new-a"
                                                       href="../controller/submituser.php">สร้างโครงงาน</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item">
                                            <a class='menu_th' href="controller/submituser.php">ยืนยันผู้ใช้</a>
                                        </li>
                                        <?php
                                    }else{
                                    echo "<li class=\"home menu-item current-menu-item\"><a href=\"index.php\"><img src=\"images/home-icon.png\" alt=\"Home\"></a></li>
                                <li class=\"menu-item\"><a href=\"about.html\">About</a></li>
                                <li class=\"menu-item\"><a href=\"projects.html\">Our projects</a></li>
                                <li class=\"menu-item\"><a href=\"contact.html\">Contact</a></li>";
                                }}
                        ?>
                                <li class="dropdown menu-item" id="menuLogin">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">
                                        <span class="glyphicon glyphicon-user"></span> 
                                        <strong><?=$person?></strong>
                                        <span class="glyphicon glyphicon-chevron-down"></span>
                                    </a>

                                    <div class="dropdown-menu" style="padding:17px;">
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span class="glyphicon glyphicon-user" style="font-size: 87px;"></span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <p class="text-left"><strong><?=$person?></strong></p>
                                                    <p class="text-left small"><?=$person->getEmail()?></p>
                                                    <form action="controller/profile.php?id=<?=$person->getId()?>" method="post" style="display: inline-block;float: left">
                                                        <input type="submit" name="profile" value="PROFILE">
                                                    </form>
                                                    <form action="controller/home.php" method="post" style="display: inline-block;float: left">
                                                        <input type="submit" name="logout" value="LOGOUT">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        <?php
                            }
                            else
                            {
                        ?>
                                <li class="home menu-item current-menu-item"><a href="index.php"><img src="images/home-icon.png" alt="Home"></a></li>
                                <li class="menu-item"><a href="about.html">About</a></li>
                                <li class="menu-item"><a href="projects.html">Our projects</a></li>
                                <li class="menu-item"><a href="contact.html">Contact</a></li>
                                <li class="menu-item"><a data-target="#myModal" data-toggle="modal" style="cursor: pointer">Sign in</a></li>
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
                                <h2 class="slide-title"><?=$wall[$wall_c]['titleWall']?></h2>
                                <p>Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi aliquip ex ea
                                    commodo consequat duis aute irure dolor in reprehenderit.</p>
                                <a href="#" class="button">See details</a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>

    <main class="main-content">
        <!--  <div class="fullwidth-block">
              <div class="container">
                  <div class="row">
                      <div class="col-md-3 col-sm-6">
                          <div class="feature">
                              <img src="images/icon-research-small.png" alt="" class="feature-image">
                              <h2 class="feature-title">Research</h2>
                              <p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
                              <a href="" class="button">Learn more</a>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="feature">
                              <img src="images/icon-medicine-small.png" alt="" class="feature-image">
                              <h2 class="feature-title">Medicice</h2>
                              <p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
                              <a href="" class="button">Learn more</a>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="feature">
                              <img src="images/icon-genetics-small.png" alt="" class="feature-image">
                              <h2 class="feature-title">Genetics</h2>
                              <p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
                              <a href="" class="button">Learn more</a>
                          </div>
                      </div>
                      <div class="col-md-3 col-sm-6">
                          <div class="feature">
                              <img src="images/icon-energy-small.png" alt="" class="feature-image">
                              <h2 class="feature-title">Energy</h2>
                              <p>Laborum et dolorum fuga harum quidem rerum facilis et expedita distinctio nam libero tempore.</p>
                              <a href="" class="button">Learn more</a>
                          </div>
                      </div>
                  </div> <!-- .row
            </div> <!-- .container
        </div> <!-- .fullwidth-block -->

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

       <!-- <div class="fullwidth-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="section-title">Our mission and vision</h2>
                        <p>Consequuntur minima, delectus quia labore sapiente maiores illo enim numquam sint? Molestias odio itaque, recusandae ut quae fuga ea tempore facere facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi cupiditate repellat velit quo, fugiat dolores eum corrupti commodi? Deserunt, adipisci sunt voluptas aliquid aliquam eos. Perspiciatis, similique atque deserunt nam.</p>
                        <p>Distinctio delectus consequuntur sed quod ipsum a, odio obcaecati neque, aliquam nostrum aliquid reprehenderit ad quae qui autem voluptate omnis quas Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime magnam amet obcaecati dolore omnis consectetur dignissimos iste cupiditate excepturi quae porro fugiat, nemo iure, minima. Fuga hic voluptate ratione, at.ullam.</p>
                    </div>
                    <div class="col-md-4">
                        <h2 class="section-title">Research summaries</h2>
                        <ul class="arrow-list has-border">
                            <li><a href="#">Praesentium voluptatum deleniti atque dolores</a></li>
                            <li><a href="#">Corrupti quos et quas molestias excepturi sint</a></li>
                            <li><a href="#">Occaecati cupiditate non provident similique sunt</a></li>
                            <li><a href="#">Nam libero tempore, cum soluta nobis est eligendi</a></li>
                        </ul>
                        <a href="#" class="button">Show more</a>
                    </div>
                </div>
            </div>
        </div> -->

       <!-- <div class="fullwidth-block cta" data-bg-image="images/cta-bg.jpg">
            <div class="container">
                <h2 class="cta-title">Neque porro quisquam</h2>
                <p>Modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem enim ad minima veniam quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil moles</p>
                <a href="#" class="button">See details</a>
            </div>
        </div>

        <div class="fullwidth-block" data-bg-color="#edf2f4">
            <div class="container">
                <div class="subscribe-form">
                    <h2>Join our newsletter</h2>
                    <form action="#">
                        <input type="text" placeholder="Enter your email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div> -->

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
                <!--<div class="col-md-3">
                    <div class="widget">
                        <h3 class="widget-title">Press room</h3>
                        <ul class="arrow-list">
                            <li><a href="#">Accusantium doloremque</a></li>
                            <li><a href="#">Laudantium totam aperiam</a></li>
                        </ul>
                    </div>
                </div>-->
                <!-- <div class="col-md-3">
                     <div class="widget">
                         <h3 class="widget-title">Research summary</h3>
                         <ul class="arrow-list">
                             <li><a href="#">Accusantium doloremque</a></li>
                             <li><a href="#">Laudantium totam aperiam</a></li>
                         </ul>
                     </div>
                 </div>-->
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
