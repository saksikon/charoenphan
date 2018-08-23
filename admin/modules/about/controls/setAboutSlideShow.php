<?
require_once('../../../../models/AboutSlideModel.php');

$about_slide_model = new AboutSlideModel;

$result = $about_slide_model->setAboutSlideShow($_POST['about_slide_id'],$_POST['about_slide_show']);

echo $result;
?>