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
</style>
<div class="page-head" data-bg-image="../images/page-head-3.jpg" style="background-image: url('../images/page-head-3.jpg')" >
    <div class="container">
        <h4 class="page-title">โครงงาน</h4>
    </div>
</div>

    <div style="margin: 5% 10% 5% 10%;;width: 80%;">
        <?php
        echo $data[0]["description"];
        ?>
        <div>
            <label>Download</label>
            <table border="1" width="50%">
                <tr>
                    <td colspan="2">รูปภาพ</td>
                </tr>
                <?php
                for($i=0;$i<count($file);$i++){
                    if($file[$i]['type'] == "pic"){
                        echo "<tr>
                                <td>".$file[$i]['name']."</td>
                                <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'>Download</a></td>
                            </tr>";
                    }

                }
                ?>
                <tr>
                    <td colspan="2">เอกสาร</td>
                </tr>
                <?php
                for($i=0;$i<count($file);$i++){
                    if($file[$i]['type'] == "paper"){
                        echo "<tr>
                                <td>".$file[$i]['name']."</td>
                                <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'>Download</a></td>
                            </tr>";
                    }

                }
                ?>
                <tr>
                    <td colspan="2">โปรแกรม</td>
                </tr>
                <?php
                for($i=0;$i<count($file);$i++){
                    if($file[$i]['type'] == "program"){
                        echo "<tr>
                                <td>".$file[$i]['name']."</td>
                                <td><a href='../model/dwload.php?idfile=".$file[$i]['path']."'>Download</a></td>
                            </tr>";
                    }

                }
                ?>
            </table>
        </div>
    </div>



<?php
include ("footer.php");
?>

