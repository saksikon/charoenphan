<?PHP 

date_default_timezone_set("Asia/Bangkok");


require_once('models/SettingModel.php'); 
require_once('models/PageModel.php');
require_once('models/EventModel.php');

$setting_model = new SettingModel;
$page_model = new PageModel;
$event_model = new EventModel;



$setting = $setting_model->getSettingByID('1');
$page = $page_model->getPageByID('3');

if(isset($_GET['event'])){
    $event = $event_model->getEventByID($_GET['event']);

}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require_once('view/header.inc.php'); ?>
        <link href="template/css/event-style.css" rel="stylesheet"> 

        <?PHP
            if(isset($_GET['event']) && count($event)){
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>event.php?event=<?PHP echo $_GET['event']; ?>">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $event['event_name'];?>">
        <meta property="og:description"   content="<?PHP echo $event['event_description'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/event/<?PHP if($event['event_image'] != ""){ echo $event['event_image']; }else{ echo "default.png"; } ?>">

        <?PHP
            }else{
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>event.php">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $about['page_header_1'];?>">
        <meta property="og:description"   content="<?PHP echo $about['page_header_2'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/page/<?PHP if($about['page_header_image'] != ""){ echo $about['page_header_image']; }else{ echo "default.png"; } ?>">

        <?PHP
            }
        ?>
    </head>
    <body>
        <?PHP require_once('view/menu.inc.php'); ?>
        <?PHP require_once('view/head.inc.php'); ?>

        <?PHP
            if(isset($_GET['event']) && count($event)){
                require_once('view/event/detail.inc.php'); 
            }else{
                $event = $event_model->getEventMinBy(date("y").'-'.date("m").'-'.date("d"));
                require_once('view/event/view.inc.php'); 
            } 
            
        ?>

        <?PHP require_once('view/footer.inc.php'); ?>
    </body>
<html>