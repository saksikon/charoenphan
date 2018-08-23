<?
require_once('../../../../models/SnackModel.php');

$snack_model = new SnackModel;

$result = $snack_model->setSnackSuggest($_POST['snack_id'],$_POST['snack_suggest']);

echo $result;
?>