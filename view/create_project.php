<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/9/2017
 * Time: 3:29 PM
 */
include ("header.php");
 $path = "/froala_editor_2.5.1";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
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
        body {
            text-align: center;
        }

        div#myEditor {
            width: 81%;
            margin: auto;
            text-align: left;
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

<div style="margin: 30px 20px 20px 20px;width: 80%;">
    <form action="../model/addProject.php" method="post">
        <div class="row">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">หัวข้อ</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" name="title" id="title"/>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="form-group">
                <div class="control-label col-md-2 col-sm-2 col-xs-12">หมวดหมู่</div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="radio" style="float: left" name="type" value="STUDENT"/> <span class="ch"> PAPER</span><br>
                    <input type="radio" style="float: left" name="type" value="ADMIN"/><span class="ch"> ADMIN</span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                </div>
            </div>
        </div>
    </form>
</div>





<div id="myEditor"></div>
<input type="submit"  name="submit" id="submit" value="submit"/>
<button id="saveButton">Save</button>



<script>
    $(function() {
        $('#myEditor').froalaEditor()
    });

    $('#submit').click (function () {
        console.log($('#myEditor').froalaEditor('html.get', true));
    })
</script>



</body>
<?php
include ("footer.php");
?>
</html>
