<?PHP 

date_default_timezone_set("Asia/Bangkok");


require_once('models/SettingModel.php'); 
require_once('models/PageModel.php');

$setting_model = new SettingModel;
$page_model = new PageModel;



$setting = $setting_model->getSettingByID('1');
$page = $page_model->getPageByID('1');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require_once('view/header.inc.php'); ?>

         <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>/about.php">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $page['page_header_1'];?>">
        <meta property="og:description"   content="<?PHP echo $page['page_header_2'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/page/<?PHP if($page['page_header_image'] != ""){ echo $page['page_header_image']; }else{ echo "default.png"; } ?>">


    </head>
    <body>
        <?PHP require_once('view/menu.inc.php'); ?>
        <?PHP require_once('view/head.inc.php'); ?>
        <div class="event-section"> 
            <div class="container ">
                <h1><?PHP echo $page['page_header_1']?></h1>
                <div class="row">
                    <div class="col-lg-12">
                        <?PHP echo $page['page_detail']?>
                    </div>
                </div> 
            </div>
        </div> 

        <?PHP require_once('view/footer.inc.php'); ?>
    </body>
<html>