<?php
require_once('../models/ContactModel.php');

$path = "modules/contact/views/";

$contact_model = new ContactModel;

$contact_id = $_GET['id'];

if(!isset($_GET['action'])){
	$contact = $contact_model->getContactBy();
	require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'delete'){
	$contact = $contact_model->deleteContactByID($contact_id);
	?>
	<script>window.location="index.php?content=contact"</script>
	<?php
}else{
	$contact = $contact_model->getContactBy();
	require_once($path.'view.inc.php');
}
?>