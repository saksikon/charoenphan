<?PHP 

date_default_timezone_set("Asia/Bangkok");

// require_once('models/SettingModel.php'); 
// require_once('models/EventModel.php'); 

// $setting_model = new SettingModel;
// $event_model = new EventModel;

// $setting = $setting_model->getSettingByID('1');
// $event = $event_model->getEventMinBy(date("y").'-'.date("m").'-'.date("d"));
?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?PHP echo $page['page_title'];?></title>
        <link rel="icon" href="img_upload/setting/<?PHP echo $setting['setting_icon'];?>"  type="image/png">
        <meta name="Keywords" content="<?PHP echo $setting['setting_tag'];?>,<?PHP echo $page['page_tag'];?>">
        <meta name="Description" content="<?PHP echo $setting['setting_description'];?>">
    
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Main CSS -->
        <link href="template_front/css/front-style.css" rel="stylesheet">
        <link href="template_front/css/style.css" rel="stylesheet">

        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $about['page_title'];?>">
        <meta property="og:description"   content="<?PHP echo $about['page_header_2'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/page/<?PHP if($about['page_header_image'] != ""){ echo $about['page_header_image']; }else{ echo "default.png"; } ?>">
    </head>
    <body>
        <div class="box-wrap">
            <?PHP require_once('view/menu.inc.php'); ?>
            <?PHP require_once('view/footer.inc.php'); ?>
        </div>
    </body>
<html>