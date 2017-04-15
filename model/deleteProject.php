<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 14/4/2560
 * Time: 15:11
 */
include ("../config.inc.php");
$id = $_GET['idpro'];
$sql = "DELETE FROM project WHERE id_project='$id'";
$res = $conn->exec($sql);
if($res){
    $sql2 = "DELETE FROM member_project WHERE id_project='$id'";
    $res2 = $conn->exec($sql2);
    if($res2) {
        $sql3 = "DELETE FROM file WHERE id_project='$id'";
        $res3 = $conn->exec($sql3);
        if($res3) {
            $sql4 = "SELECT * FROM wall_index WHERE id_project='$id'";
            $res4 = $conn->query($sql4);
            if($obResult = $res4->fetch(PDO::FETCH_ASSOC)){
                $sql5 = "DELETE FROM wall_index WHERE id_project='$id'";
                $res5 = $conn->exec($sql5);
                if($res5) {
                    echo "<script>alert('SUCCESS')</script>";
                }
            }
            else{
                echo "<script>alert('SUCCESS')</script>";
            }
        }
        else{
            echo "<script>alert('SUCCESS')</script>";
        }
    }
}
else{
    echo "<script>alert('FAIL')</script>";
}
echo "<script>window.location = '../controller/allproject.php';</script>";
?>