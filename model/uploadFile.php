<?php
/**
 * Created by PhpStorm.
 * User: Bird
 * Date: 4/10/2017
 * Time: 3:13 PM
 */
include "../config.inc.php";
include("../model/getData.php");

$title = $_POST["title"];
$cat = $_POST["category"];
if(isset($_POST["main_pic"])){
    $main_pic = $_POST["main_pic"];
}

if($cat =="PAPER"){$category = "1";}
else{$category = "2";}
$data = getIDProject($title,$category);
print_r($data);
$idPro =   $data[0]["id_project"];
$path = "../";
$target_dir = $path."uploads/".$title."/";
//if($_FILES["picUpload"]["name"][0]=="")
if (!is_dir("$target_dir")) {
    mkdir("$target_dir", 0777, true);
}

    $pic = "picUpload";
    $namePic = $_POST["textPic"];
    for($i=0;$i<count($_FILES["$pic"]["name"]);$i++) {
        $target_file = $target_dir . $_FILES["$pic"]["name"][$i];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if($namePic[$i]==""){
        $namePic[$i] = $_FILES["$pic"]["name"][$i];
    }else{
        $namePic[$i]= $namePic[$i].".".$fileType;
    }
        $target_file = $target_dir . $namePic[$i];
        $uploadOk = 1;


// Check if file already exists
        if (file_exists($target_file)) {
           // echo "Sorry, file already exists.";
            $uploadOk = 1;
        }
// Check file size
        if ($_FILES["$pic"]["size"][$i] > 500000) {
         //   echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          //  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["$pic"]["tmp_name"][$i], $target_file)) {
               // echo "The file " . $namePic[$i] . " has been uploaded.";
                uploadFile($conn,$namePic[$i],$target_file,"pic",$idPro,"1");


                if(isset($_POST["main_pic"])){
                    if($i==$main_pic){
                        $path_main_pic = substr($target_file,3);
                        $sql_mp = "INSERT INTO wall_index (id_project,path_wall,status)VALUES('$idPro','$path_main_pic','0')";
                        $conn->exec($sql_mp);
                    }
                }

            } else {
               // echo "Sorry, there was an error uploading your file.";
            }
        }
    }

$pap = "papUpload";
$namePap = $_POST["textPap"];
for($i=0;$i<count($_FILES["$pap"]["name"]);$i++) {
    $target_file = $target_dir . $_FILES["$pap"]["name"][$i];
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if($namePap[$i]==""){
        $namePap[$i] = $_FILES["$pap"]["name"][$i];
    }else{
        $namePap[$i]= $namePap[$i].".".$fileType;
    }
    $target_file = $target_dir . $namePap[$i];
    $uploadOk = 1;


// Check if file already exists
    if (file_exists($target_file)) {
       //echo "Sorry, file already exists.";
        $uploadOk = 1;
    }
// Check file size
    if ($_FILES["$pap"]["size"][$i] > 500000) {
       // echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
       // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["$pap"]["tmp_name"][$i], $target_file)) {
           // echo "The file " . $namePap[$i] . " has been uploaded.";
            uploadFile($conn,$namePap[$i],$target_file,"paper",$idPro,"1");
        } else {
           // echo "Sorry, there was an error uploading your file.";
        }
    }
}

$pro = "proUpload";
$namePro = $_POST["textPap"];
for($i=0;$i<count($_FILES["$pro"]["name"]);$i++) {
    $target_file = $target_dir . $_FILES["$pro"]["name"][$i];
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if($namePro[$i]==""){
        $namePro[$i] = $_FILES["$pro"]["name"][$i];
    }else{
        $namePro[$i]= $namePro[$i].".".$fileType;
    }
    $target_file = $target_dir . $namePro[$i];
    $uploadOk = 1;


// Check if file already exists
    if (file_exists($target_file)) {
       // echo "Sorry, file already exists.";
        $uploadOk = 1;
    }
// Check file size
    if ($_FILES["$pro"]["size"][$i] > 500000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
       // echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["$pro"]["tmp_name"][$i], $target_file)) {
           // echo "The file " . $namePro[$i] . " has been uploaded.";
            uploadFile($conn,$namePro[$i],$target_file,"program",$idPro,"1");
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
echo "<script>window.location = '../controller/allproject.php';</script>";
?>



<?php   // add data to data base
    function uploadFile($conn,$name,$path,$type,$id,$rank=100){
        $sql = "INSERT INTO file (id_project,name,path,type,rank)VALUES('$id','$name','$path','$type','$rank')";
        $res = $conn->exec($sql);
        if($res){
            echo "SUCCESS";
        }
        else{
            echo "FAIL";
        }
    }

?>
