<?php
require_once('../models/MeetingRoomModel.php');

$path = "modules/meeting_room/views/";

$meeting_room_model = new MeetingRoomModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/meeting_room/";

if(!isset($_GET['action'])){
    $meeting_room = $meeting_room_model->getMeetingRoomByID('1');
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['meeting_room_title'])){
        $check = true;
        $data = [];
        $data['meeting_room_title'] = trim($_POST['meeting_room_title']);
        $data['meeting_room_description_1'] = trim($_POST['meeting_room_description_1']);
        $data['meeting_room_description_2'] = trim($_POST['meeting_room_description_2']);
        $data['updateby'] = $user[0][0];

        for ($i = 1; $i <= 4; $i++){
            if($_FILES['meeting_room_image_'.$i]['name'] == ""){
                $data['meeting_room_image_'.$i] = $_POST['meeting_room_image_o_'.$i];
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['meeting_room_image_'.$i]["name"]));
                $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['meeting_room_image_'.$i]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['meeting_room_image_'.$i]["tmp_name"], $target_file)) {

                    $data['meeting_room_image_'.$i] = $date.'-'.strtolower(basename($_FILES['meeting_room_image_'.$i]["name"]));

                    $target_file = $target_dir . $_POST['meeting_room_image_o_'.$i];
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
            $meeting_room = $meeting_room_model->updateMeetingRoomByID('1',$data);

            if($meeting_room){
                ?> <script>window.location="index.php?content=meeting_room"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $meeting_room = $meeting_room_model->getMeetingRoomByID('1');
    require_once($path.'view.inc.php');
}
?>