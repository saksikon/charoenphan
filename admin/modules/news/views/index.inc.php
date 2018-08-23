<?php
require_once('../models/NewsModel.php');

$path = "modules/news/views/";

$news_model = new NewsModel;

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/news/";

$news_id = $_GET['id'];

if(!isset($_GET['action'])){
    $news = $news_model->getNewsBy();
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'insert'){
	require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update'){
	$news = $news_model->getNewsByID($news_id);
	require_once($path.'update.inc.php');
}else if($_GET['action'] == "show"){
	$result = $news_model->setNewsShow($news_id);
	if($result){
		?> <script>window.location="index.php?content=news"</script> <?php
	}
}else if ($_GET['action'] == 'delete'){
    $news = $news_model->getNewsByID($news_id);
    for ($i = 1; $i <= 5; $i++){
        $target_file = $target_dir .$news['news_image_'.$i];
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }
	$news = $news_model->deleteNewsByID($news_id);
	?><script>window.location="index.php?content=news"</script><?php
}else if ($_GET['action'] == 'edit'){
	if(isset($_POST['news_id'])){
		$check = true;
		$data = [];
		$data['news_title'] = trim($_POST['news_title']);
		$data['news_tag'] = trim($_POST['news_tag']);
		$data['news_description'] = trim($_POST['news_description']);
        $data['news_detail'] = trim($_POST['news_detail']);
        $str = explode(" ",$_POST['news_date']);
        $news_date = explode("-",$str[0]);
        $data['news_date'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $data['updateby'] = $user[0][0];
    
        for ($i = 1; $i <= 4; $i++){
            if($_FILES['news_image_'.$i]['name'] == ""){
                $data['news_image_'.$i] = $_POST['news_image_o_'.$i];
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['news_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['news_image_'.$i]['size'] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['news_image_'.$i]['tmp_name'], $target_file)) {

                    $data['news_image_'.$i] = $date.'-'.strtolower(basename($_FILES['news_image_'.$i]['name']));

                    $target_file = $target_dir . $_POST['news_image_o_'.$i];
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
            $result = $news_model->updateNewsByID($_POST['news_id'],$data);

            if($result){
                ?> <script>window.location="index.php?content=news"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else if ($_GET['action'] == 'add'){
	if(isset($_POST['news_title'])){
		$check = true;
		$data = [];
		$data['news_title'] = trim($_POST['news_title']);
        $data['news_tag'] = trim($_POST['news_tag']);
		$data['news_description'] = trim($_POST['news_description']);
        $data['news_detail'] = trim($_POST['news_detail']);
        $str = explode(" ",$_POST['news_date']);
        $news_date = explode("-",$str[0]);
        $data['news_date'] = $news_date[2].'-'.$news_date[1].'-'.$news_date[0].' '.$str[1]; //set format dd/mm/yy hh/mm/ss
        $data['addby'] = $user[0][0];
        
        for ($i = 1; $i <= 4; $i++){
            if($_FILES['news_image_'.$i]['name'] == ""){
                $data['news_image_'.$i] = "";
            }else {
                $target_file = $target_dir .$date.'-'.strtolower(basename($_FILES['news_image_'.$i]['name']));
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES['news_image_'.$i]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES['news_image_'.$i]["tmp_name"], $target_file)) {
                    $data['news_image_'.$i] = $date.'-'.strtolower(basename($_FILES['news_image_'.$i]['name']));
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
        }

        if($check == false){
            ?>  <script>  alert('<?php echo $error_msg; ?>'); window.history.back(); </script>  <?php
        }else{
            $result = $news_model->insertNews($data);

            if($result){
                ?> <script>window.location="index.php?content=news"</script> <?php
            }else{
                ?>  <script> window.history.back(); </script> <?php
            }
        }
    }else{
        ?> <script> window.history.back(); </script> <?php
    }
}else{
	$news = $news_model->getNewsBy();
	require_once($path.'view.inc.php');
}
?>