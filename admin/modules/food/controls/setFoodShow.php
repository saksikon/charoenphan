<?
require_once('../../../../models/FoodModel.php');

$food_model = new FoodModel;

$result = $food_model->setFoodShow($_POST['food_id'],$_POST['food_show']);

echo $result;
?>