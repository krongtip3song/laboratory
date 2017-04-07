<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 13:09
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
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">หมวดหมู่ทั้งหมด</h4>
    </div>
</div>
<center>
    <div style="margin: 20px 20px 20px 20px;width: 80%;">
        <div>
            <form action="../model/addCategory.php" method="post">
                <input type="text">
                <input type="submit" name="add" value="เพิ่ม">
            </form>

        </div>
        <table class="display" id="table_id">
            <thead>
            <tr>
                <th width="10%">ลำดับ</th>
                <th width="20%">ชื่อหมวดหมู่</th>
                <th width="20%">การกระทำ</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0;$i<count($data);$i++){
                $list = $i +1;
                echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['name_category']."</td>
                    <td>
                    <div class='edit_col' data-id='".$data[$i]['id_category']."'>
                            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\">
                                <span>แก้ไข</span>
                            </i>
                        </div>
                        <div class='delete_col' data-id='".$data[$i]['id_category']."'>
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
