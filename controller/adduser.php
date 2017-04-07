<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 1:09
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<?php
    include("../class/Authentication.class.php");
    include("../model/getData.php");

    session_start();
    include ("../view/add_user.php");
?>
