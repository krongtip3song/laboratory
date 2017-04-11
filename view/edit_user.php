<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 10/4/2560
 * Time: 20:35
 */
?>
<?php
include ("header.php");
?>
<style>
    .page-head{
        padding: 30px 0 ;
    }
</style>
<script>
    $(document).ready( function () {
        $('#cancel').click(function () {
            window.location = "../controller/datauser.php";
            return false;
        });
    });
</script>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">แก้ไขข้อมูล</h4>
    </div>
</div>
<center>
    <div style="margin: 20px 20px 20px 20px;width: 80%;">
        <form action="../model/updateUser.php" method="post">
            <input type="hidden" class="form-control" name="idmem" id="idmem" value="<?=$data[0]['id_member']?>"/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="username" id="username" value="<?=$data[0]['username']?>"/>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="pass" id="pass" value="<?=$data[0]['password']?>"/>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="name" id="name" value="<?=$data[0]['name']?>"/>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">นามสกุล</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="surname" id="surname" value="<?=$data[0]['surname']?>"/>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">เบอร์โทรศัพท์</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="tel" id="tel" value="<?=$data[0]['tel']?>"/>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">อีเมล</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="email" id="email" value="<?=$data[0]['email']?>"/>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="control-label col-md-2 col-sm-2 col-xs-12">ชนิดผู้ใช้</div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" style="float: left" name="type" class="typeUser"  value="STUDENT" <?php $data[0]['type_user'] == "STUDENT"? $ch='checked' : $ch="";  echo $ch; ?>/> <span class="ch"> STUDENT</span><br>
                        <input type="radio" style="float: left" name="type" class="typeUser"  value="TEACHER" <?php $data[0]['type_user'] == "TEACHER"? $ch='checked' : $ch="";  echo $ch; ?>/> <span class="ch"> TEACHER</span><br>
                        <input type="radio" style="float: left" name="type" class="typeUser"  value="ADMIN"  <?php $data[0]['type_user'] == "ADMIN"? $ch='checked' : $ch="";  echo $ch; ?>/><span class="ch"> ADMIN</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="submit" class="form-control" name="cancel" id="cancel" value="cancel"/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input type="submit" class="form-control" name="submit" id="submit" value="submit"/>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                </div>
            </div>
        </form>
    </div>
</center>
<?php
?>

<?php
include ("footer.php");
?>
