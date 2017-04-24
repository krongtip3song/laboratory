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
            echo true;
        }
        else{
            echo false;
        }
    }
    if(isset($_POST['edit'])){
        $cat = $_POST['cat'];
        $idcat = $_POST['idcat1'];
        $sql = "UPDATE category SET name_category = '$cat' WHERE id_category = '$idcat'";
        $res = $conn->exec($sql);
        if($res){
            echo true;
        }
        else{
            echo false;
        }
    }
    if(isset($_POST['idcat'])){
        $cat = $_POST['idcat'];
        $sql = "DELETE FROM category WHERE id_category='$cat'";
        $res = $conn->exec($sql);
        if($res){
            echo true;
        }
        else{
            echo false;
        }
    }
?>
