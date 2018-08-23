<?php
require_once('../models/PageModel.php');

$path = "modules/home/views/";

$model = new PageModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/home/";

if(!isset($_GET['action'])){
    $page = $model->getPageByID('1');
    require_once($path.'view.inc.php');

} else if ($_GET['action'] == 'edit-page'){

    if(isset($_POST['setting_tag'])){
        $check = true;
        $data = [];
        $data['setting_name'] = $_POST['setting_name'];
        $data['setting_tag'] = $_POST['setting_tag'];
        $data['setting_description'] = $_POST['setting_description'];
        $data['setting_facebook'] = $_POST['setting_facebook'];
        $data['setting_line'] = $_POST['setting_line'];
        $data['setting_ig'] = $_POST['setting_ig'];
        $data['setting_twitter'] = $_POST['setting_twitter'];
        $data['setting_email'] = $_POST['setting_email'];
        $data['setting_phone'] = $_POST['setting_phone'];
        $data['setting_youtube'] = $_POST['setting_youtube'];
        $data['setting_address'] = $_POST['setting_address'];


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
        
    
        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $setting = $model->updateSettingByID($_POST['setting_id'],$data);

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

    $setting_categorys = $category->getSettingCategoryBy();
    $setting = $model->getSettingByID($setting_id);
    require_once($path.'update.inc.php');

}
?>