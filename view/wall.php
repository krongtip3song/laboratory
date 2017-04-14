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


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
    $(document).ready( function () {
        $('#table_id').dataTable();
    });
    function deleteWall(id) {
        if( confirm("Do you want to delete ?") ){
            window.location = "../model/manageWall.php?id="+id;
        }
    }

    $( function() {
        var availableTags = [
            <?php
            for($i=0;$i<count($pro);$i++){
                $title = $pro[$i]['title'];
                $id = $pro[$i]['id_project'];
                echo "{label :'".$title."',value:'".$id."'},";
            }
            ?>
            ];
        $( "#n_pro" ).autocomplete({
            source: availableTags,
            appendTo: "#modal_add",
            select: function( event, ui ) {
                $( "#n_pro" ).val( ui.item.label );
                $("#id_pro").val(ui.item.value);
                return false;
            }
        });
    });

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
    <?php
        if(isset($_POST['n_pro'])) echo $_POST['n_pro'];
    ?>
<div style="margin: 20px 20px 20px 20px;width: 80%;">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_add">เพิ่ม</button>
    <table class="display" id="table_id">
        <thead>
        <tr>
            <th width="5%">ลำดับ</th>
            <th width="15%">ชื่อโครงงาน</th>
            <th width="10%">รูปภาพ</th>
            <th width="5%">สถานะ</th>
            <th width="10%">การกระทำ</th>
            <th width="15%">การกระทำ</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i=0;$i<count($data);$i++){
            $list = $i +1;
            echo "<tr>
                    <td>".$list."</td>
                    <td>".$data[$i]['title']."</td>
                    <td><img src='../".$data[$i]['path_wall']."' width='80px' height='50px'></td>
                    <td>".$data[$i]['status']."</td>
                    <td>
                        <div class='change_status' data-id='".$data[$i]['id_wall']."' data-status='".$data[$i]['status']."'>
                            
                                ";
                                if($data[$i]['status']){
                                    echo "<a href='../model/manageWall.php?idwall=".$data[$i]['id_wall']."&update=0'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>เลิกใช้</a>";
                                }
                                else{
                                    echo "<a href='../model/manageWall.php?idwall=".$data[$i]['id_wall']."&update=1'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i>ใช้</a>";
                                }
            echo "          
                        </div>
                        </td>
                        <td>
                        <div class='delete_col' data-id='".$data[$i]['id_wall']."'>
                            <a onclick='deleteWall(".$data[$i]['id_wall'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>
                        </div>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</center>


<!-- Modal -->
<div class="modal fade" id="modal_add" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">แก้ไขข้อมูล</h4>
            </div>
            <div class="modal-body" align="center">
                <form action="../model/manageWall.php" method="post" enctype="multipart/form-data" style="width: 100%" class="eventInsForm">
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อโครงงาน</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="n_pro" id="n_pro"/>
                                <input type="hidden" name="id_pro" id="id_pro"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">คำบรรยาย</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="des_pro" id="des_pro"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">รูปภาพ</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="img"/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <input type="submit" name="save" id="save" value="บันทึก"/>
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
