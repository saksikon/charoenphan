<?php
require_once('../models/EventImageModel.php');

$path = "modules/event_image/views/";

$event_image_model = new EventImageModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/event_image/";

$event_id = $_GET['event_id'];
$event_image_id = $_GET['id'];

if(!isset($_GET['action'])){
    $event_image = $event_image_model->getEventImageBy($event_id);
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'delete'){
    $event_image = $event_image_model->getEventImageByID($event_image_id);
    $target_file = $target_dir .$event_image['event_image_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
	$event_image = $event_image_model->deleteEventImageByID($event_image_id);
    ?> <script>window.location="index.php?content=event_image&event_id=<?php echo $event_id; ?>"; </script> <?php
}else if ($_GET['action'] == 'add'){
    if($event_id > 0){
        $check = true;
        $data = [];
        $data['event_id'] = $event_id;
        
        if($_FILES['event_image_image']['name'] == ""){
            $data['event_image_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['event_image_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['event_image_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['event_image_image']["tmp_name"], $target_file)) {
                $data['event_image_image'] = $date.'-'.strtolower(basename($_FILES['event_image_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.location="index.php?content=event_image&event_id=<?php echo $event_id; ?>"; </script>  <?php
        }else{
            $result = $event_image_model->insertEventImage($data);
            ?> <script>window.location="index.php?content=event_image&event_id=<?php echo $event_id; ?>"; </script> <?php
        }
    }else{
        ?> <script>window.location="index.php?content=event"</script> <?php
    }
}else{
    $event_image = $event_image_model->getEventImageBy($event_id);
	require_once($path.'view.inc.php');
}
?>