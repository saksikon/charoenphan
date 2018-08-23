<?
require_once('../../../../models/EventModel.php');

$event_model = new EventModel;

$result = $event_model->setEventShow($_POST['event_id'],$_POST['event_show']);

echo $result;
?>