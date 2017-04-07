<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 3/4/2560
 * Time: 16:23
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Projects : Science Labs</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="../fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="../css/style.css">

    <!--[if lt IE 9]>
    <script src="../js/ie-support/html5.js"></script>
    <script src="../js/ie-support/respond.js"></script>
    <![endif]-->

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/app.js"></script>

    <style>
        .site-header,.header-bar,.site-footer{
            background-color: aliceblue;
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
        a:hover{
            text-decoration: none;
        }
        header{
            border-bottom: 1px solid #e8e8e8;
        }
        div.dropdown-menu div.dropdown-content a.new-a{
            padding: 10px 10px;
            text-decoration: none;
        }
    </style>

</head>


<body>
<?php
    if(isset($_SESSION["user"])){
        $person = $_SESSION["user"];
        $type_user = $person->getType();
    }
?>
<div class="site-content">

    <header class="site-header" data-bg-image="">
        <div class="container">
            <div class="header-bar">
                <a href="../controller/home.php" class="branding">
                    <img src="../images/logo.png" alt="" class="logo">
                    <div class="logo-type">
                        <h1 class="site-title">Technology Laboratory</h1>
                        <small class="site-description">Tagline goes here</small>
                    </div>
                </a>

                <nav class="main-navigation">
                    <button class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <ul class="menu">
                        <?php
                            if(isset($_SESSION["user"])){
                                if($type_user == "ADMIN"){
                                    ?>
                                    <li class="menu-item">
                                        <a class="new-a" href="../controller/home.php">หน้าหลัก</a>
                                    </li>
                                    <li class="dropdown menu-item">
                                        <a class='menu_th dropdown-toggle' href="#" data-toggle="dropdown">จัดการผู้ใช้
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <div class="dropdown-menu" style="padding:17px;">
                                            <div class="dropdown-content">

                                                <a class="new-a" href="../controller/datauser.php">แก้ไขข้อมูลผู้ใช้</a>
                                                <a class="new-a" href="../controller/adduser.php">เพิ่มผู้ใช้</a>
                                                <a class="new-a" href="../controller/submituser.php">ยืนยันผู้ใช้</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown menu-item">
                                        <a class='menu_th dropdown-toggle' href="#" data-toggle="dropdown">จัดการโครงงาน
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <div class="dropdown-menu" style="padding:17px;">
                                            <div class="dropdown-content">
                                                <a class="new-a" href="../controller/allproject.php">โครงงานทั้งหมด</a>
                                                <a class="new-a" href="../controller/allproject.php">เพิ่มโครงงาน</a>
                                                <a class="new-a" href="../controller/category.php">หมวดหมู่โครงงาน</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                else{
                                    echo "<li class=\"home menu-item\"><a href=\"index.html\"><img src=\"../images/home-icon.png\" alt=\"Home\"></a></li>
                                <li class=\"menu-item\"><a href=\"about.html\">About</a></li>
                                <li class=\"menu-item\"><a href=\"projects.html\">Our projects</a></li>
                                <li class=\"menu-item\"><a href=\"contact.html\">Contact</a></li>";
                                }
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
                                                    <div style="display: inline-block">
                                                    <form action="../controller/profile.php?id=<?=$person->getId()?>" method="post" style="display: inline-block">
                                                        <input type="submit" name="profile" value="PROFILE">
                                                    </form>
                                                    <form action="../controller/home.php" method="post" style="display: inline-block">
                                                        <input type="submit" name="logout" value="LOGOUT">
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        <?php
                            }
                            else{
                                echo "<li class=\"home menu-item\"><a href=\"index.html\"><img src=\"../images/home-icon.png\" alt=\"Home\"></a></li>
                        <li class=\"menu-item\"><a href=\"about.html\">About</a></li>
                        <li class=\"menu-item\"><a href=\"projects.html\">Our projects</a></li>
                        <li class=\"menu-item\"><a href=\"contact.html\">Contact</a></li>";
                                echo "<li class=\"menu-item\"><a href=\"#\">Sign in</a></li>";
                            }
                        ?>
                    </ul>
                </nav>

                <div class="mobile-navigation"></div>
            </div>
        </div>
    </header>


