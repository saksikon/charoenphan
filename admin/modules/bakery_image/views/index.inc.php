<?php
require_once('../models/BakeryImageModel.php');

$path = "modules/bakery_image/views/";

$bakery_image_model = new BakeryImageModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/bakery_image/";

$bakery_id = $_GET['bakery_id'];
$bakery_image_id = $_GET['id'];

if(!isset($_GET['action'])){
    $bakery_image = $bakery_image_model->getBakeryImageBy($bakery_id);
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'delete'){
    $bakery_image = $bakery_image_model->getBakeryImageByID($bakery_image_id);
    $target_file = $target_dir .$bakery_image['bakery_image_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
	$bakery_image = $bakery_image_model->deleteBakeryImageByID($bakery_image_id);
    ?> <script>window.location="index.php?content=bakery_image&bakery_id=<?php echo $bakery_id; ?>"; </script> <?php
}else if ($_GET['action'] == 'add'){
    if($bakery_id > 0){
        $check = true;
        $data = [];
        $data['bakery_id'] = $bakery_id;
        
        if($_FILES['bakery_image_image']['name'] == ""){
            $data['bakery_image_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['bakery_image_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['bakery_image_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['bakery_image_image']["tmp_name"], $target_file)) {
                $data['bakery_image_image'] = $date.'-'.strtolower(basename($_FILES['bakery_image_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.location="index.php?content=bakery_image&bakery_id=<?php echo $bakery_id; ?>"; </script>  <?php
        }else{
            $result = $bakery_image_model->insertBakeryImage($data);
            ?> <script>window.location="index.php?content=bakery_image&bakery_id=<?php echo $bakery_id; ?>"; </script> <?php
        }
    }else{
        ?> <script>window.location="index.php?content=bakery"</script> <?php
    }
}else{
    $bakery_image = $bakery_image_model->getBakeryImageBy($bakery_id);
	require_once($path.'view.inc.php');
}
?>