<?
require_once('../../../../models/SnackModel.php');

$snack_model = new SnackModel;

$result = $snack_model->setSnackShow($_POST['snack_id'],$_POST['snack_show']);

echo $result;
?>