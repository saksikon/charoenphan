<?
require_once('../../../../models/PromotionModel.php');

$promotion_model = new PromotionModel;

$result = $promotion_model->setPromotionShow($_POST['promotion_id'],$_POST['promotion_show']);

echo $result;
?>