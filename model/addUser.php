<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 1:25
 */
?>

<?php
    include "../config.inc.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $sql = "INSERT INTO member (username,password,name,surname,tel,email,type_user,verify)VALUES('$user','$pass','$name','$surname','$tel','$email','$type',0)";
    $res = $conn->exec($sql);
    if($res){
        echo "<script>alert('SUCCESS')</script>";
        echo "<script>window.location = '../controller/datauser.php';</script>";
    }
    else{
        echo "<script>alert('FAIL')</script>";
        echo "<script>window.location = '../controller/addUser.php';</script>";
    }
?>
