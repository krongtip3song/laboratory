<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 11:31
 */
?>
<?php
    include ("../config.inc.php");
    include("../class/Member.class.php");
    if(isset($_POST['submit'])) {
        $idmem = $_POST['idmem'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $sql = "UPDATE member SET password='$pass',name='$name',surname='$surname',tel='$tel',email='$email',type_user = '$type' WHERE id_member='$idmem'";
        $result = $conn->exec($sql);
        if ($result) {
            echo "<script>alert('SUCCESS')</script>";
        } else {
            echo "<script>alert('FAIL')</script>";
        }
        echo "<script>window.location = '../controller/datauser.php';</script>";
    }
    if(isset($_POST['save'])) {
        $idmem = $_POST['idmem'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $sql = "UPDATE member SET username='$username',password='$pass',name='$name',surname='$surname',tel='$tel',email='$email' WHERE id_member='$idmem'";
        $result = $conn->exec($sql);
        if ($result) {
            session_start();
            $user = $_SESSION['user'];
            $user->setUsername($username);
            $user->setPassword($pass);
            $user->setName($name);
            $user->setSurname($surname);
            $user->setTel($tel);
            $user->setEmail($email);
            echo "<script>alert('SUCCESS')</script>";
        } else {
            echo "<script>alert('FAIL')</script>";
        }
        echo "<script>window.location = '../controller/profile.php?id=$idmem';</script>";
    }
?>
