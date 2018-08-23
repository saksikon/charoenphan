<?
require_once('../../../../models/BakeryTypeModel.php');

$bakery_type_model = new BakeryTypeModel;

$result = $bakery_type_model->setBakeryTypeShow($_POST['bakery_type_id'],$_POST['bakery_type_show']);

echo $result;
?>