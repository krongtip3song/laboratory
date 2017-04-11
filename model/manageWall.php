<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 21:47
 */

include ("../config.inc.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM wall_index WHERE id_wall = '$id'";
    $res = $conn->exec($sql);
}
if(isset($_GET['idwall']) && isset($_GET['update'])){
    $id = $_GET['idwall'];
    $status = $_GET['update'];
    $sql = "UPDATE wall_index SET status = '$status' WHERE id_wall = '$id'";
    $res = $conn->exec($sql);
}


if($res){
    echo "<script>alert('SUCCESS')</script>";
}
else{
    echo "<script>alert('FAIL')</script>";
}
echo "<script>window.location = '../controller/managehome.php';</script>";

?>