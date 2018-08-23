<?php
require_once('../models/PromotionModel.php');

$path = "modules/promotion/views/";

$promotion_model = new PromotionModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/promotion/";

$promotion_id = $_GET['id'];

if(!isset($_GET['action'])){
    $promotion = $promotion_model->getPromotionBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == "insert"){
    require_once($path.'insert.inc.php');
}else if($_GET['action'] == "update"){
    $promotion = $promotion_model->getPromotionByID($promotion_id);
    require_once($path.'update.inc.php');
}else if($_GET['action'] == "delete"){
    $promotion = $promotion_model->getPromotionByID($promotion_id);
    for ($i = 1; $i <= 8; $i++){
        $target_file = $target_dir .$promotion['promotion_image_'.$i];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }
    $promotion = $promotion_model->deletePromotionByID($promotion_id);
    ?><script>window.location="index.php?content=promotion"</script> <?php
}else if($_GET['action'] == "add"){
    if(isset($_POST['promotion_name'])){
        $check = true;
        $data = [];
        $data['promotion_name'] = $_POST['promotion_name'];
        $data['promotion_description'] = $_POST['promotion_description'];
        $news_date = explode("-",$_POST['promotion_begin']);
        $data['promotion_begin'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0]; //set format dd/mm/yy
        $news_date = explode("-",$_POST['promotion_end']);
        $data['promotion_end'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0]; //set format dd/mm/yy
        $data['promotion_show'] = 1;
        $data['addby'] = $user[0][0];

        for ($i = 1; $i <= 4; $i++){
            if($_FILES['promotion_image_'.$i]['name'] == ""){
                $data['promotion_image_'.$i] = "";
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['promotion_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['promotion_image_'.$i]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['promotion_image_'.$i]['tmp_name'], $target_file)) {
                    $data['promotion_image_'.$i] = $date.'-'.strtolower(basename($_FILES['promotion_image_'.$i]['name']));
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $promotion_model->insertPromotion($data);

            if($result){
                ?> <script>window.location="index.php?content=promotion"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if($_GET['action'] == "edit"){
    if(isset($_POST['promotion_name'])){
        $check = true;
        $data=[];        
        $data['promotion_name'] = $_POST['promotion_name'];
        $data['promotion_description'] = $_POST['promotion_description'];
        $news_date = explode("-",$_POST['promotion_begin']);
        $data['promotion_begin'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0]; //set format dd/mm/yy
        $news_date = explode("-",$_POST['promotion_end']);
        $data['promotion_end'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0]; //set format dd/mm/yy
        $data['updateby'] = $user[0][0];

        for ($i = 1; $i <= 4; $i++){
            if($_FILES['promotion_image_'.$i]['name'] == ""){
                $data['promotion_image_'.$i] = $_POST['promotion_image_o_'.$i];
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['promotion_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['promotion_image_'.$i]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['promotion_image_'.$i]['tmp_name'], $target_file)) {

                    $data['promotion_image_'.$i] = $date.'-'.strtolower(basename($_FILES['promotion_image_'.$i]['name']));

                    $target_file = $target_dir . $_POST['promotion_image_o_'.$i];
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
            $result = $promotion_model->updatePromotion($promotion_id,$data);

            if($result){
                ?> <script>window.location="index.php?content=promotion"</script> <?php
            }else{
                ?>  <script>window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
    $promotion = $promotion_model->getPromotionBy($shop_id);
    require_once($path.'view.inc.php');
}
?>