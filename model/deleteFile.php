<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/14/2017
 * Time: 6:20 PM
 */
include ("../config.inc.php");
$id_file = $_POST['id_file'];
$sql = "DELETE FROM file WHERE id_file='$id_file'";
$res = $conn->exec($sql);
if($res){
    echo "SUCCESS";
}
else{
    echo "FAIL";
}

?>