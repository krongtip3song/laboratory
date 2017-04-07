<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 4/4/2560
 * Time: 11:32
 */
?>
<?php
include ("header.php");
?>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').dataTable();
        $('.edit_col').click(function () {
            var id = $(this).data('id');
            $("#panel").slideDown("slow");
            var data = <?=json_encode($data);?>;
            var user_select;
            for(var i=0;i<data.length;i++){
                if(id == data[i]['id_member']){
                    user_select = data[i];
                    break;
                }
            }
            $('#idmem').val(user_select['id_member']);
            $('#username').val(user_select['username']);
            $('#pass').val(user_select['password']);
            $('#name').val(user_select['name']);
            $('#surname').val(user_select['surname']);
            $('#tel').val(user_select['tel']);
            $('#email').val(user_select['email']);
            var typeU = user_select['type_user'];
        });
        $('.delete_col').click(function () {
            var id = $(this).data('id');
            if( confirm("Do you want to delete ?") ){
                window.location = "../model/deleteUser.php?iduser="+id;
            }
        });
        $('#cancel').click(function () {
            $("#panel").slideUp("slow");
            return false;
        });
    } );
</script>
<style>
    .page-head{
        padding: 30px 0 ;
    }
    .edit_col,.delete_col{
        display:inline;
        cursor:pointer;
        padding: 5px 5px 5px 5px;
        margin: 5px 5px 5px 5px;
    }
    #panel {
        padding: 50px;
        display: none;
        width: 80%;
    }
    label{
        padding-top: 6px;
        text-align: right;
    }
    .ch{
        float: left;
    }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">ข้อมูลผู้ใช้</h4>
    </div>
</div>
<center>


<div style="margin: 20px 20px 20px 20px;width: 80%;">
    <table class="display" id="table_id">
        <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="15%">ชื่อ</th>
                <th width="20%">นามสกุล</th>
                <th width="10%">เบอร์โทรศัพท์</th>
                <th width="20%">อีเมล</th>
                <th width="10%">ชนิดผู้ใช้</th>
                <th width="15%">การกระทำ</th>
            </tr>
        </thead>
        <tbody>
        <?php
            for ($i=0;$i<count($data);$i++){
                $list = $i +1;
                echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['name']."</td>
                    <td>".$data[$i]['surname']."</td>
                    <td>".$data[$i]['tel']."</td>
                    <td>".$data[$i]['email']."</td>
                    <td>".$data[$i]['type_user']."</td>
                    <td>
                        <div class='edit_col' data-id='".$data[$i]['id_member']."'>
                            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\">
                                <span>แก้ไข</span>
                            </i>
                        </div>
                        <div class='delete_col' data-id='".$data[$i]['id_member']."'>
                            <i class=\"fa fa-trash-o\" aria-hidden=\"true\">
                                <span>ลบ</span>
                            </i>
                        </div>
                    </td>
                </tr>";
            }
        ?>
        </tbody>
    </table>
</div>

    <div id="panel">
        <form action="../model/updateUser.php" method="post">
            <input type="hidden" class="form-control" name="idmem" id="idmem"/>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อผู้ใช้</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="username" id="username"/>
                    </div>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">รหัสผ่าน</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="pass" id="pass"/>
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
                        <input type="radio" style="float: left" name="type" class="typeUser"  value="STUDENT"/> <span class="ch"> STUDENT</span><br>
                        <input type="radio" style="float: left" name="type" class="typeUser"  value="ADMIN" /><span class="ch"> ADMIN</span>
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
include ("footer.php");
?>
