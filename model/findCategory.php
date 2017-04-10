<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 10/4/2560
 * Time: 16:41
 */
?>
<?php
include ("../config.inc.php");
$cat = $_POST['cat'];
$sql = "SELECT * FROM category WHERE name_category='$cat'";
$result = $conn->query($sql);
if($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo "false";
}
else{
    echo "true";
}
?>