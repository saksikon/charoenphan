<?php
require_once('../models/ShopCategoryModel.php');

$path = "modules/shop_category/views/";

$model = new ShopCategoryModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/shop_category/";
$shop_category_id = $_GET['id'];

if(!isset($_GET['action'])){
    $shop_categorys =$model->getShopCategoryBy();
    require_once($path.'view.inc.php');

}
else if ($_GET['action'] == "insert"){

    require_once($path.'insert.inc.php');

}
else if ($_GET['action'] == "add"){
    if(isset($_POST['shop_category_name'])){
        $check = true;
        $data = [];
        $data['shop_category_name'] = $_POST['shop_category_name'];
        $data['shop_category_title'] = $_POST['shop_category_title'];
        $data['addby'] = $_POST['addby'];

        if($_FILES['shop_category_image']['name'] == ""){
            $data['shop_category_image'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["shop_category_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["shop_category_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["shop_category_image"]["tmp_name"], $target_file)) {
                $data['shop_category_image'] = $date.'-'.strtolower(basename($_FILES["shop_category_image"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $shop_category_id =$model->insertShopCategory($data);

            if($shop_category_id){
                ?> <script>window.location="index.php?content=shop_category"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}
else if ($_GET['action'] == 'delete'){

    $shop_category = $model->getShopCategoryByID($shop_category_id);
    $target_file = $target_dir .$shop_category['shop_category_image'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    
    $shop_category_id =$model->deleteShopCategoryByID($shop_category_id);

    ?>
    <script>window.location="index.php?content=shop_category"</script>
    <?php

}
else if ($_GET['action'] == 'update'){
    $shop_category =$model->getShopCategoryByID($shop_category_id);
    require_once($path.'update.inc.php');
}
else if ($_GET['action'] == "edit"){
    if(isset($_POST['shop_category_name'])){
        $check = true;
        $data = [];
        $data['shop_category_name'] = $_POST['shop_category_name'];
        $data['shop_category_title'] = $_POST['shop_category_title'];

        if($_FILES['shop_category_image']['name'] == ""){
            $data['shop_category_image'] = $_POST['shop_category_image_o'];
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["shop_category_image"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["shop_category_image"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["shop_category_image"]["tmp_name"], $target_file)) {

                $data['shop_category_image'] = $date.'-'.strtolower(basename($_FILES["shop_category_image"]["name"]));

                $target_file = $target_dir . $_POST['shop_category_image_o'];
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
            $shop_category =$model->updateShopCategoryByID($shop_category_id,$data);

            if($shop){
                ?> <script>window.location="index.php?content=shop"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }

}else if ($_GET['action'] == "see"){
   $shop_category =$model->setShopCategoryView($shop_category_id,$_GET['val']);
   if($shop_category){
    ?>
    <script>window.location="index.php?content=shop_category"</script>
    <?php
}

} 
else{

    $shop_categorys =$model->getShopCategoryBy();
    require_once($path.'view.inc.php');

}
?>