<?php
require_once('../models/EventModel.php');

$path = "modules/Event/views/";

$event_model = new EventModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/event/";

$event_id = $_GET['id'];

if(!isset($_GET['action'])){
    $event = $event_model->getEventBy();
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
	require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
	$event = $event_model->getEventByID($event_id);
	require_once($path.'update.inc.php');
}else if($_GET['action'] == "show"){
	$result = $event_model->setEventShow($event_id);
	if($result){
		?> <script>window.location="index.php?content=event"</script> <?php
	}
}else if ($_GET['action'] == 'delete'){
    $event = $event_model->getEventByID($event_id);
    for ($i = 1; $i <= 5; $i++){
        $target_file = $target_dir .$event['event_image_'.$i];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }
	$event = $event_model->deleteEventByID($event_id);
	?><script>window.location="index.php?content=event"</script><?php
}else if ($_GET['action'] == 'edit'){
	if(isset($_POST['event_id'])){
		$check = true;
		$data = [];
		$data['event_title'] = trim($_POST['event_title']);
		$data['event_tag'] = trim($_POST['event_tag']);
		$data['event_description'] = trim($_POST['event_description']);
        $data['event_detail'] = trim($_POST['event_detail']);
        $str = explode(" ",$_POST['event_date_begin']);
        $event_date = explode("-",$str[0]);
        $data['event_date_begin'] = $event_date[2].'-'.$event_date[1].'-'.$event_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $str = explode(" ",$_POST['event_date_end']);
        $event_date = explode("-",$str[0]);
        $data['event_date_end'] = $event_date[2].'-'.$event_date[1].'-'.$event_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $data['updateby'] = $user[0][0];
        
        for ($i = 1; $i <= 4; $i++){
            if($_FILES['event_image_'.$i]['name'] == ""){
                $data['event_image_'.$i] = $_POST['event_image_o_'.$i];
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['event_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['event_image_'.$i]['size'] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['event_image_'.$i]['tmp_name'], $target_file)) {

                    $data['event_image_'.$i] = $date.'-'.strtolower(basename($_FILES['event_image_'.$i]['name']));

                    $target_file = $target_dir . $_POST['event_image_o_'.$i];
                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $event_model->updateEventByID($_POST['event_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=event"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'add'){
	if(isset($_POST['event_title'])){
		$check = true;
		$data = [];
		$data['event_title'] = trim($_POST['event_title']);
        $data['event_tag'] = trim($_POST['event_tag']);
		$data['event_description'] = trim($_POST['event_description']);
        $data['event_detail'] = trim($_POST['event_detail']);
        $str = explode(" ",$_POST['event_date_begin']);
        $event_date = explode("-",$str[0]);
        $data['event_date_begin'] = $event_date[2].'-'.$event_date[1].'-'.$event_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $str = explode(" ",$_POST['event_date_end']);
        $event_date = explode("-",$str[0]);
        $data['event_date_end'] = $event_date[2].'-'.$event_date[1].'-'.$event_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $data['addby'] = $user[0][0];
        
        for ($i = 1; $i <= 4; $i++){
            if($_FILES['event_image_'.$i]['name'] == ""){
                $data['event_image_'.$i] = "";
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['event_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['event_image_'.$i]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['event_image_'.$i]["tmp_name"], $target_file)) {
                    $data['event_image_'.$i] = $date.'-'.strtolower(basename($_FILES['event_image_'.$i]['name']));
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $event_model->insertEvent($data);

            if($result){
                ?> <script>window.location="index.php?content=event"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
	$event = $event_model->getEventBy();
	require_once($path.'view.inc.php');
}
?>