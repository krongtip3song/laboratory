<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 2:39
 */
?>
<?php
include ("header.php");
print_r($data);
?>
<style>
    .page-head{
        padding: 30px 0 ;
    }
    .ch{
        float: left;
    }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">ข้อมูลส่วนตัว</h4>
    </div>
</div>
<center>
    <div style="margin: 30px 20px 20px 20px;width: 80%;">
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="username" id="username"/>
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="password" id="pass"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-12">นามสกุล</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="surname" id="surname"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">เบอร์โทรศัพท์</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="tel" id="tel"/>
                </div>
                <label class="control-label col-md-2 col-sm-2 col-xs-12">อีเมล</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="email" id="email"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="control-label col-md-2 col-sm-2 col-xs-12">ชนิดผู้ใช้</div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="radio" style="float: left" name="type" value="STUDENT"/> <span class="ch"> STUDENT</span><br>
                    <input type="radio" style="float: left" name="type" value="ADMIN"/><span class="ch"> ADMIN</span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                </div>
            </div>
        </div>
    </div>
</center>

<?php
include ("footer.php");
?>
