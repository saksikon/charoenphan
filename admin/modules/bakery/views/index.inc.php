<?php
require_once('../models/BakeryModel.php');
require_once('../models/BakeryTypeModel.php');

$path = "modules/bakery/views/";

$bakery_model = new BakeryModel;
$bakery_type_model = new BakeryTypeModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/bakery/";

$bakery_id = $_GET['id'];

if(!isset($_GET['action'])){
    $bakery = $bakery_model->getBakeryBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    $bakery_type = $bakery_type_model->getBakeryTypeBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $bakery_type = $bakery_type_model->getBakeryTypeBy();
    $bakery = $bakery_model->getBakeryByID($bakery_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $bakery = $bakery_model->getBakeryByID($bakery_id);
    for ($i = 1; $i <= 5; $i++){
        $target_file = $target_dir .$bakery['bakery_image'];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }

    $bakery = $bakery_model->deleteBakeryByID($bakery_id);
    ?> <script>window.location="index.php?content=bakery"</script> <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['bakery_name'])){
        $check = true;
        $data = [];
        $data['bakery_type_id'] = trim($_POST['bakery_type_id']);
        $data['bakery_name'] = trim($_POST['bakery_name']);
        $data['bakery_detail'] = trim($_POST['bakery_detail']);
        $data['bakery_price'] = trim($_POST['bakery_price']);
        $data['addby'] = $user[0][0];
        
        if($_FILES['bakery_image']['name'] == ""){
            $data['bakery_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['bakery_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['bakery_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['bakery_image']['tmp_name'], $target_file)) {
                $data['bakery_image'] = $date.'-'.strtolower(basename($_FILES['bakery_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $bakery_model->insertBakery($data);

            if($result){
                ?> <script>window.location="index.php?content=bakery"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['bakery_id'])){
        $check = true;
        $data = [];
        $data['bakery_type_id'] = trim($_POST['bakery_type_id']);
        $data['bakery_name'] = trim($_POST['bakery_name']);
        $data['bakery_detail'] = trim($_POST['bakery_detail']);
        $data['bakery_price'] = trim($_POST['bakery_price']);
        $data['updateby'] = $user[0][0];

        if($_FILES['bakery_image']['name'] == ""){
            $data['bakery_image'] = $_POST['bakery_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['bakery_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['bakery_image']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['bakery_image']['tmp_name'], $target_file)) {

                $data['bakery_image'] = $date.'-'.strtolower(basename($_FILES['bakery_image']['name']));

                $target_file = $target_dir . $_POST['bakery_image_o'];
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
            $result = $bakery_model->updateBakeryByID($_POST['bakery_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=bakery"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $bakery = $bakery_model->getBakeryBy($_GET['keyword']);
    require_once($path.'view.inc.php');
}
?>