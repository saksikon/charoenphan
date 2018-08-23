<?php
require_once('../models/SponsorModel.php');

$path = "modules/sponsor/views/";

$model = new SponsorModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/sponsor/";
$sponsor_id = $_GET['id'];

if(!isset($_GET['action'])){
    $sponsors =$model->getSponsorBy();
    require_once($path.'view.inc.php');

}
else if ($_GET['action'] == "insert"){

    require_once($path.'insert.inc.php');

}
else if ($_GET['action'] == "add"){
    if(isset($_POST['sponsor_name'])){
        $check = true;
        $data = [];
        $data['sponsor_name'] = $_POST['sponsor_name'];
        $data['sponsor_url'] = $_POST['sponsor_url'];
        $data['addby'] = $_POST['addby'];

        if($_FILES['sponsor_image']['name'] == ""){
            $data['sponsor_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["sponsor_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["sponsor_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["sponsor_image"]["tmp_name"], $target_file)) {
                $data['sponsor_image'] = $date.'-'.strtolower(basename($_FILES["sponsor_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $sponsor_id =$model->insertSponsor($data);

            if($sponsor_id){
                ?> <script>window.location="index.php?content=sponsor"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}
else if ($_GET['action'] == 'delete'){

    $sponsor = $model->getSponsorByID($sponsor_id);
    $target_file = $target_dir .$sponsor['sponsor_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    
    $sponsor_id =$model->deleteSponsorByID($sponsor_id);

    ?>
    <script>window.location="index.php?content=sponsor"</script>
    <?php

}
else if ($_GET['action'] == 'update'){
    $sponsor =$model->getSponsorByID($sponsor_id);
    require_once($path.'update.inc.php');
}
else if ($_GET['action'] == "edit"){
    if(isset($_POST['sponsor_name'])){
        $check = true;
        $data = [];
        $data['sponsor_name'] = $_POST['sponsor_name'];
        $data['sponsor_url'] = $_POST['sponsor_url'];

        if($_FILES['sponsor_image']['name'] == ""){
            $data['sponsor_image'] = $_POST['sponsor_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["sponsor_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["sponsor_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["sponsor_image"]["tmp_name"], $target_file)) {

                $data['sponsor_image'] = $date.'-'.strtolower(basename($_FILES["sponsor_image"]["name"]));

                $target_file = $target_dir . $_POST['sponsor_image_o'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        
    
        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $sponsor =$model->updateSponsorByID($sponsor_id,$data);

            if($shop){
                ?> <script>window.location="index.php?content=shop"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}else if ($_GET['action'] == "see"){
   $sponsor =$model->setSponsorView($sponsor_id,$_GET['val']);
   if($sponsor){
    ?>
    <script>window.location="index.php?content=sponsor"</script>
    <?php
}

} 
else{

    $sponsors =$model->getSponsorBy();
    require_once($path.'view.inc.php');

}
?>