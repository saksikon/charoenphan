<?
require_once('../../../../models/SnackTypeModel.php');

$snack_type_model = new SnackTypeModel;

$result = $snack_type_model->setSnackTypeShow($_POST['snack_type_id'],$_POST['snack_type_show']);

echo $result;
?>