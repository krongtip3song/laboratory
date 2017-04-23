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
include ("../config.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../css/modal_byWit.css">
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

    a{
        cursor: pointer;
    }
    table {
        border-color: inherit;
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 10px;
    }
    .table-tr:hover {background-color: #f5f5f5}
    th {
        background-color: #4e6eaf;
        color: white;
    }
</style>
<script>
    $(document).ready(function () {
       $("#edit_pro").click(function () {
          $("input[type='text']").removeAttr("disabled");
          $("#edit_pro").attr("type","hidden");
          $("#save").attr("type","submit");
          $("#cancel_p").attr("type","submit");
       });
        $("#cancel_p").click(function () {
            $("input[type='text']").attr("disabled","disabled");
            $("#edit_pro").attr("type","submit");
            $("#save").attr("type","hidden");
            $("#cancel_p").attr("type","hidden");
            return false;
        });
    });
</script>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">ข้อมูลส่วนตัว</h4>
    </div>
</div>
<center>
    <div style="margin: 30px 20px 20px 20px;width: 80%;">
        <form action="../model/updateUser.php" method="post">
        <div class="row">
            <div class="col-lg-3">
                <p class="text-center">
                    <?php
                        $sql = "SELECT * FROM img2 WHERE id_mem='$id'";
                        $res = $conn->query($sql);
                        if($obj = $res->fetch(PDO::FETCH_ASSOC)){
                            $path_pic = $obj['path_img'];
                        }
                    ?>
                    <img src="<?=$path_pic?>" width="250px" height="200px"/>
                </p>
            </div>
            <div class="col-lg-9">
                <input type="hidden" class="form-control" name="idmem" id="idmem" value="<?=$data[0]['id_member']?>"/>
                <table  width="80%">
                    <tr>
                        <td width="20%" style="text-align: right;">ชื่อผู้ใช้</td>
                        <td width="50%"><input type="text" class="form-control" name="username" id="username" value="<?=$data[0]['username']?>" disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">รหัสผ่าน</td>
                        <td><input type="text" class="form-control" name="password" id="pass" value="<?=$data[0]['password']?>" disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">ชื่อ</td>
                        <td><input type="text" class="form-control" name="name" id="name" value="<?=$data[0]['name']?>" disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">นามสกุล</td>
                        <td><input type="text" class="form-control" name="surname" id="surname" value="<?=$data[0]['surname']?>" disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">เบอร์โทรศัพท์</td>
                        <td><input type="text" class="form-control" name="tel" id="tel" value="<?=$data[0]['tel']?>" disabled/></td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">อีเมล</td>
                        <td><input type="text" class="form-control" name="email" id="email" value="<?=$data[0]['email']?>" disabled/></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="hidden" class="form-control btn-warning" name="cancel_p" id="cancel_p" value="ยกเลิก"/>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <input type="hidden" class="form-control btn-info" name="save" id="save" value="บันทึก"/>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div>
        </form>

        <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="submit" class="form-control btn-default" name="edit_pro" id="edit_pro" value="แก้ไข"/>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"></div>
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
                        echo "<tr class=\"table-tr\">
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
