<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 10/4/2560
 * Time: 20:33
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php
    include("../class/Authentication.class.php");
    include("../model/getData.php");
    session_start();
    if(isset($_SESSION['user'])){
        $person = $_SESSION["user"];
        $type_user = $person->getType();
        if($type_user == "ADMIN") {
            if (isset($_GET['iduser'])) {
                $person = $_SESSION["user"];
                $id = $_GET['iduser'];
                $data = getUser($id);
                include("../view/edit_user.php");
                exit();
            } else {
                header("Location:../index.php");
                exit();
            }
        }
        else{
            header("Location:../index.php");
            exit();
        }
    }
    else{
        header("Location:../index.php");
        exit();
    }
?>
