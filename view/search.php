<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 15/4/2560
 * Time: 23:03
 */
?>
<?php
include ("header.php");

?>
<style>
    .post .featured-image img {
        width: 300px;
        height: 250px;
    }
    .banner{
        background: #119c0a;
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
        border-bottom: 2px solid #119c0a;
    }
    .date{
        padding: 0 15px;
        overflow: hidden;
        color: #999999;
    }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')" >
    <div class="container">
        <h4 class="page-title">search</h4>
    </div>
</div>

<div style="margin: 5% 10% 5% 10%;;width: 80%;">
    <form action="../controller/search.php" method="get">
        <input type="text" name="search"/>
    </form>
    <?php
    for($l_pro = 0;$l_pro<count($data);$l_pro++) {
        if($l_pro%4==0){
            echo "<div class=\"row\">";
        }
        ?>
        <div class="col-md-3">
            <a href="../controller/project.php?id=<?=$data[$l_pro]['id_project']?>">
                <div class="post" style="background-color: white">
                    <?php
                    $img = getMainPicProject($data[$l_pro]['id_project']);
                    if($img == null){
                        $img = "images/mainpic.jpg";
                    }
                    ?>
                    <div><img src="../<?=$img?>" alt="" width="100%" height="200px"></div>
                    <div class="banner"><?=$data[$l_pro]['name_category']?></div>
                    <div class="name_pro">
                        <h2 class="entry-title"><?=$data[$l_pro]['title']?></h2>
                    </div>
                    <div>
                        <small class="date"><?=date("d F Y",strtotime($data[$l_pro]['date_Occurred']))?></small>
                    </div>


                </div>
            </a>
        </div>
        <?php
        if($l_pro%4==3){
            echo "</div>";
        }
    }
    ?>
</div>
<?php
include ("footer.php");
?>
