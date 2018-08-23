<?
require_once('../../../../models/FoodModel.php');

$food_model = new FoodModel;

$result = $food_model->setFoodSuggest($_POST['food_id'],$_POST['food_suggest']);

echo $result;
?>