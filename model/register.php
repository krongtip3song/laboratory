<?php
/**
 * Created by PhpStorm.
 * User: Oak
 * Date: 17/4/2560
 * Time: 19:37
 */
?>

<?php
include "../config.inc.php";
if(isset($_POST['regis'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    //$img = $_POST['img'];
    $sql = "INSERT INTO member (username, password, name, surname, tel, email, type_user,verify) VALUES('$username','$password','$name','$surname','$tel','$email','STUDENT',0)";
    $res = $conn->exec($sql);
    $idmem = $conn->lastInsertId();
    if($res){
        $img2 = '';
        $path = '';
        if($_FILES["pic"]["name"] != ""){
            $path = "../images/".$_FILES["pic"]["name"]."_".date("d-m-Y");
            if(move_uploaded_file($_FILES["pic"]["tmp_name"],$path)){
                $sql2 = "INSERT INTO img2 (path_img,id_mem) VALUE ('$path','$idmem')";
                $res2 = $conn->exec($sql2);
                if($res2){
                    echo "<script>alert('SUCCESS')</script>";
                }else
                    echo "<script>alert('FAIL')</script>";
            }
        }
        //$sql2 = "INSERT INTO img (id_mem,id_img,status) VALUES ('$idmem','$img','1')";
        //$res2 = $conn->exec($sql2);

    }
    else{
        echo "<script>alert('FAIL')</script>";
    }
    echo "<script>window.location = '../index.php';</script>";
}
?>
