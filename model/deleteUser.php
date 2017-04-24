<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 5/4/2560
 * Time: 1:31
 */
include ("../config.inc.php");
$iduser = $_POST['iduser'];
$sql = "DELETE FROM member WHERE id_member='$iduser'";
$res = $conn->exec($sql);
if($res){
    echo true;
}
else{
    echo false;
}
?>