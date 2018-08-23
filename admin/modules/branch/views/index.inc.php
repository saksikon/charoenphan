<?php
require_once('../models/BranchModel.php');

$path = "modules/branch/views/";

$branch_model = new BranchModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/branch/";

$branch_id = $_GET['id'];

if(!isset($_GET['action'])){
    $branch = $branch_model->getBranchBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
    require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
        $branch = $branch_model->getBranchByID($branch_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'delete'){
    $branch = $branch_model->getBranchByID($branch_id);
    $target_file = $target_dir .$branch['branch_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }

    $branch = $branch_model->deleteBranchByID($branch_id);
    ?> <script>window.location="index.php?content=branch"</script> <?php
}else if ($_GET['action'] == 'add'){
    if(isset($_POST['branch_name'])){
        $check = true;
        $data = [];
        $data['branch_name'] = trim($_POST['branch_name']);
        $data['branch_detail'] = trim($_POST['branch_detail']);
        $data['branch_phone'] = trim($_POST['branch_phone']);
        $data['branch_email'] = trim($_POST['branch_email']);
        $data['branch_facebook'] = trim($_POST['branch_facebook']);
        $data['branch_line'] = trim($_POST['branch_line']);
        $data['branch_address'] = trim($_POST['branch_address']);
        $data['branch_province'] = trim($_POST['branch_province']);
        $data['branch_amphur'] = trim($_POST['branch_amphur']);
        $data['branch_district'] = trim($_POST['branch_district']);
        $data['branch_zipcode'] = trim($_POST['branch_zipcode']);
        $data['branch_location_lat'] = trim($_POST['branch_location_lat']);
        $data['branch_location_long'] = trim($_POST['branch_location_long']);
        $data['addby'] = $user[0][0];

        if($_FILES['branch_image']['name'] == ""){
            $data['branch_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["branch_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["branch_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["branch_image"]["tmp_name"], $target_file)) {
                $data['branch_image'] = $date.'-'.strtolower(basename($_FILES["branch_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $branch_model->insertBranch($data);

            if($result){
                ?> <script>window.location="index.php?content=branch"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}else if ($_GET['action'] == 'edit'){

    if(isset($_POST['branch_id'])){
        $check = true;
        $data = [];
        $data['branch_name'] = trim($_POST['branch_name']);
        $data['branch_detail'] = trim($_POST['branch_detail']);
        $data['branch_phone'] = trim($_POST['branch_phone']);
        $data['branch_email'] = trim($_POST['branch_email']);
        $data['branch_facebook'] = trim($_POST['branch_facebook']);
        $data['branch_line'] = trim($_POST['branch_line']);
        $data['branch_address'] = trim($_POST['branch_address']);
        $data['branch_province'] = trim($_POST['branch_province']);
        $data['branch_amphur'] = trim($_POST['branch_amphur']);
        $data['branch_district'] = trim($_POST['branch_district']);
        $data['branch_zipcode'] = trim($_POST['branch_zipcode']);
        $data['branch_location_lat'] = trim($_POST['branch_location_lat']);
        $data['branch_location_long'] = trim($_POST['branch_location_long']);
        $data['updateby'] = $user[0][0];

        if($_FILES['branch_image']['name'] == ""){
            $data['branch_image'] = $_POST['branch_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["branch_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["branch_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["branch_image"]["tmp_name"], $target_file)) {

                $data['branch_image'] = $date.'-'.strtolower(basename($_FILES["branch_image"]["name"]));

                $target_file = $target_dir . $_POST['branch_image_o'];
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
            $result = $branch_model->updateBranchByID($_POST['branch_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=branch"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}else{
    $branch = $branch_model->getBranchBy($_GET['keyword']);
    require_once($path.'view.inc.php');
}
?>