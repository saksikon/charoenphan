<?php
require_once('../models/SettingModel.php');

$path = "modules/setting/views/";

$setting_model = new SettingModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/setting/";

if(!isset($_GET['action'])){
    $setting = $setting_model->getSettingByID('1');
    require_once($path.'view.inc.php');
} else if ($_GET['action'] == 'edit'){
    if(isset($_POST['setting_tag'])){
        $check = true;
        $data = [];
        $data['setting_title'] = trim($_POST['setting_title']);
        $data['setting_tag'] = trim($_POST['setting_tag']);
        $data['setting_description'] = trim($_POST['setting_description']);
        $data['setting_phone'] = trim($_POST['setting_phone']);
        $data['setting_email'] = trim($_POST['setting_email']);
        $data['setting_facebook'] = trim($_POST['setting_facebook']);
        $data['setting_line'] = trim($_POST['setting_line']);
        $data['setting_location'] = trim($_POST['setting_location']);
        $data['setting_address'] = trim($_POST['setting_address']);

        if($_FILES['setting_logo']['name'] == ""){
            $data['setting_logo'] = $_POST['setting_logo_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["setting_logo"]["name"]));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["setting_logo"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["setting_logo"]["tmp_name"], $target_file)) {
                $data['setting_logo'] = $date.'-'.strtolower(basename($_FILES["setting_logo"]["name"]));
                $target_file = $target_dir . $_POST['setting_logo_o'];
                if (file_exists($target_file)) {
                    unlink($target_file);
                }
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($_FILES['setting_icon']['name'] == ""){
            $data['setting_icon'] = $_POST['setting_icon_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["setting_icon"]["name"]));
            $iconFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["setting_icon"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($iconFileType != "jpg" && $iconFileType != "png" && $iconFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["setting_icon"]["tmp_name"], $target_file)) {

                $data['setting_icon'] = $date.'-'.strtolower(basename($_FILES["setting_icon"]["name"]));

                $target_file = $target_dir . $_POST['setting_icon_o'];
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
            $setting = $setting_model->updateSettingByID($_POST['setting_id'],$data);

            if($setting){
                ?> <script>window.location="index.php?content=setting"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}else{
    $setting = $setting_model->getSettingByID($setting_id);
    require_once($path.'view.inc.php');
}
?>