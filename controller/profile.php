<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 2:39
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<?php

    include("../class/Authentication.class.php");
    include("../model/getData.php");
    session_start();
    if(isset($_SESSION['user'])){
        if(isset($_GET['id'])) {
            $person = $_SESSION["user"];
            $id = $_GET['id'];
            $data = getUser($id);
            $myProject = getMyProject($id);
            include("../view/view_profile.php");
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
