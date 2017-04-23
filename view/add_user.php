<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 1:09
 */
?>
<?php
    include ("header.php");

?>
<script>
    $(document).ready( function () {
        var check_user;
        $('#username').change(function () {
            var user = $('#username').val();
            $.ajax({
                url: "../model/findUsername.php" ,
                type: "POST",
                data: {user:user}
            })
            .success(function(result) {
                if(result == "true"){
                    $('#username').css("border","1px solid green");
                    check_user = true;
                }
                else{
                    $('#username').css("border","1px solid red");
                    check_user = false;
                }
            });
        });
        $('#submit').click(function () {
           if(!check_user){
               alert("username ซ้ำ");
               return false;
           }
           var user = $('#username').val();
           var pass = $('#password').val();
           var name = $('#name').val();
           var surname = $('#surname').val();
           var tel = $('#tel').val();
           var email = $('#email').val();
           var type = $("input[name=type]:checked").val();
           if(user == "" || pass == "" || name == "" || surname == "" || tel == "" || email == "" || type == undefined){
               alert("กรอกข้อมูลให้ครบ");
               return false;
           }
        });
        $('#cancel').click(function () {
            $("input[type='text']").val("");
            return false;
        });
        $("#tel").keydown(function (e) {
            var asc = e['key'].charCodeAt(0);
            console.log(asc);
            if(asc != 66){
                if(asc < 48 || asc >57){
                    alert("ใส่เฉพาะตัวเลข");
                    return false;
                }
            }

        });
    });
</script>
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
        <h4 class="page-title">เพิ่มผู้ใช้</h4>
    </div>
</div>
<center>
<div style="margin: 30px 20px 20px 20px;width: 80%;">
    <form action="../model/addUser.php" method="post">
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
                    <input type="text" class="form-control" name="tel" id="tel" minlength="10" maxlength="10"/>
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
                <div class="control-label col-md-2 col-sm-2 col-xs-12"><strong>ชนิดผู้ใช้</strong></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="radio" style="float: left" name="type" value="STUDENT"/> <span class="ch"> STUDENT</span><br>
                    <input type="radio" style="float: left" name="type" value="TEACHER"/> <span class="ch"> TEACHER</span><br>
                    <input type="radio" style="float: left" name="type" value="ADMIN"/><span class="ch"> ADMIN</span>
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
                    <input type="submit" class="form-control" name="cancel" id="cancel" value="ยกเลิก"/>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="submit" class="form-control" name="submit" id="submit" value="ยืนยัน"/>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>
    </form>
</div>
</center>

<?php
include ("footer.php");
?>