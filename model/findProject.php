<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/15/2017
 * Time: 2:12 PM
 */
include ("../config.inc.php");
$title = $_POST['title'];
$sql = "SELECT * FROM project WHERE title='$title'";
$result = $conn->query($sql);
if($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo "false";
}
else{
    echo "true";
}
?>