<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 2:21
 */
?>
<?php
include ("../config.inc.php");
$username = $_POST['user'];
$sql = "SELECT * FROM member WHERE username='$username'";
$result = $conn->query($sql);
if($row = $result->fetch(PDO::FETCH_ASSOC)){
    echo "false";
}
else{
    echo "true";
}
?>