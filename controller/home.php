<script src="../lib/sweetalert-master/dist/sweetalert.min.js"></script>
<script src="../js/jquery-3.2.0.min.js"></script>
<link rel="stylesheet" href="../lib/sweetalert-master/dist/sweetalert.css">
<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 14:04
 */
include("../class/Authentication.class.php");
session_start();
?>
<?php

if(isset($_POST['login'])){
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $mem = Authentication::login($user, $pass);
        if (is_a($mem, "Member")) {
            if($mem->getType() == "ADMIN"){
                $_SESSION["user"] = $mem;
                $person = $_SESSION["user"];
                $type_user = $person->getType();
                include ("../view/admin_page.php");
                exit();
            }
            else{
                $_SESSION["user"] = $mem;
                $person = $_SESSION["user"];
                $type_user = $person->getType();
                echo "<script>alert('SUCCESS')</script>";
                header("Location:../index.php");
                exit();
            }
        }
        else{
            echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านผิด')</script>";
            echo "<script>window.location='../index.php'</script>";
            exit();
        }
    }
    else{
        header("Location:../index.php");
        exit();
    }

}
if(isset($_GET["logout"])){
    Authentication::logout($_SESSION["user"]);
    session_unset();
    session_destroy();
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(),'',time() -3600,"/");
    }
    header("Location: ../index.php");
    exit();
}
if(isset($_SESSION["user"])){
    if($_SESSION["user"]->getType() == "ADMIN"){
        $person = $_SESSION["user"];
        $type_user = $person->getType();
        include ("../view/admin_page.php");
        exit();
    }
    else{
        $person = $_SESSION["user"];
        $type_user = $person->getType();
        header("Location:../index.php");
        exit();
    }
}
else{
    header("Location:../index.php");
    exit();
}
?>
