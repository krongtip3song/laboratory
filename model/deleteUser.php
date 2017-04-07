<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 5/4/2560
 * Time: 1:31
 */
include ("../config.inc.php");
$iduser = $_GET['iduser'];
$sql = "DELETE FROM member WHERE id_member='$iduser'";
$res = $conn->exec($sql);
if($res){
    echo "<script>alert('SUCCESS')</script>";
}
else{
    echo "<script>alert('FAIL')</script>";
}
echo "<script>window.location = '../controller/datauser.php';</script>";
?>