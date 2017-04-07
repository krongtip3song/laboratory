<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 16:52
 */
?>
<?php

    include "../config.inc.php";

    if(isset($_POST['add'])){
        $cat = $_POST['cat'];
        $sql = "INSERT INTO category (name_category)VALUES('$cat')";
        $res = $conn->exec($sql);
        if($res){
            echo "<script>alert('SUCCESS')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
        else{
            echo "<script>alert('FAIL')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
    }
    if(isset($_POST['edit'])){
        $cat = $_POST['cat'];
        $idcat = $_POST['idcat'];
        $sql = "UPDATE category SET name_category = '$cat' WHERE id_category = '$idcat'";
        $res = $conn->exec($sql);
        if($res){
            echo "<script>alert('SUCCESS')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
        else{
            echo "<script>alert('FAIL')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
    }
    if(isset($_GET['idcat'])){
        $cat = $_GET['idcat'];
        $sql = "DELETE FROM category WHERE id_category='$cat'";
        $res = $conn->exec($sql);
        if($res){
            echo "<script>alert('SUCCESS')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
        else{
            echo "<script>alert('FAIL')</script>";
            echo "<script>window.location = '../controller/category.php';</script>";
        }
    }
?>
