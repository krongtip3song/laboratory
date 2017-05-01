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
<!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>-->
<script>
    $(document).ready( function () {
        //$('#table_id').dataTable();
        $(".libtn").click(function () {
            var cat = $(this).data("value");
            window.location = "../controller/allproject.php?cat="+cat;
        });
    });
    function deleteProject(id) {
        if( confirm("Do you want to delete ?") ){
            //window.location = "../model/deleteProject.php?idpro="+id;
            $.ajax({
                url: "../model/deleteProject.php" ,
                type: "POST",
                data: {idpro:id},
                dataType: "json"
            })
            .success(function(result) {
                if(result){
                    alert("SUCCESS");
                    location.reload();
                }
                else {
                    alert("FAIL");
                }
            });
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
    .post .featured-image img {
        width: 300px;
        height: 250px;
    }
    .banner{
        background: seagreen;
        position: absolute;
        z-index: 100;
        padding-right: 15px;
        width: 100%;
        color: white;
        line-height: 18px;
        font-weight: normal;
        font-size: 0.9em;
        text-align: right;
        text-transform: uppercase;
        height: 18px;
    }
    .name_pro{
        margin-top: 30px;
        padding: 0 15px;
        overflow: hidden;
        color: black;
        font-size: 1em;
    }
    .post{
        z-index: 10;
        box-shadow: -5px -5px #c2c2c2;
        border: 1px solid #dbdbdb;
        border-bottom: 2px solid mediumseagreen;
    }
    .date{
        padding: 0 15px;
        overflow: hidden;
        color: #999999;
    }
    #div_search{
        padding: 30px 60px 30px 60px;
    }
    #search{
        width: 30%;
        float: right;
    }
    #ulcat{
        list-style: none;
        text-align: left;
        width: 100%;
    }
    .libtn{
        box-sizing: border-box;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
        text-align: left;
        float: left;
        width: 100%;
        color: #3d3e3f;
        opacity: 1;
        background: none;
        border: none;
    }
    .licat{
        position: relative;
        font-size: 1em;
        height: 28px;
        line-height: 28px;
        padding: 0;
        overflow: hidden;
        width: 100%;
    }
    section{
        padding:10px 10px;
    }
    button{
        font-size: 100%;
    }
    .licat:hover{
        background-color: #0a8ec4;
        color: white;
    }
    h2,small{
        text-align: left;
    }
    .post:after {
        margin-top: 0;
    }
    .post:hover{
        filter: brightness(0.95);
    }
    .entry-title{
        display: block;
        height: auto;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="container">
        <h4 class="page-title">โครงงานทั้งหมด</h4>
    </div>
</div>
<center>
    <div class="row">
        <div style="margin: 20px 20px 20px 20px;">
            <div class="row" id="div_search" style="border-bottom: 1px solid black;width: 80%">
                <form action="../controller/allproject.php" method="get">
                    <div class="input-group" style="">
                        <input type="text" class="form-control" placeholder="Search ..." name="search" id="search">
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </span>
                    </div>
                </form>
            </div>
            <section style="float: left;width: 60%;margin-left: 8%;padding: 30px 20px 30px 20px;">
                <?php
                if(count($data) == 0){
                    echo "<h1>ไม่พบข้อมูล</h1>";
                }
                for($l_pro = 0;$l_pro<count($data);$l_pro++) {
                    if($l_pro%3==0){
                        echo "<div class=\"row\">";
                    }
                    ?>
                    <div class="col-md-4">
                        <a href="../controller/project.php?id=<?=$data[$l_pro]['id_project']?>">
                            <div class="post" style="background-color: white">
                                <?php
                                $img = getMainPicProject($data[$l_pro]['id_project']);
                                if($img == null){
                                    $img = "images/ON40SA0.jpg";
                                }
                                ?>
                                <div><img src="../<?=$img?>" alt="" width="100%" height="180px"></div>
                                <div class="banner"><?=$data[$l_pro]['name_category']?></div>
                                <div class="name_pro">
                                    <h2 class="entry-title"><?=$data[$l_pro]['title']?></h2>
                                </div>
                                <div>
                                    <small class="date"><?=date("d F Y",strtotime($data[$l_pro]['date_Occurred']))?></small>
                                </div>
                                <div style="display: inline-block;width: 100%">
                                    <?php
                                    if($type_user == "ADMIN"){
                                    ?>
                                    <div style="text-align: left;padding-left: 15px;float: left">
                                        <a href="../controller/edit_project.php?id=<?=$data[$l_pro]['id_project']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</a>
                                    </div>
                                    <div style="padding-right: 15px;float: right">
                                        <a onclick='deleteProject(<?=$data[$l_pro]['id_project']?>)' style="cursor: pointer"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</a>
                                    </div>
                                    <?php
                                    }
                                    else {
                                        if($type_user == "TEACHER"){
                                            $ch = false;
                                            for ($i_my=0;$i_my<count($myproject);$i_my++){
                                                if($data[$l_pro]['id_project'] == $myproject[$i_my]['id_project']){
                                                    $ch = true;
                                                    break;
                                                }
                                            }
                                            if($ch){
                                                echo "<div style=\"text-align: left;padding-left: 15px;float: left\">
                                        <a href='../controller/edit_project.php?id=".$data[$l_pro]['id_project']."'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> แก้ไข</a>
                                    </div>
                                    <div style=\"padding-right: 15px;float: right\">
                                        <a onclick='deleteProject(".$data[$l_pro]['id_project']."' style=\"cursor: pointer\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i> ลบ</a>
                                    </div>";
                                            }
                                        }
                                        else{
                                            if($type_user == "STUDENT"){
                                                $ch = false;
                                                for ($i_my=0;$i_my<count($myproject);$i_my++){
                                                    if($data[$l_pro]['id_project'] == $myproject[$i_my]['id_project']){
                                                        $ch = true;
                                                        break;
                                                    }
                                                }
                                                if($ch){
                                                    echo "<div style=\"text-align: left;padding-left: 15px;float: left\">
                                        <a href='../controller/edit_project.php?id=".$data[$l_pro]['id_project']."'><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> แก้ไข</a>
                                    </div>";
                                                }
                                            }
                                            else{
                                                echo "<br/>";
                                            }
                                        }
                                    ?>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                    if($l_pro%3==2){
                        echo "</div>";
                    }
                }
                ?>
            </section>
            <section style="float: left;width: 20%;display: inline;;margin-right: 8%;">
                    <h2 style="margin: 10px 10px;color: black;text-align: left">หมวดหมู่</h2>
                    <section style="border-top: 1px solid black">
                        <ul id="ulcat">
                            <?php
                            for($i_cat=0;$i_cat<count($cat);$i_cat++){
                                echo "<li class='licat'><button class='libtn' style='height: 100%' data-value='".$cat[$i_cat]['name_category']."'>".$cat[$i_cat]['name_category']."<span style='width:50px;float:right;text-align: right;opacity: 1;'>".$cat[$i_cat]['count']."</span></button></li>";
                            }
                            ?>
                        </ul>
                    </section>
            </section>
        </div>
    </div>
</center>



<?php
include ("footer.php");
?>
