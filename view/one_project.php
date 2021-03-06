<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 7/4/2560
 * Time: 12:38
 */
?>
<?php
include ("header.php");

?>


<style>
    .page-head{
        padding: 30px 0 ;
    }
    .sub-subject{
        display: block;
        height: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    p{
        overflow-wrap: break-word;
    }

    .row > .column {
        padding: 8px 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 12.5%;
        cursor: pointer;
    }

    /* The Modal (background) */
    .modal_pic {
        display: none;
        position: fixed;
        z-index: 10;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 1200px;
    }

    /* The Close Button */
    .close {
        color: white;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: #bebebe;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #000000;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    img.demo {
        opacity: 0.6;
        width: 150px;
        height: 150px;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
    }
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
    .detail_sub{
        display: block;
        padding: 30px 30px 30px 30px;
    }
    .li-p{
        float: left;
        display: block;
        width: 20%;
        height: 300px;
        padding: 20px 20px 20px 20px;
    }
    .img-person{
        border-radius: 100%;
        border: 4px solid #e6e6e6;
    }
    .a_person{
        height: 70%;
        width: 100%;
        display: inline-block;
        cursor: pointer;
    }
    .a_person:hover{
        color: #4e6eaf;
    }
    .a_person>.img-person:hover{
        border: 4px solid #4e6eaf;
    }
    body{
        background-color: #F7F7F7;
    }
    label{
        color: black;
    }
</style>
<link rel="stylesheet" href="../css/css_in_project.css">
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')" >
    <div class="container">
        <h1 class="page-title"><?=$data[0]["title"]?></h1>
    </div>
</div>

    <div style="margin: 5% 10% 5% 10%;width: 80%;background-color: white;border:1px solid #b2b2b2;" class="row">
        <div class="sub-subject">
            <div class="detail_sub">
                <p  class="detail"><?=$data[0]["description"]?></p>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div style="margin:20px 20px 20px 20px;padding-top:20px;border-top: 1px solid #b2b2b2;">

            <label><i class="fa fa-picture-o" aria-hidden="true"></i> รูปภาพ</label>
            <div class="row" style="border: 1.5px solid #d9d9d9;width: 100%;margin: 0 0 0 0;">
                <?php
                $iPic=1;$ch_pic = true;
                for($i=0;$i<count($file);$i++){
                    if($file[$i]['type'] == "pic") {
                        $ch_pic = false;
                        ?>
                        <div class="column">
                            <img src="<?=$file[$i]['path']?>" width="100px" height="100px"
                                 onclick="openModal();currentSlide(<?=$iPic?>)" class="hover-shadow">
                            <a href='../model/dwload.php?idfile=<?=$file[$i]['path']?>'>Download</a>
                        </div>
                        <?php
                        $iPic++;
                    }
                }
                if($ch_pic){
                    echo "<div class=\"column\" style='cursor: default'>ไม่มีรูปภาพ</div>";
                }
                ?>
            </div>
            <br/>
            <div style="display: block" class="row">
                <div class="col-md-6 col-sm-6 col-xs-12" >
                        <label><i class="fa fa-file-o" aria-hidden="true"></i> เอกสาร</label>
                        <table border="1" >
                            <tr>
                                <th width="70%">ชื่อไฟล์</th>
                                <th width="30%">ดาวน์โหลด</th>
                            </tr>
                            <?php
                            $ch_pa = true;
                            for($i=0;$i<count($file);$i++){
                                if($file[$i]['type'] == "paper"){
                                    $ch_pa = false;
                                    echo "<tr class=\"table-tr\">
                                    <td>".$file[$i]['name']."</td>
                                    <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'><i class=\"fa fa-download\" aria-hidden=\"true\"></i> Download</a></td>
                                </tr>";
                                }
                            }
                            if($ch_pa){
                                echo "<tr><td colspan='2' style='text-align: center'>ไม่พบข้อมูล</td></tr>";
                            }
                            ?>
                        </table>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" >
                        <label><i class="fa fa-desktop" aria-hidden="true"></i> โปรแกรม</label>
                        <table border="1" >
                            <tr>
                                <th width="70%">ชื่อไฟล์</th>
                                <th width="30%">ดาวน์โหลด</th>
                            </tr>
                            <?php
                            $ch_pro = true;
                            for($i=0;$i<count($file);$i++){
                                if($file[$i]['type'] == "program"){
                                    $ch_pro = false;
                                    echo "<tr class=\"table-tr\">
                                    <td>".$file[$i]['name']."</td>
                                    <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'><i class=\"fa fa-download\" aria-hidden=\"true\"></i> Download</a></td>
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
            <br/>
            <div style="border-top: 1px solid #b2b2b2;">
                <h1 style="margin-top: 20px;margin-bottom:20px;color: black">สมาชิก</h1>
                <center>
                <ul>
                    <?php
                    for($mp=0;$mp<count($mem_project);$mp++){
                    $c_mp = $mp+1;
                    ?>
                    <li class="li-p">
                        <a class="a_person" align="center" href="../controller/profile.php?id=<?=$mem_project[$mp]['id_member']?>">
                            <img src="../images/band_eng.jpg" class="img-person" width="80%" height="70%">
                            <p style="font-weight: bold;font-size: 1.3em"><?=$mem_project[$mp]['name']." ".$mem_project[$mp]['surname']?></p>
                        </a>
                        <p>
                            <?=$mem_project[$mp]['type_user']?>
                        </p>
                        <p>
                            <?=$mem_project[$mp]['position']?>
                        </p>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                </center>
            </div>
        </div>
        <br/>
    </div>


<div id="myModal_pic" class="modal_pic">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <?php
        $i2=0;
        for($i=0;$i<count($file);$i++){
            if($file[$i]['type'] == "pic") {
                $i2 = $i2+1;
            ?>
            <div class="mySlides">
                <div class="numbertext"><?=$i2?> / <?=count($file)?></div>
                <center>
                    <img src="<?=$file[$i]['path']?>" width="auto" height="350px">
                </center>
            </div>
            <?php
            }
        }
        ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>
        <?php
        $i2=0;
        for($i=0;$i<count($file);$i++){
        if($file[$i]['type'] == "pic") {
        $i2 = $i2+1;
        ?><center>
        <div class="column">
            <img class="demo" src="<?=$file[$i]['path']?>" onclick="currentSlide(<?=$i2?>)" alt="<?=$file[$i]['name']?>">
        </div></center>
            <?php
        }
        }
        ?>
    </div>
</div>
<?php
include ("footer.php");
?>
<script>
    function openModal() {
        document.getElementById('myModal_pic').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal_pic').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>

