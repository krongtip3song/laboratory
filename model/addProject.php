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
if(isset($title) && $title!=""){
    $category = $_POST["category"];
    $date_occ = date("Y-m-d H:i:s",strtotime($_POST["date_occ"]));
    $sql = "INSERT INTO project (title,description,date_Occurred,id_category)VALUES('$title','$html','$date_occ','$category')";
    $res = $conn->exec($sql);
    if($res){
        echo "SUCCESS";
    }
    else{
        echo "FAIL";
    }
    $id_pro = getIDProject($title,$category);
    $id_pro = $id_pro[0]["id_project"];
    for($i=0;$i<count($member);$i++){
        console.log($id_pro."-".$member[$i]["value"]."-".$position[$i]."-".$percent[$i]);
        addMemberToProject($conn,$id_pro,$member[$i]["value"],$position[$i],$percent[$i]);
    }

}