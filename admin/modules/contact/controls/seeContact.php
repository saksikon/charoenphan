<?
header('Access-Control-Allow-Origin: *');  
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('../../../../models/ContactModel.php');

$contact_model = new ContactModel;

$data = $contact_model->getContactByID($_POST['contact_id']);

$result = $contact_model->setContactSee($_POST['contact_id']);

echo json_encode($data);
?>