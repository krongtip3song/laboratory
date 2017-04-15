<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/9/2017
 * Time: 7:59 PM
 */
include "../config.inc.php";
include("../model/getData.php");
include("../model/addMember.php");
$html = $_POST["html"];
$title = $_POST["title"];
$member = $_POST["member"];
$position = $_POST["position"];
$percent = $_POST["percent"];
$id_pro = $_POST["id_project"];
if(isset($title) && $title!=""){
    $category = $_POST["category"];
    $date_occ = date("Y-m-d H:i:s",strtotime($_POST["date_occ"]));
    $sql = "UPDATE  project SET title='$title',description='$html',date_Occurred='$date_occ',id_category='$category' WHERE id_project = $id_pro";
    $res = $conn->exec($sql);
    if($res){
        echo "SUCCESS";
    }
    else{
        echo "FAIL";
    }

    for($i=0;$i<count($member);$i++){
        addMemberToProject($conn,$id_pro,$member[$i]["value"],$position[$i],$percent[$i]);
    }
}
