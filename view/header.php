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

    <style>
        .dropbtnWit {
            background-color: aliceblue;
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
</head>


<body>
<div class="site-content">

    <header class="site-header" data-bg-image="">
        <div class="container">
            <div class="header-bar">
                <a href="../controller/home.php" class="branding">
                    <img src="../images/chip_sm.png" alt="" class="logo">
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

                                    <li class="menu-item dropdownWit">
                                        <a class="dropbtnWit">จัดการผู้ใช้ <span class="glyphicon glyphicon-chevron-down"></span></a>
                                        <div class="dropdown-contentWit">
                                            <a class="new-a" href="../controller/datauser.php">แก้ไขข้อมูลผู้ใช้</a>
                                            <a class="new-a" href="../controller/adduser.php">เพิ่มผู้ใช้</a>
                                            <a class="new-a" href="../controller/submituser.php">ยืนยันผู้ใช้</a>
                                        </div>
                                    </li>
                                    <li class="menu-item dropdownWit">
                                        <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                        <div class="dropdown-contentWit">
                                            <a class="new-a" href="../controller/allproject.php">โครงงานทั้งหมด</a>
                                            <a class="new-a" href="../controller/createproject.php">สร้างโครงงาน</a>
                                            <a class="new-a" href="../controller/category.php">หมวดหมู่โครงงาน</a>
                                        </div>
                                    </li>
                                    <li class="menu-item">
                                        <a class='menu_th' href="../controller/managehome.php">จัดการหน้าแรก</a>
                                    </li>
                                    <?php
                                }
                                else{
                                    if($type_user == "TEACHER"){
                                        ?>
                                        <li class="menu-item">
                                            <a class="new-a" href="../controller/home.php">หน้าหลัก</a>
                                        </li>

                                        <li class="menu-item dropdownWit">
                                            <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                            <div class="dropdown-contentWit">
                                                <a class="new-a" href="../controller/allproject.php">โครงงานทั้งหมด</a>
                                                <a class="new-a" href="../controller/myproject.php">โครงงานของตนเอง</a>
                                                <a class="new-a" href="../controller/createproject.php">สร้างโครงงาน</a>
                                            </div>
                                        </li>
                                        <li class="menu-item">
                                            <a class='menu_th' href="../controller/submituser.php">ยืนยันผู้ใช้</a>
                                        </li>
                                        <?php
                                    }
                                    else{
                                        if($type_user == "STUDENT"){
                                            ?>
                                            <li class="menu-item">
                                                <a class="new-a" href="../index.php">หน้าหลัก</a>
                                            </li>
                                            <li class="menu-item dropdownWit">
                                                <a class="dropbtnWit">จัดการโครงงาน <span class="glyphicon glyphicon-chevron-down"></span></a>
                                                <div class="dropdown-contentWit">
                                                    <a class="new-a" href="../controller/allproject.php">โครงงานทั้งหมด</a>
                                                    <a class="new-a" href="../controller/myproject.php">โครงงานของตนเอง</a>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                    }

                                }
                        ?>
                                <li class="menu-item dropdownWit">
                                    <a class="dropbtnWit"><strong><?=$person?></strong><span class="glyphicon glyphicon-chevron-down"></span></a>
                                    <div class="dropdown-contentWit">
                                        <a class="new-a" href="../controller/profile.php?id=<?=$person->getId()?>">โปรไฟล์</a>
                                        <a class="new-a" href="../controller/home.php?logout=1">ออกจากระบบ</a>
                                    </div>
                                </li>
                        <?php
                            }
                            else{
                                echo "<li class=\"home menu-item\"><a href=\"../index.php\"><img src=\"../images/home-icon.png\" alt=\"Home\"></a></li>
                        <li class=\"menu-item\"><a href=\"../controller/allproject.php\">โครงงานทั้งหมด</a></li>
                        <li class=\"menu-item\"><a href=\"../view/about.php\">เกี่ยวกับ</a></li>";
                                echo "<li class=\"menu-item\"><a data-target=\"#myModal\" data-toggle=\"modal\" style=\"cursor: pointer\">เข้าสู่ระบบ</a></li>";
                            }
                        ?>
                    </ul>
                </nav>

                <div class="mobile-navigation"></div>
            </div>
        </div>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width: 400px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sign In</h4>
                </div>
                <div class="modal-body" align="center" style="margin: 0px 20px 0px 20px">
                    <form action="../controller/home.php" method="post">
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
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/app.js"></script>
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

