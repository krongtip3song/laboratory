<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/9/2017
 * Time: 3:29 PM
 */
include ("header.php");

$path = "../lib/froala_editor_2.5.1";
$path_selec = "../lib/selectize.js-master/examples";
$user = getAllUsers();
$i=0;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>

    <script>
        var i = 0;
        var i_main_pic = 0;
        var user;
        var member = [];
    </script>





    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/froala_editor.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/froala_style.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/code_view.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/colors.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/emoticons.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/image_manager.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/image.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/line_breaker.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/table.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/char_counter.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/video.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/fullscreen.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/file.css">
    <link rel="stylesheet" href="<?php echo "$path"; ?>/css/plugins/quick_insert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <style>

        div#myEditor {
            width: 100%;
            margin: auto;
            text-align: left;
        }
        a{
            cursor: pointer;
        }
    </style>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

<script type="text/javascript" src=" <?php echo "$path"; ?>/js/froala_editor.min.js" ></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/align.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/file.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/image.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/link.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/table.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/save.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/url.min.js"></script>
<script type="text/javascript" src="<?php echo "$path"; ?>/js/plugins/video.min.js"></script>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="/resources/demos/style.css">

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
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
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">เพิ่มโครงงาน</h4>
    </div>
</div>
<div class="test_data" data-id="<?=$idpro?>"></div>
<center>
    <div style="margin: 30px 20px 20px 20px;width: 80%;">
        <form action="../model/uploadFile_edit.php" method="post" enctype="multipart/form-data" id="form">
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">หัวข้อ</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" name="title" id="title"  value="<?php echo $data[0]["title"] ?>"/>
                        <input type="hidden"  name="id_project" id="id_project"  value="<?php echo $idpro; ?>"/>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="control-label col-md-2 col-sm-2 col-xs-12">วันที่สร้าง</div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="date" style="float: left" name="date" id="date" value="<?php echo date("Y-m-d",strtotime($data[0]["date_Occurred"])); ?>" />
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="form-group">
                    <div class="control-label col-md-2 col-sm-2 col-xs-12">หมวดหมู่</div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <select id="category" name="category">
                            <?php
                            $cat = getCategory();
                            for($i=0;$i<count($cat);$i++){
                                echo "<option value='";
                                echo $cat[$i]["id_category"];
                                echo "' ";
                                if($cat[$i]["id_category"]==$data[0]["id_category"]){
                                    echo "selected";
                                }
                                echo ">";
                                echo $cat[$i]["name_category"];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <div id="myEditor"><?php
                echo $data[0]["description"];
                ?></div>
            <br/>
            <br/>
            <div id="mem">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">ผู้มีส่วนเกี่ยวข้อง</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <script>
                                document.write("<input type='text' class='tags' id='"+i+"'>")
                            </script>
                        </div>
                        <label class="control-label col-md-1 col-sm-1 col-xs-12">ตำแหน่ง</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <script>
                                document.write("<input type='text' id='pos"+i+"'>")
                            </script>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">เปอร์เซ็นการมีส่วนร่วม</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <script>
                                document.write("<input type='text' id='per"+i+"'>")
                            </script>
                        </div>

                    </div>
                </div>
            </div>
            <a class="addMem">add more</a>
            <br/>
            <br/>
            <div id="pic">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">รูปภาพ</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="file" name="picUpload[]" id="picUpload[]"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12"></div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type='text' name='textPic[]' id='textPic[]'/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <script>
                                document.write("<input type='radio' name='main_pic' class='main_pic' value='"+i_main_pic+"'/> รูปหลัก")
                            </script>

                        </div>
                    </div>
                </div>
            </div>
            <a class="addPic">add more</a>
            <br/>
            <br/>
            <div id="pap">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">เอกสาร</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="file" name="papUpload[]" id="papUpload[]"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12"></div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type='text' name='textPap[]' id='textPap[]'/>
                        </div>
                    </div>
                </div>
            </div>
            <a class="addPap">add more</a>
            <br/>
            <br/>
            <div id="pro">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">โปรแกรม</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="file" name="proUpload[]" id="proUpload[]"/>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12"></div>
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">ชื่อ</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type='text' name='textPro[]' id='textPro[]'/>
                        </div>
                    </div>
                </div>
            </div>
            <a class="addPro">add more</a>
            <br/>
            <br/>
            <div style="margin-top: 20px">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12" >
                        <table border="1" width="50%">
                            <tr>
                                <th colspan="2">รูปภาพ</th>
                                <th>ลบ</th>
                            </tr>
                            <?php
                            $ch_pic = true;
                            for($i=0;$i<count($file);$i++){
                                if($file[$i]['type'] == "pic"){
                                    $ch_pic = false;
                                    echo "<tr>
                                        <td><img src='".$file[$i]['path']."' width='80px' height='50px'>"."</td>
                                        <td>".$file[$i]['name']."</td>
                                        <td>
                                        <div class='delete_col' data-id='".$file[$i]['id_file']."'>
                                        <input type=\"submit\" class=\"delete\" value='Delete'/>
                                        </div>
                                        </td>
                                    </tr>";
                                }
                            }
                            if($ch_pic){
                                echo "<tr><td colspan='3' style='text-align: center'>ไม่พบข้อมูล</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" >
                        <table border="1" width="50%">
                            <tr>
                                <th colspan="2">เอกสาร</th>
                                <th>ลบ</th>
                            </tr>
                            <?php
                            $ch_pa = true;
                            for($i=0;$i<count($file);$i++){
                                if($file[$i]['type'] == "paper"){
                                    $ch_pa = false;
                                    echo "<tr>
                                            <td>".$file[$i]['name']."</td>
                                            <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'>Download</a></td>
                                        </tr>";
                                }
                            }
                            if($ch_pa){
                                echo "<tr><td colspan='3' style='text-align: center'>ไม่พบข้อมูล</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" >
                        <table border="1" width="50%">
                            <tr>
                                <th colspan="2">โปรแกรม</th>
                                <th>ลบ</th>
                            </tr>
                            <?php
                            $ch_pro = true;
                            for($i=0;$i<count($file);$i++){
                                if($file[$i]['type'] == "program"){
                                    $ch_pro = false;
                                    echo "<tr>
                                    <td>".$file[$i]['name']."</td>
                                    <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'>Download</a></td>
                                </tr>";
                                }
                            }
                            if($ch_pro){
                                echo "<tr><td colspan='3' style='text-align: center'>ไม่พบข้อมูล</td></tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <br/>
            <br/>

            <input type="submit"  name="submit" id="submit" value="submit"/>



        </form>
    </div>
</center>

<script>

    var percent = [];
    var position = [];
    $(function() {
        $('#myEditor').froalaEditor()
    });


    $('#submit').click (function () {
        for(j=0;j<=i;j++){
            var pos = "#pos"+j;
            var per = "#per"+j;
            position[j] = $(pos).val();
            percent[j] = $(per).val();
        }
        var id = $('.test_data').data('id');
        alert(id);
        var title = $('#title').val();
        var date_occ = $('#date').val();
        var cat = $('#category').val();    //'input[name="category"]:checked'
        var html = $('#myEditor').froalaEditor('html.get', true );

        var d = {id_project:id,
            html: html,
            title : title,
            category : cat,
            date_occ : date_occ,
            member : member,
            position : position,
            percent : percent,
        };

        $.ajax({
            type: 'POST',
            url: "../model/editProject.php",
            data: d,
            success: function(result) {
                alert(result);
            },
            async:false
        });
        // $.post("../model/addProject.php",d, function(data, status){

        // });
    })
    $(".addMem").click(function () {
        i++;
        /*var b =   for($i=0;$i<count($user);$i++) {echo "<option value=".$user[$i][id_member].'>'.$user[$i][name]."</option>";} ?>*/
        var a = " <div class='row'> <div class='form-group'> <label class='control-label col-md-2 col-sm-2 col-xs-12'></label> <div class='col-md-2 col-sm-2 col-xs-12'>";

        a = a +"<input class='tags' id='";
        a = a + i;
        a = a+"'>";
        a = a+"</select> </div><label class='control-label col-md-1 col-sm-1 col-xs-12'></label> <div class='col-md-3 col-sm-3 col-xs-12'>";
        a = a+"<input id='pos";
        a = a + i;
        a = a + "'>";
        a = a+"</div><label class='control-label col-md-2 col-sm-2 col-xs-12'></label> <div class='col-md-2 col-sm-2 col-xs-12'>";
        a = a+"<input id='per";
        a = a + i;
        a = a+"'>"
        a = a+"</div> </div> </div> <br/>";
        $("#mem").append(a);
        $(document).ready(function() {
            var availableTags = [
                <?php
                for($i=0;$i<count($user);$i++){
                    $name = $user[$i]['name']." ".$user[$i]['surname'];
                    $id = $user[$i]['id_member'];
                    echo "{label :'".$name."',value:'".$id."'},";
                }
                ?>
            ];
            function split( val ) {
                return val.split( /,\s*/ );
            }
            function extractLast( term ) {
                return split( term ).pop();
            }
            $(".tags").autocomplete({
                minLength: 0,
                source: function( request, response ) {
                    // delegate back to autocomplete, but extract the last term
                    response( $.ui.autocomplete.filter(
                        availableTags, extractLast( request.term ) ) );
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.label );

                    // add array by bird
                    member[$(this).attr("id")]= ui.item;
                    // add placeholder to get the comma-and-space at the end
                    // terms.push( "" );
                    this.value = terms.join( ", " );
                    return false;
                }
            });
        } );
    });
    $(".addPic").click(function () { i_main_pic++;
        var a = " <div class='row'> <div class='form-group'> <div class='control-label col-md-2 col-sm-2 col-xs-12'></div> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='file' name='picUpload[]' id='picUpload[]'> </div> <div class='col-md-2 col-sm-2 col-xs-12'></div><label class='control-label col-md-2 col-sm-2 col-xs-12'>ชื่อ</label> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='text' name='textPic[]' id='textPic[]'/> </div> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='radio' name='main_pic' class='main_pic' value='"+i_main_pic+"'/> รูปหลัก </div></div> </div>";
        $("#pic").append(a);
    });
    $(".addPap").click(function () {
        var a = " <div class='row'> <div class='form-group'> <div class='control-label col-md-2 col-sm-2 col-xs-12'></div> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='file' name='papUpload[]' id='papUpload[]'> </div> <div class='col-md-2 col-sm-2 col-xs-12'></div><label class='control-label col-md-2 col-sm-2 col-xs-12'>ชื่อ</label> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='text' name='textPap[]' id='textPap[]'/> </div> </div> </div>";
        $("#pap").append(a);
    });
    $(".addPro").click(function () {
        var a = " <div class='row'> <div class='form-group'> <div class='control-label col-md-2 col-sm-2 col-xs-12'></div> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='file' name='proUpload[]' id='proUpload[]'> </div> <div class='col-md-2 col-sm-2 col-xs-12'></div><label class='control-label col-md-2 col-sm-2 col-xs-12'>ชื่อ</label> <div class='col-md-2 col-sm-2 col-xs-12'> <input type='text' name='textPro[]' id='textPro[]'/> </div> </div> </div>";
        $("#pro").append(a);
    });
    $(document).on("click", ".main_pic", function () {
        var a = $(this).parent().parent().find("input[type=file]").val();
    });
</script>

<script>
    /*  $( function() {
     var availableTags = [
     <
     $user = getAllUsers();
     for($i=0;$i<count($user);$i++) {
     echo "'".$user[$i]['name']."',";
     }
     ?>
     ];
     $( "input.tag" ).autocomplete({
     source: availableTags
     });
     } );*/
</script>
<script>
    $(document).ready(function() {
        var availableTags = [
            <?php
            for($i=0;$i<count($user);$i++){
                $name = $user[$i]['name']." ".$user[$i]['surname'];
                $id = $user[$i]['id_member'];
                echo "{label :'".$name."',value:'".$id."'},";
            }
            ?>
        ];
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) {
            return split( term ).pop();
        }
        $(".tags").autocomplete({
            minLength: 0,
            source: function( request, response ) {
                // delegate back to autocomplete, but extract the last term
                response( $.ui.autocomplete.filter(
                    availableTags, extractLast( request.term ) ) );
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
                var terms = split( this.value );
                // remove the current input
                terms.pop();



                // add the selected item
                terms.push( ui.item.label );
                // add placeholder to get the comma-and-space at the end
                // terms.push( "" );
                // add array by bird
                member[$(this).attr("id")]= ui.item;
                this.value = terms.join( ", " );
                return false;
            }
        });
    } );

</script>
<script>
    $(document).on("click", ".delete_col", function () {
        var id = $(this).data('id');
        var tr = $(this).parent().parent();
        var d = {id_file: id,};
        $.ajax({
            type: 'POST',
            url: "../model/deleteFile.php",
            data: d,
            success: function(result) {
                    alert(result);
            },
            async:false
        });
        tr.hide();
        alert(id);
    });
</script>

</body>
<?php
include ("footer.php");
?>
</html>
