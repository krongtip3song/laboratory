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
        var check;
        $('#cat').keyup(function () {
            var cat = $('#cat').val();
            $.ajax({
                url: "../model/findCategory.php" ,
                type: "POST",
                data: {cat:cat}
            })
                .success(function(result) {
                    if(result == "true"){
                        $('#cat').css("border","1px solid green");
                        check = true;
                    }
                    else{
                        $('#cat').css("border","1px solid red");
                        check = false;
                    }
                });
        });
        $('#cat').change(function () {
            var cat = $('#cat').val();
            $.ajax({
                url: "../model/findCategory.php" ,
                type: "POST",
                data: {cat:cat}
            })
                .success(function(result) {
                    if(result == "true"){
                        $('#cat').css("border","1px solid green");
                        check = true;
                    }
                    else{
                        $('#cat').css("border","1px solid red");
                        check = false;
                    }
                });
        });
        $('#add').click(function () {
            var insert_cat = $('#cat').val();

            if (insert_cat == "") {
                $('#cat').css("border", "1px solid red");
                return false;
            }
            if (!check) {
                alert("ชื่อซ้ำ");
                return false;
            }
        });
        $(document).on("click", ".edit_col", function () {
            $('#add').val("แก้ไข");
            $('#add').attr("name","edit");
            $('#add').attr("id","edit");
            $('#cancel').attr("type","submit");
            var id = $(this).data('id');
            $('#idcat').val(id);
            var data = <?=json_encode($data);?>;
            var cat_select;
            for(var i=0;i<data.length;i++){
                if(id == data[i]['id_category']){
                    cat_select = data[i];
                    break;
                }
            }
            $('#cat').val(cat_select['name_category']);
        });
        $('#cancel').click(function () {
            $('#cat').val("");
            $('#add').val("เพิ่ม");
            $('#add').attr("name","add");
            $('#add').attr("id","add");
            $('#cancel').attr("type","hidden");
        });
    });
    function deleteCat(id) {
        if( confirm("Do you want to delete ?") ){
            window.location = "../model/manageCat.php?idcat="+id;
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
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">หมวดหมู่ทั้งหมด</h4>
    </div>
</div>
<center>
    <div style="margin: 20px 20px 20px 20px;width: 50%;">
        <div>
            <form action="../model/manageCat.php" method="post" >
                <label>ชื่อหมวดหมู่</label>
                <input type="text" name="cat" id="cat"/>
                <input type="hidden" name="idcat" id="idcat"/>
                <input type="submit" name="add" value="เพิ่ม" id="add"/>
                <input type="hidden" name="cancel" value="ยกเลิก" id="cancel"/>
            </form>

        </div>
        <table class="display" id="table_id">
            <thead>
            <tr>
                <th width="10%">ลำดับ</th>
                <th width="50%">ชื่อหมวดหมู่</th>
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
                            <a><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>แก้ไข</a>
                        </div>  
                        <div class='delete_col' data-id='".$data[$i]['id_category']."'>
                            <a onclick='deleteCat(".$data[$i]['id_category'].")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i>ลบ</a>
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
