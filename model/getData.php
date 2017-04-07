<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 4/4/2560
 * Time: 11:44
 */
include ("../config.inc.php");

function getCountProjectInCategory(){
    global $conn;
    $sql = "SELECT project.id_category,category.name_category,COUNT(project.id_category) FROM project INNER JOIN category ON project.id_category=category.id_category GROUP BY id_category";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_category"=>$obResult['id_category'],
            "name_category"=>$obResult['name_category'],
            "count"=>$obResult['COUNT(project.id_category)']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getCountUser(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM member";
    $res = $conn->query($sql);
    $obResult = $res->fetch(PDO::FETCH_ASSOC);
    return $obResult['COUNT(*)'];
}
function getCountProject(){
    global $conn;
    $sql = "SELECT COUNT(*) FROM project";
    $res = $conn->query($sql);
    $obResult = $res->fetch(PDO::FETCH_ASSOC);
    return $obResult['COUNT(*)'];
}
function getCountVisitor(){
    global $conn;
    $sql = "SELECT * FROM visitor";
    $res = $conn->query($sql);
    $obResult = $res->fetch(PDO::FETCH_ASSOC);
    return $obResult['num'];
}
function getAllUsers(){
    global $conn;
    $sql = "SELECT * FROM member";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_member"=>$obResult['id_member'],
            "username"=>$obResult['username'],
            "password"=>$obResult['password'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname'],
            "tel"=>$obResult['tel'],
            "email"=>$obResult['email'],
            "type_user"=>$obResult['type_user'],
            "verify"=>$obResult['verify']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getUser($id){
    global $conn;
    $sql = "SELECT * FROM member WHERE id_member = '$id'";
    $res = $conn->query($sql);
    $resultArray = array();
    if($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_member"=>$obResult['id_member'],
            "username"=>$obResult['username'],
            "password"=>$obResult['password'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname'],
            "tel"=>$obResult['tel'],
            "email"=>$obResult['email'],
            "type_user"=>$obResult['type_user'],
            "verify"=>$obResult['verify']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getUsersFail(){
    global $conn;
    $sql = "SELECT * FROM member WHERE verify=0";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_member"=>$obResult['id_member'],
            "username"=>$obResult['username'],
            "password"=>$obResult['password'],
            "name"=>$obResult['name'],
            "surname"=>$obResult['surname'],
            "tel"=>$obResult['tel'],
            "email"=>$obResult['email'],
            "type_user"=>$obResult['type_user'],
            "verify"=>$obResult['verify']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getAllProjects(){
    global $conn;
    $sql = "SELECT * FROM project INNER JOIN category ON project.id_category=category.id_category";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_project"=>$obResult['id_project'],
            "title"=>$obResult['title'],
            "description"=>$obResult['description'],
            "date_Published"=>$obResult['date_Published'],
            "date_Occurred"=>$obResult['date_Occurred'],
            "id_category"=>$obResult['id_category'],
            "name_category"=>$obResult['name_category']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getProject($id){
    global $conn;
    $sql = "SELECT * FROM project INNER JOIN category ON project.id_category=category.id_category WHERE id_project='$id'";
    $res = $conn->query($sql);
    $resultArray = array();
    if($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_project"=>$obResult['id_project'],
            "title"=>$obResult['title'],
            "description"=>$obResult['description'],
            "date_Published"=>$obResult['date_Published'],
            "date_Occurred"=>$obResult['date_Occurred'],
            "id_category"=>$obResult['id_category'],
            "name_category"=>$obResult['name_category']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getCategory(){
    global $conn;
    $sql = "SELECT * FROM category";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_category"=>$obResult['id_category'],
            "name_category"=>$obResult['name_category']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}


?>