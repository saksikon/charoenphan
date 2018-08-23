<?php
require_once('../models/SnackModel.php');
require_once('../models/SnackTypeModel.php');

$path = "modules/snack/views/";

$snack_model = new SnackModel;
$snack_type_model = new SnackTypeModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/snack/";

$snack_id = $_GET['id'];

if(!isset($_GET['action'])){
    $snack = $snack_model->getSnackBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    $snack_type = $snack_type_model->getSnackTypeBy();
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
    $snack_type = $snack_type_model->getSnackTypeBy();
    $snack = $snack_model->getSnackByID($snack_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $snack = $snack_model->getSnackByID($snack_id);
    for ($i = 1; $i <= 5; $i++){
        $target_file = $target_dir .$snack['snack_image'];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }

    $snack = $snack_model->deleteSnackByID($snack_id);
    ?> <script>window.location="index.php?content=snack"</script> <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['snack_name'])){
        $check = true;
        $data = [];
        $data['snack_type_id'] = trim($_POST['snack_type_id']);
        $data['snack_name'] = trim($_POST['snack_name']);
        $data['snack_detail'] = trim($_POST['snack_detail']);
        $data['snack_price'] = trim($_POST['snack_price']);
        $data['addby'] = $user[0][0];
        
        if($_FILES['snack_image']['name'] == ""){
            $data['snack_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['snack_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['snack_image']["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['snack_image']['tmp_name'], $target_file)) {
                $data['snack_image'] = $date.'-'.strtolower(basename($_FILES['snack_image']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $snack_model->insertSnack($data);

            if($result){
                ?> <script>window.location="index.php?content=snack"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'edit'){
    if(isset($_POST['snack_id'])){
        $check = true;
        $data = [];
        $data['snack_type_id'] = trim($_POST['snack_type_id']);
        $data['snack_name'] = trim($_POST['snack_name']);
        $data['snack_detail'] = trim($_POST['snack_detail']);
        $data['snack_price'] = trim($_POST['snack_price']);
        $data['updateby'] = $user[0][0];

        if($_FILES['snack_image']['name'] == ""){
            $data['snack_image'] = $_POST['snack_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['snack_image']['name']));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['snack_image']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['snack_image']['tmp_name'], $target_file)) {

                $data['snack_image'] = $date.'-'.strtolower(basename($_FILES['snack_image']['name']));

                $target_file = $target_dir . $_POST['snack_image_o'];
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
            $result = $snack_model->updateSnackByID($_POST['snack_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=snack"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $snack = $snack_model->getSnackBy($_GET['keyword']);
    require_once($path.'view.inc.php');
}
?>