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
    if($res){
        echo "<script>alert('SUCCESS')</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../controller/managehome.php';</script>";
}
if(isset($_GET['idwall']) && isset($_GET['update'])){
    $id = $_GET['idwall'];
    $status = $_GET['update'];
    $sql = "UPDATE wall_index SET status = '$status' WHERE id_wall = '$id'";
    $res = $conn->exec($sql);
    if($res){
        echo "<script>alert('SUCCESS')</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../controller/managehome.php';</script>";
}
if(isset($_POST['save'])){
    $id = $_POST['id_pro'];
    $des_pro = $_POST['des_pro'];
    $target_dir = "images/wall_index/".$id."_".$_FILES["img"]["name"];
    if (move_uploaded_file($_FILES["img"]["tmp_name"], "../".$target_dir)) {
        $sql = "INSERT INTO wall_index (id_project,path_wall,titleWall,status) VALUES('$id','$target_dir','$des_pro','0')";
        $res = $conn->exec($sql);
        if($res){
            echo "<script>alert('SUCCESS')</script>";
        }
        else{
            echo "<script>alert('FAIL')</script>";
        }
        echo "<script>window.location = '../controller/managehome.php';</script>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}




?>