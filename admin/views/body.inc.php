<?php
if($page=="user"){ 
    require_once("modules/user/views/index.inc.php"); 
}else if($page=="branch"){ 
    require_once("modules/branch/views/index.inc.php"); 
}else if($page=="promotion"){ 
    require_once("modules/promotion/views/index.inc.php"); 
}else if($page=="promotion_image"){ 
    require_once("modules/promotion_image/views/index.inc.php"); 
}else if($page=="event"){ 
    require_once("modules/event/views/index.inc.php"); 
}else if($page=="event_image"){ 
    require_once("modules/event_image/views/index.inc.php"); 
}else if($page=="contact"){ 
    require_once("modules/contact/views/index.inc.php"); 
}else if($page=="news"){ 
    require_once("modules/news/views/index.inc.php"); 
}else if($page=="news_image"){ 
    require_once("modules/news_image/views/index.inc.php"); 
}else if($page=="about"){ 
    require_once("modules/about/views/index.inc.php"); 
}else if($page=="about_slide"){ 
    require_once("modules/about_slide/views/index.inc.php"); 
}else if($page=="setting"){ 
    require_once("modules/setting/views/index.inc.php"); 
}else if($page=="bakery"){ 
    require_once("modules/bakery/views/index.inc.php"); 
}else if($page=="bakery_image"){ 
    require_once("modules/bakery_image/views/index.inc.php"); 
}else if($page=="bakery_type"){ 
    require_once("modules/bakery_type/views/index.inc.php"); 
}else if($page=="snack"){ 
    require_once("modules/snack/views/index.inc.php"); 
}else if($page=="snack_image"){ 
    require_once("modules/snack_image/views/index.inc.php"); 
}else if($page=="snack_type"){ 
    require_once("modules/snack_type/views/index.inc.php"); 
}else if($page=="food"){ 
    require_once("modules/food/views/index.inc.php"); 
}else if($page=="food_image"){ 
    require_once("modules/food_image/views/index.inc.php"); 
}else if($page=="food_type"){ 
    require_once("modules/food_type/views/index.inc.php"); 
}else if($page=="meeting_room"){ 
    require_once("modules/meeting_room/views/index.inc.php"); 
}else { 
    require_once("modules/news/views/index.inc.php"); 
}
?>