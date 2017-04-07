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
?>
<style>
    .page-head{
        padding: 30px 0 ;
    }
    .ch{
        float: left;
    }
    .form-group{
        padding: 20px 20px 20px 20px;
    }
    label{
        padding-top: 6px;
        text-align: right;
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
            <div class="col-lg-3">
                <p class="text-center">
                    <span class="glyphicon glyphicon-user" style="font-size: 150px;"></span>
                </p>
            </div>
            <div class="col-lg-9">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="username" id="username" value="<?=$data[0]['username']?>"/>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="password" id="pass" value="<?=$data[0]['password']?>"/>
                    </div>
                </div>
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
        </div>
        <br/>
        <br/>
        <div class="row">
            <table width="60%" border="1" style="width: 60%">
                <tr>
                    <th width="30%">ชื่อโครงงาน</th>
                    <th width="20%">ตำแหน่ง</th>
                </tr>
                <?php
                    for ($i=0;$i<count($myProject);$i++){
                        echo "<tr>
                                <td>".$myProject[$i]['title']."</td>
                                <td>".$myProject[$i]['position']."</td>
                                </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</center>

<?php
include ("footer.php");
?>
