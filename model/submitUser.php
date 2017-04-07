<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 1:53
 */
?>
<?php
    include ("../config.inc.php");
    $person = $_POST['person'];
    for ($i=0;$i<count($person);$i++){
        $sql = "UPDATE member SET verify=1 WHERE id_member='$person[$i]'";
        $res = $conn->exec($sql);
    }
    echo "<script>window.location = '../controller/submituser.php';</script>";
?>
