<?
require_once('../../../../models/FoodTypeModel.php');

$food_type_model = new FoodTypeModel;

$result = $food_type_model->setFoodTypeShow($_POST['food_type_id'],$_POST['food_type_show']);

echo $result;
?>