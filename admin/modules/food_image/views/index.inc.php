<?php
require_once('../models/FoodImageModel.php');

$path = "modules/food_image/views/";

$food_image_model = new FoodImageModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/food_image/";

$food_id = $_GET['food_id'];
$food_image_id = $_GET['id'];

if(!isset($_GET['action'])){
    $food_image = $food_image_model->getFoodImageBy($food_id);
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'delete'){
    $food_image = $food_image_model->getFoodImageByID($food_image_id);
    $target_file = $target_dir .$food_image['food_image_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
	$food_image = $food_image_model->deleteFoodImageByID($food_image_id);
    ?> <script>window.location="index.php?content=food_image&food_id=<?php echo $food_id; ?>"; </script> <?php
}else if ($_GET['action'] == 'add'){
    if($food_id > 0){
        $check = true;
        $data = [];
        $data['food_id'] = $food_id;
        
        if($_FILES['food_image_image']['name'] == ""){
            $data['food_image_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['food_image_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['food_image_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['food_image_image']["tmp_name"], $target_file)) {
                $data['food_image_image'] = $date.'-'.strtolower(basename($_FILES['food_image_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.location="index.php?content=food_image&food_id=<?php echo $food_id; ?>"; </script>  <?php
        }else{
            $result = $food_image_model->insertFoodImage($data);
            ?> <script>window.location="index.php?content=food_image&food_id=<?php echo $food_id; ?>"; </script> <?php
        }
    }else{
        ?> <script>window.location="index.php?content=food"</script> <?php
    }
}else{
    $food_image = $food_image_model->getFoodImageBy($food_id);
	require_once($path.'view.inc.php');
}
?>