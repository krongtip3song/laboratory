<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 12/4/2560
 * Time: 16:54
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
        function deleteProject(id) {
            if( confirm("Do you want to delete ?") ){
                window.location = "../model/deleteProject.php?idpro="+id;
            }
        }
    </script>
    <style>
        .page-head{
            padding: 30px 0 ;
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
                    <th width="20%">หมวดหมู่</th>
                    <th width="10%">วัน</th>
                    <th width="10%">การกระทำ</th>
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
                    <td>".date("d-m-Y",strtotime($data[$i]['date_Published']))."</td>
                    <td>
                        <div class='edit_col' data-id=''>
                            <a href=''><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>แก้ไข</a>   
                        </div>
                    ";
                    ?>
                    <?php
                    if($type_user == "TEACHER"){
                        echo "<div class='delete_col'>
                            <a onclick='deleteProject(".$data[$i]['id_project'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>   
                            </div>";
                    }
                    echo "</td><td><a href='../controller/project.php?id=".$data[$i]['id_project']."'>more</a></td>
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