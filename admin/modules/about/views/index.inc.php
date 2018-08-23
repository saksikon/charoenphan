<?php
require_once('../models/AboutModel.php');
require_once('../models/AboutSlideModel.php');

$path = "modules/about/views/";

$about_model = new AboutModel;
$about_slide_model = new AboutSlideModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/about/";

if(!isset($_GET['action'])){
    $about = $about_model->getAboutByID('1');
    $about_slide = $about_slide_model->getAboutSlideBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['about_header'])){
        $check = true;
        $data = [];
        $data['about_header'] = trim($_POST['about_header']);
        $data['about_header_detail'] = trim($_POST['about_header_detail']);
        $data['about_description'] = trim($_POST['about_description']);
        $data['updateby'] = $user[0][0];

        if($_FILES['about_image']['name'] == ""){
            $data['about_image'] = $_POST['about_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["about_image"]["name"]));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["about_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["about_image"]["tmp_name"], $target_file)) {

                $data['about_image'] = $date.'-'.strtolower(basename($_FILES["about_image"]["name"]));

                $target_file = $target_dir . $_POST['about_image_o'];
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
            $about = $about_model->updateAboutByID('1',$data);

            if($about){
                ?> <script>window.location="index.php?content=about"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $about = $about_model->getAboutByID('1');
    require_once($path.'view.inc.php');
}
?>