<?
require_once('../../../../models/BranchModel.php');

$branch_model = new BranchModel;

$result = $branch_model->setBranchShow($_POST['branch_id'],$_POST['branch_show']);

echo $result;
?>