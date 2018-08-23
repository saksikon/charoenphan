<?php
require_once('../models/FoodModel.php');
require_once('../models/FoodTypeModel.php');

$path = "modules/food/views/";

$food_model = new FoodModel;
$food_type_model = new FoodTypeModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/food/";

$food_id = $_GET['id'];

if(!isset($_GET['action'])){
    $food = $food_model->getFoodBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    $food_type = $food_type_model->getFoodTypeBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $food_type = $food_type_model->getFoodTypeBy();
    $food = $food_model->getFoodByID($food_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $food = $food_model->getFoodByID($food_id);
    for ($i = 1; $i <= 5; $i++){
        $target_file = $target_dir .$food['food_image'];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }

    $food = $food_model->deleteFoodByID($food_id);
    ?> <script>window.location="index.php?content=food"</script> <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['food_name'])){
        $check = true;
        $data = [];
        $data['food_type_id'] = trim($_POST['food_type_id']);
        $data['food_name'] = trim($_POST['food_name']);
        $data['food_detail'] = trim($_POST['food_detail']);
        $data['food_price'] = trim($_POST['food_price']);
        $data['addby'] = $user[0][0];
        
        if($_FILES['food_image']['name'] == ""){
            $data['food_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['food_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['food_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['food_image']['tmp_name'], $target_file)) {
                $data['food_image'] = $date.'-'.strtolower(basename($_FILES['food_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $food_model->insertFood($data);

            if($result){
                ?> <script>window.location="index.php?content=food"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['food_id'])){
        $check = true;
        $data = [];
        $data['food_type_id'] = trim($_POST['food_type_id']);
        $data['food_name'] = trim($_POST['food_name']);
        $data['food_detail'] = trim($_POST['food_detail']);
        $data['food_price'] = trim($_POST['food_price']);
        $data['updateby'] = $user[0][0];

        if($_FILES['food_image']['name'] == ""){
            $data['food_image'] = $_POST['food_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['food_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['food_image']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['food_image']['tmp_name'], $target_file)) {

                $data['food_image'] = $date.'-'.strtolower(basename($_FILES['food_image']['name']));

                $target_file = $target_dir . $_POST['food_image_o'];
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
            $result = $food_model->updateFoodByID($_POST['food_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=food"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $food = $food_model->getFoodBy($_GET['keyword']);
    require_once($path.'view.inc.php');
}
?>