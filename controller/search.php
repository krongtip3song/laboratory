<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 15/4/2560
 * Time: 23:25
 */
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
include("../class/Authentication.class.php");
include("../model/getData.php");
session_start();
if(isset($_SESSION['user'])){
    $person = $_SESSION['user'];
    $type_user = $person->getType();
}
else{
    $person = null;
    $type_user = null;
}
if(isset($_GET['search'])){
    $word = $_GET['search'];
    $data = getSearch($word);
}
else{
    $data = getAllProjects();
}

include ("../view/search.php");
exit();

?>