<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 6/4/2560
 * Time: 2:55
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
        <h4 class="page-title">โครงงานทั้งหมด</h4>
    </div>
</div>
<center>
<div style="margin: 20px 20px 20px 20px;width: 80%;">
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th width="5%">ลำดับ</th>
            <th width="20%">ชื่อ</th>
            <th width="10%">หมวดหมู่</th>
            <th width="10%">วัน</th>
            <?php
            if($type_user == "ADMIN" || $type_user == "TEACHER"){
                echo "<th width=\"20%\">การกระทำ</th>";
            }
            ?>

            <th width="10%">more</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0;$i<count($data);$i++){
            $list = $i +1;
            echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['title']."</td>
                    <td>".$data[$i]['name_category']."</td>
                    <td>".date("d-m-Y",strtotime($data[$i]['date_Published']))."</td><td>";
            ?>
                    <?php
                    if($type_user == "ADMIN" || $type_user == "TEACHER"){
                            echo "
                                <div class='edit_col' data-id=''>
                                    <a href=''><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>แก้ไข</a>   
                                </div>";
                        if($type_user == "ADMIN"){
                            echo "<div class='delete_col'>
                            <a onclick='deleteProject(".$data[$i]['id_project'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>   
                            </div>";
                        }
                        echo "</td><td>";
                    }
                    echo "<a href='../controller/project.php?id=".$data[$i]['id_project']."'>more</a></td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</center>
<?php
include ("footer.php");
?>
