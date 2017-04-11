<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 11/4/2560
 * Time: 16:53
 */
?>
<?php
    include("../class/Authentication.class.php");
    session_start();
    if(isset($_SESSION['user'])){
        $person = $_SESSION["user"];
        $type_user = $person->getType();
        if($type_user == "ADMIN" || $type_user == "TEACHER"){
            include ("../view/create_project.php");
            exit();
        }
        else{

            header("Location:../index.php");
            exit();
        }
    }
    else{
        header("Location:../index.php");
        exit();
    }
?>
