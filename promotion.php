<?PHP 

date_default_timezone_set("Asia/Bangkok");


require_once('models/SettingModel.php'); 
require_once('models/PageModel.php');
require_once('models/ShopCategoryModel.php'); 
require_once('models/ShopPromotionModel.php');
require_once('models/ShopModel.php');

$setting_model = new SettingModel;
$page_model = new PageModel;
$promotion_model = new ShopPromotionModel;
$category_model = new ShopCategoryModel;
$shop_model = new ShopModel;

$setting = $setting_model->getSettingByID('1');
$page = $page_model->getPageByID('2');

if(isset($_GET['promotion'])){
    $shop_promotion = $promotion_model->getShopPromotionByID($_GET['promotion']);

}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?PHP require_once('view/header.inc.php'); ?>
        <link href="template/css/promotion-style.css" rel="stylesheet">  
        <?PHP
            if(isset($_GET['promotion']) && count($shop_promotion)){
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>promotion.php?promotion=<?PHP echo $_GET['promotion']; ?>">
        <meta property="og:type"          content="website">
        <meta property="og:title"         content="<?PHP echo $shop_promotion['shop_promotion_name'];?>">
        <meta property="og:description"   content="<?PHP echo $shop_promotion['shop_promotion_title'];?>">
        <meta property="og:image"         content="<?PHP echo $setting['setting_url']; ?>img_upload/shop_promotion/<?PHP if($shop_promotion['shop_promotion_image'] != ""){ echo $shop_promotion['shop_promotion_image']; }else{ echo "default.png"; } ?>">

        <?PHP
            }else{
        ?>
        <meta property="og:url"           content="<?PHP echo $setting['setting_url']; ?>promotion.php">
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
            if(isset($_GET['promotion']) && count($shop_promotion)){
                $shop = $shop_model->getShopByID($shop_promotion['shop_id']);
                
                $shop_promotions = $promotion_model->getShopPromotionViewByShopID($shop_promotion['shop_id'],$_GET['promotion']);
                require_once('view/promotion/detail.inc.php'); 
            }else{
                $shop_category = $category_model->getShopCategoryBy();

                $shop_promotions = $promotion_model->getShopPromotionViewBy($_GET['category']);
                require_once('view/promotion/view.inc.php'); 
            } 
            
        ?>

        <?PHP require_once('view/footer.inc.php'); ?>
    </body>
<html>