<?
require_once('../../../../models/BakeryModel.php');

$bakery_model = new BakeryModel;

$result = $bakery_model->setBakerySuggest($_POST['bakery_id'],$_POST['bakery_suggest']);

echo $result;
?>