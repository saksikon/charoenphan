<?PHP 

date_default_timezone_set("Asia/Bangkok");


require_once('models/SettingModel.php'); 
require_once('models/PageModel.php');
require_once('models/TourModel.php'); 

$setting_model = new SettingModel;
$page_model = new PageModel;
$tour_model = new TourModel;



$setting = $setting_model->getSettingByID('1');
$page = $page_model->getPageByID('4');

if(isset($_GET['tour'])){
    $tour = $tour_model->getTourByID($_GET['tour']);

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require_once('view/header.inc.php'); ?>
        <?PHP
            if(isset($_GET['tour']) && count($tour)){
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>tour.php?tour=<?PHP echo $_GET['tour']; ?>">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $tour['tour_name'];?>">
        <meta property="og:description"   content="<?PHP echo $tour['tour_description'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/tour/<?PHP if($tour['tour_image'] != ""){ echo $tour['tour_image']; }else{ echo "default.png"; } ?>">

        <?PHP
            }else{
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>tour.php">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $about['page_header_1'];?>">
        <meta property="og:description"   content="<?PHP echo $about['page_header_2'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/page/<?PHP if($about['page_header_image'] != ""){ echo $about['page_header_image']; }else{ echo "default.png"; } ?>">

        <?PHP
            }
        ?>
        <link href="template/css/tour-style.css" rel="stylesheet"> 
    </head>
    <body>
        <?PHP require_once('view/menu.inc.php'); ?>
        <?PHP require_once('view/head.inc.php'); ?>
        <?PHP
            if(isset($_GET['tour']) && count($tour)){
                require_once('view/tour/detail.inc.php'); 
            }else{
                $tour = $tour_model->getTourBy('1');
                require_once('view/tour/view.inc.php'); 
            } 
            
        ?>
        <?PHP require_once('view/footer.inc.php'); ?>
    </body>
<html>