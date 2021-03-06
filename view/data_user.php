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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>


<script>

    $(document).ready( function () {
        $('[data-toggle="popover"]').popover();
        $('#table_id').dataTable();
        /*
        $('#submit').click(function () {
alert("sdasd");
            if(user_select['username'] == $('#username').val() && user_select['password']==$('#pass').val() && user_select['name'] == $('#name').val() && user_select['surname'] == $('#surname').val() && user_select['tel'] == $('#tel').val() && user_select['email'] == $('#email').val() && $("input[name=radio]:checked").val() == user_select['type_user']){
                alert("ไม่มีการเปลี่ยนแปลง");
                return false;
            }
        });*/
        $(document).on("click", ".edit_col", function () {
            $("#modal_edit").modal('show');
            var id = $(this).data('id');
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
            $('#pass1').val(user_select['password']);
            $('#name').val(user_select['name']);
            $('#surname').val(user_select['surname']);
            $('#tel').val(user_select['tel']);
            $('#email').val(user_select['email']);
            if(user_select['type_user'] == "STUDENT"){
                $('#stu').prop('checked',true);
            }
            else{
                if(user_select['type_user'] == "TEACHER"){
                    $('#tea').prop('checked',true);
                }
                else{
                    $('#ad').prop('checked',true);
                }
            }
        });
    } );
    function deleteUser(id) {
        if( confirm("Do you want to delete ?") ){
            //window.location = "../model/deleteUser.php?iduser="+id;
            $.ajax({
                url: "../model/deleteUser.php" ,
                type: "POST",
                data: {iduser:id},
                dataType: "json"
            })
                .success(function(result) {
                    if(result){
                        alert("SUCCESS");
                        location.reload();
                    }
                    else {
                        alert("FAIL");
                    }
                });
        }
    }
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
                $alert = "";
                if($data[$i]['verify'] == 0){
                    $alert = "<i class=\"fa fa-exclamation-triangle\" aria-hidden=\"true\" data-toggle=\"popover\" data-trigger=\"hover\" data-content=\"ยังไม่ยืนยัน\"></i>";
                }
                echo "<tr style='color: #8e9ca5'>
                    <td>".$list."</td>
                    <td>".$data[$i]['name']."</td>
                    <td>".$data[$i]['surname']."</td>
                    <td>".$data[$i]['tel']."</td>
                    <td>".$data[$i]['email']."</td>
                    <td>".$data[$i]['type_user']."</td>
                    <td>
                        <div class='edit_col' data-id='".$data[$i]['id_member']."'>
                            <a><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>แก้ไข</a>  
                        </div>
                        <div class='delete_col' data-id='".$data[$i]['id_member']."'>    
                            <a onclick='deleteUser(".$data[$i]['id_member'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>           
                        </div>
                        $alert
                    </td>
                </tr>";
            }
        ?>
        </tbody>
    </table>
</div>
</center>


<!-- Modal -->
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="../model/updateUser.php" method="post">
                    <input type="hidden" name="idmem" id="idmem"/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="username" id="username" readonly/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสผ่าน</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="pass" id="pass1"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อ</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">นามสกุล</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="surname" id="surname"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">เบอร์โทรศัพท์</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="tel" id="tel" minlength="10" maxlength="10"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">อีเมล</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="email" id="email"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ชนิดผู้ใช้</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="radio" style="float: left" name="type" value="STUDENT" id="stu"/> <span class="ch"> STUDENT</span><br>
                                <input type="radio" style="float: left" name="type" value="TEACHER" id="tea"/> <span class="ch"> TEACHER</span><br>
                                <input type="radio" style="float: left" name="type" value="ADMIN" id="ad"/><span class="ch"> ADMIN</span>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-4 col-sm-4 col-xs-12"></div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="submit" class="btn btn-default" name="submit" id="submit" value="submit"/>
                            </div>
                            <div class="col-md-4 col-sm-3 col-xs-12"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<?php
include ("footer.php");
?>
