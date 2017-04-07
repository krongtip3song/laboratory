<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/3/2560
 * Time: 23:48
 */


?>

<?php
    include ("../model/getData.php");
    include ("header.php");
    $count_user = getCountUser();
    $count_project = getCountProject();
    $count_project_in_cat = getCountProjectInCategory();
    $count_visitor = getCountVisitor();
?>
<style>
        .page-head .tile_count .tile_stats_count .count {
            font-size: 30px;
        }
        .page-head .tile_count .tile_stats_count:before {
            content: "";
            position: absolute;
            left: 0;
            height: 65px;
            border-left: 2px solid white;
        }
        .page-head .tile_count .tile_stats_count {
            padding: 0 10px 0 20px;
            position: relative;
        }
        .page-head{
            padding: 30px 0 ;
        }
        .widget_summary{
            display: inline-flex;
            width: 100%;
        }
        .x_content{
            border: 1px solid #E6E9ED;
        }
        .pad{
            padding: 30px 30px 30px 30px;
        }
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')">
    <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> ผู้ใช้ทั้งหมด</span>
            <div class="count"><?=$count_user?></div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> โครงงานทั้งหมด</span>
            <div class="count green"><?=$count_project?></div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> ผู้เข้าชมทั้งหมด</span>
            <div class="count"><?=$count_visitor?></div>

        </div>
    </div>
</div>
<div class="row tile_count">
    <div class="col-sm-2 pad"></div>
    <div class="col-sm-4 pad">
        <div class="x_content">
            <h4>Category projects</h4>
            <?php
                for ($i=0;$i<count($count_project_in_cat);$i++){
                    $percent = ($count_project_in_cat[$i]['count']/$count_project)*100;
            ?>
            <div class="widget_summary">
                <div class="w_left w_25" style="width: 25%;float: left;text-align: left">
                    <span><?=$count_project_in_cat[$i]['name_category']?></span>
                </div>
                <div class="w_center w_55" style="width: 55%;float: left">
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percent?>%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20" style="width: 20%;float: left;text-align: right">
                    <span><?=$count_project_in_cat[$i]['count']?></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="col-sm-4 pad">
        <div class="x_content">
            <h4>App Usage across versions</h4>
            <div class="widget_summary">
                <div class="w_left w_25" style="width: 25%;float: left;text-align: left">
                    <span>0.1.5.2</span>
                </div>
                <div class="w_center w_55" style="width: 55%;float: left">
                    <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                            <span class="sr-only">60% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="w_right w_20" style="width: 20%;float: left;text-align: right">
                    <span>123k</span>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>
    </div>
    <div class="col-sm-2 pad"></div>
    </div>
</div>

<?php
include ("footer.php");
?>
