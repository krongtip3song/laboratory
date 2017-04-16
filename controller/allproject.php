<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 2:55
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
    if(isset($_GET['cat'])){
        $scat = $_GET['cat'];
        $data = getProjectByCat($scat);
    }
    else{
        $data = getAllProjects();
    }
}
$cat = getCountCat();
include ("../view/all_project.php");
exit();

?>