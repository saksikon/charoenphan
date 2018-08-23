<?PHP 

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";


require_once('models/SettingModel.php'); 
require_once('models/ShopCategoryModel.php'); 
require_once('models/PageModel.php');
require_once('models/RegisterModel.php');

$setting_model = new SettingModel;
$category_model = new ShopCategoryModel;
$page_model = new PageModel;
$register_model = new RegisterModel;
$target_dir = "img_upload/register/"


;
if($_GET['action'] == "add"){
    if(isset($_POST['shop_category_id'])){
        $check = true;
        $data = [];
        $data['shop_category_id'] = $_POST['shop_category_id'];
        $data['register_name'] = $_POST['register_name'];
        $data['register_address'] = $_POST['register_address'];
        $data['register_open'] = $_POST['register_open'];
        $data['register_contact'] = $_POST['register_contact'];
        $data['register_phone'] = $_POST['register_phone'];
        $data['register_facebook'] = $_POST['register_facebook'];
        $data['register_line'] = $_POST['register_line'];
        $data['register_email'] = $_POST['register_email'];
        $data['register_product_1'] = $_POST['register_product_1'];
        $data['register_product_2'] = $_POST['register_product_2'];
        $data['register_product_3'] = $_POST['register_product_3'];
        $data['register_product_4'] = $_POST['register_product_4'];
        $data['register_product_5'] = $_POST['register_product_5'];
        $data['register_image_1'] = $_POST['register_image_1'];
        $data['register_image_2'] = $_POST['register_image_2'];
        $data['register_image_3'] = $_POST['register_image_3'];
        $data['register_image_4'] = $_POST['register_image_4'];
        $data['register_image_5'] = $_POST['register_image_5'];
        $data['register_condition'] = $_POST['register_condition'];
        $data['addby'] = $_POST['addby'];

        

        if($_FILES['register_image_1']['name'] == ""){
            $data['register_image_1'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["register_image_1"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["register_image_1"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["register_image_1"]["tmp_name"], $target_file)) {
                $data['register_image_1'] = $date.'-'.strtolower(basename($_FILES["register_image_1"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($_FILES['register_image_2']['name'] == ""){
            $data['register_image_2'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["register_image_2"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["register_image_2"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["register_image_2"]["tmp_name"], $target_file)) {
                $data['register_image_2'] = $date.'-'.strtolower(basename($_FILES["register_image_2"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }


        if($_FILES['register_image_3']['name'] == ""){
            $data['register_image_3'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["register_image_3"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["register_image_3"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["register_image_3"]["tmp_name"], $target_file)) {
                $data['register_image_3'] = $date.'-'.strtolower(basename($_FILES["register_image_3"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }


        if($_FILES['register_image_4']['name'] == ""){
            $data['register_image_4'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["register_image_4"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["register_image_4"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["register_image_4"]["tmp_name"], $target_file)) {
                $data['register_image_4'] = $date.'-'.strtolower(basename($_FILES["register_image_4"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        if($_FILES['register_image_5']['name'] == ""){
            $data['register_image_5'] = "";
        }else {
            $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES["register_image_5"]["name"]));
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES["register_image_5"]["size"] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES["register_image_5"]["tmp_name"], $target_file)) {
                $data['register_image_5'] = $date.'-'.strtolower(basename($_FILES["register_image_5"]["name"]));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }

        
        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $register = $register_model->insertRegister($data);

            if($register){
                ?> <script>
                alert("คุณได้ทำการสมัครเรียบร้อย โปรดรอการติดต่อกลับจากเจ้าหน้าที่");
                window.location="register.php?type=complete"</script> 
                <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }

        
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}

$setting = $setting_model->getSettingByID('1');
$shop_category = $category_model->getShopCategoryBy();
$page = $page_model->getPageByID('5');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require_once('view/header.inc.php'); ?>

        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>register.php">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $page['page_header_1'];?>">
        <meta property="og:description"   content="<?PHP echo $page['page_header_2'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/page/<?PHP if($page['page_header_image'] != ""){ echo $page['page_header_image']; }else{ echo "default.png"; } ?>">


        <link href="template/css/register-style.css" rel="stylesheet">  
    </head>
    <body>
        <?PHP require_once('view/menu.inc.php'); ?>
        <?PHP require_once('view/head.inc.php'); ?>
        <?PHP require_once('view/register/form.inc.php'); ?>

        <?PHP require_once('view/footer.inc.php'); ?>
    </body>
<html>