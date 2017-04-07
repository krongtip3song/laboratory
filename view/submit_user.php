<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 1:36
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
        $('#submit').click(function () {
            var val = [];
            $(':checkbox:checked').each(function(i){
                val[i] = $(this).val();
            });
            console.log(val);
            if(val.length == 0){
                alert("โปรดเลือกผู้ใช้");
                return false;
            }
        });
    });
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
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">ยืนยันผู้ใช้</h4>
    </div>
</div>
<center>


    <div style="margin: 20px 20px 20px 20px;width: 80%;">
        <form action='../model/submitUser.php' method='post'>
        <table class="display" id="table_id">
            <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="15%">ชื่อ</th>
                <th width="20%">นามสกุล</th>
                <th width="10%">เบอร์โทรศัพท์</th>
                <th width="20%">อีเมล</th>
                <th width="10%">ชนิดผู้ใช้</th>
                <th width="15%">ยืนยัน</th>
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
                                <input type=\"checkbox\" class='sub' name=\"person[]\" value='".$data[$i]['id_member']."'> submit<br>
                            </div>
                        
                    </td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
            <input type="submit" id="submit" value="ยืนยัน"/>
        </form>
    </div>
</center>
    <?php
    include ("footer.php");
    ?>
