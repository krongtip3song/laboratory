<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/9/2017
 * Time: 7:59 PM
 */
include "../config.inc.php";
$html = $_POST["html"];
$title = $_POST["title"];
$cat = $_POST["category"];
if($cat =="PAPER"){$category = "1";}
else{$category = "2";}
$date_occ = date("Y-m-d H:i:s",strtotime($_POST["date_occ"]));
$sql = "INSERT INTO project (title,description,date_Occurred,id_category)VALUES('$title','$html','$date_occ','$category')";
$res = $conn->exec($sql);
if($res){
    echo "SUCCESS";
    echo "<script>window.location = '../controller/datauser.php';</script>";
}
else{
    echo "FAIL";
    echo "<script>window.location = '../controller/addUser.php';</script>";
}