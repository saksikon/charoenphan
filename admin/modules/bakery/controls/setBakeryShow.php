<?
require_once('../../../../models/BakeryModel.php');

$bakery_model = new BakeryModel;

$result = $bakery_model->setBakeryShow($_POST['bakery_id'],$_POST['bakery_show']);

echo $result;
?>