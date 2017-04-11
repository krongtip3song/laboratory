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
function getMyProject($id){
    global $conn;
    $sql = "SELECT * FROM project INNER JOIN member_project ON project.id_project=member_project.id_project WHERE id_member = '$id'";
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
            "id_member_project"=>$obResult['id_member_project'],
            "id_member"=>$obResult['id_member'],
            "position"=>$obResult['position'],
            "weight"=>$obResult['weight']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getWallProject(){
    global $conn;
    $sql = "SELECT * FROM project INNER JOIN wall_index ON project.id_project=wall_index.id_project";
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
            "id_wall"=>$obResult['id_wall'],
            "path_wall"=>$obResult['path_wall'],
            "titleWall"=>$obResult['titleWall'],
            "status"=>$obResult['status']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getIDProject($title,$cat){
    global $conn;
    $sql = "SELECT id_project FROM project  WHERE title='$title' AND id_category = '$cat'";
    $res = $conn->query($sql);
    $resultArray = array();
    if($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_project"=>$obResult['id_project']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}
function getFile($id){
    global $conn;
    $sql = "SELECT * FROM file  WHERE id_project = '$id'";
    $res = $conn->query($sql);
    $resultArray = array();
    while($obResult = $res->fetch(PDO::FETCH_ASSOC))
    {
        $arrCol = array();
        $arrCol = array("id_file"=>$obResult['id_file'],
            "name"=>$obResult['name'],
            "path"=>$obResult['path'],
            "date_upload"=>$obResult['date_upload'],
            "type"=>$obResult['type'],
            "rank"=>$obResult['rank']);
        array_push($resultArray,$arrCol);
    }
    return $resultArray;
}


?>