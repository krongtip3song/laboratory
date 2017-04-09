<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 8/4/2560
 * Time: 21:10
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
        $('.change_status').click(function () {
            var id = $(this).data('id');
            var status = $(this).data('status');
            window.location = "../model/manageWall.php?idwall="+id+"&update="+status;
        });
        $('.delete_col').click(function () {
            var id = $(this).data('id');
            window.location = "../model/manageWall.php?id="+id;
        });
    } );
</script>
<style>
    .page-head{
        padding: 30px 0 ;
    }
    .edit_col,.delete_col,.change_status{
        display:inline;
        cursor:pointer;
        padding: 5px 5px 5px 5px;
        margin: 5px 5px 5px 5px;
    }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">จัดการหน้าแรก</h4>
    </div>
</div>
<center>
<div style="margin: 20px 20px 20px 20px;width: 80%;">
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th width="5%">ลำดับ</th>
            <th width="15%">ชื่อโครงงาน</th>
            <th width="25%">คำบรรยาย</th>
            <th width="10%">รูปภาพ</th>
            <th width="5%">สถานะ</th>
            <th width="25%">การกระทำ</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0;$i<count($data);$i++){
            $list = $i +1;
            echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['title']."</td>
                    <td>".$data[$i]['titleWall']."</td>
                    <td><img src='../".$data[$i]['path_wall']."' width='80px' height='40px'></td>
                    <td>".$data[$i]['status']."</td>
                    <td>
                        <div class='change_status' data-id='".$data[$i]['id_wall']."' data-status='".$data[$i]['status']."'>
                            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\">
                                ";
                                if($data[$i]['status']){
                                    echo "<span>เลิกใช้</span>";
                                }
                                else{
                                    echo "<span>ใช้</span>";
                                }
            echo "          </i>
                        </div>
                        <div class='edit_col' data-id='".$data[$i]['id_wall']."'>
                            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\">
                                <span>แก้ไข</span>
                            </i>
                        </div>
                        <div class='delete_col' data-id='".$data[$i]['id_wall']."'>
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
</center>
<?php
include ("footer.php");
?>