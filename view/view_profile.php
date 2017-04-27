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
    .post:after {
        margin-top: 0;
    }
    .post:hover{
        filter: brightness(0.95);
    }
    .post{
        z-index: 10;
        box-shadow: -5px -5px #c2c2c2;
        border: 1px solid #dbdbdb;
        border-bottom: 2px solid mediumseagreen;
    }
    .post .featured-image img {
        width: 300px;
        height: 250px;
    }
    .banner{
        background: seagreen;
        position: absolute;
        z-index: 100;
        padding-right: 15px;
        width: 100%;
        color: white;
        line-height: 18px;
        font-weight: normal;
        font-size: 0.9em;
        text-align: right;
        text-transform: uppercase;
        height: 18px;
    }
    .name_pro{
        margin-top: 30px;
        padding: 0 15px;
        overflow: hidden;
        color: black;
        font-size: 1em;
    }
    .date{
        padding: 0 15px;
        overflow: hidden;
        color: #999999;
    }
    h2,small{
        text-align: left;
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
                    <?php
                    if($id == $person->getId()) {
                        ?>
                        <tr>
                            <td width="20%" style="text-align: right;">ชื่อผู้ใช้</td>
                            <td width="50%"><input type="text" class="form-control" name="username" id="username"
                                                   value="<?= $data[0]['username'] ?>" disabled/></td>
                        </tr>
                        <tr>
                            <td style="text-align: right;">รหัสผ่าน</td>
                            <td><input type="text" class="form-control" name="password" id="pass"
                                       value="<?= $data[0]['password'] ?>" disabled/></td>
                        </tr>
                        <?php
                    }
                    ?>
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
        <?php
        if($id == $person->getId()) {
        ?>
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
        <?php
        }
        ?>
        <br/>
        <br/>
        <hr>
        <br/>
        <h1>โครงงานที่เกี่ยวข้อง</h1>
        <div class="row" style="padding: 20px 50px 20px 50px">
                <?php
                    if(count($myProject) == 0){
                        echo "<tr><td colspan='2' style='text-align: center'>ไม่พบข้อมูล</td> </tr>";
                    }
                    else {

                        for ($l_pro = 0; $l_pro < count($myProject); $l_pro++) {
                            if ($l_pro % 4 == 0) {
                                echo "<div class=\"row\">";
                            }
                            ?>
                            <div class="col-md-3">
                                <a href="../controller/project.php?id=<?= $myProject[$l_pro]['id_project'] ?>">
                                    <div class="post" style="background-color: white">
                                        <?php
                                        $img = getMainPicProject($myProject[$l_pro]['id_project']);
                                        if ($img == null) {
                                            $img = "images/ON40SA0.jpg";
                                        }
                                        ?>
                                        <div><img src="../<?= $img ?>" alt="" width="100%" height="180px"></div>
                                        <div class="banner"><?= $myProject[$l_pro]['name_category'] ?></div>
                                        <div class="name_pro">
                                            <h2 class="entry-title"><?= $myProject[$l_pro]['title'] ?></h2>
                                        </div>
                                        <div>
                                            <small class="date"><?= date("d F Y", strtotime($myProject[$l_pro]['date_Occurred'])) ?></small>
                                        </div>
                                        <?php
                                        if ($type_user == "ADMIN" || $type_user == "TEACHER") {
                                            if ($id == $person->getId()) {
                                                ?>
                                                <div style="display: inline-block;width: 100%">
                                                    <div style="text-align: left;padding-left: 15px;float: left">
                                                        <a href="../controller/edit_project.php?id=<?= $myProject[$l_pro]['id_project'] ?>"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>
                                                            แก้ไข</a>
                                                    </div>
                                                    <?php
                                                    if ($type_user != "STUDENT") {
                                                        ?>
                                                        <div style="padding-right: 15px;float: right">
                                                            <a onclick='deleteProject(<?= $myProject[$l_pro]['id_project'] ?>)'
                                                               style="cursor: pointer"><i class="fa fa-trash-o"
                                                                                          aria-hidden="true"></i> ลบ</a>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </a>
                            </div>
                            <?php
                            if ($l_pro % 4 == 3) {
                                echo "</div>";
                            }
                        }
                    }
                ?>
    </div>
</center>




<?php
include ("footer.php");
?>
