<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 12:32
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php

include("../class/Authentication.class.php");
include ("../model/getData.php");
session_start();
if(isset($_SESSION['user'])){
    $person = $_SESSION["user"];
    $type_user = $person->getType();
}
$idpro = $_GET['id'];
$data = getProject($idpro);
$file = getFile($idpro);
$mem_project = getMemberProject($idpro);
include ("../view/edit_project.php");
exit();
?>
