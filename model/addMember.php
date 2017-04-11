<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/11/2017
 * Time: 1:52 PM
 */

function addMemberToProject($conn,$id_pro,$id_mem,$posi,$per=0){
    $sql = "INSERT INTO member_project (id_project,id_member,position,weight)VALUES('$id_pro','$id_mem','$posi','$per')";
    $res = $conn->exec($sql);
    if($res){
        echo "SUCCESS";
    }
    else{
        echo "FAIL";
    }

}