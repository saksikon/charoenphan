<?php
require_once('../models/FoodTypeModel.php');

$path = "modules/food_type/views/";

$food_type_model = new FoodTypeModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/food_type/";
$food_type_id = $_GET['id'];

if(!isset($_GET['action'])){
    $food_type = $food_type_model->getFoodTypeBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == "insert"){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $food_type = $food_type_model->getFoodTypeByID($food_type_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == "add"){
    if(isset($_POST['food_type_name'])){
        $check = true;
        $data = [];
        $data['food_type_name'] = $_POST['food_type_name'];
        $data['addby'] = $user[0][0];

        if($_FILES['food_type_image']['name'] == ""){
            $data['food_type_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["food_type_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["food_type_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["food_type_image"]["tmp_name"], $target_file)) {
                $data['food_type_image'] = $date.'-'.strtolower(basename($_FILES["food_type_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $food_type_model->insertFoodType($data);

            if($result){
                ?> <script>window.location="index.php?content=food_type"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == "edit"){
    if(isset($_POST['food_type_name'])){
        $check = true;
        $data = [];
        $data['food_type_name'] = $_POST['food_type_name'];
        $data['updateby'] = $user[0][0];

        if($_FILES['food_type_image']['name'] == ""){
            $data['food_type_image'] = $_POST['food_type_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["food_type_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["food_type_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["food_type_image"]["tmp_name"], $target_file)) {

                $data['food_type_image'] = $date.'-'.strtolower(basename($_FILES["food_type_image"]["name"]));

                $target_file = $target_dir . $_POST['food_type_image_o'];
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
            $result = $food_type_model->updateFoodTypeByID($food_type_id,$data);

            if($result){
                ?> <script>window.location="index.php?content=food_type"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'delete'){
    $food_type = $food_type_model->getFoodTypeByID($food_type_id);
    $target_file = $target_dir .$food_type['food_type_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    
    $result = $food_type_model->deleteFoodTypeByID($food_type_id);

    ?> <script>window.location="index.php?content=food_type"</script> <?php

}else{
    $food_type = $food_type_model->getFoodTypeBy();
    require_once($path.'view.inc.php');
}
?>