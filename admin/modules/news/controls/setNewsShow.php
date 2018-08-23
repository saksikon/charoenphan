<?
require_once('../../../../models/NewsModel.php');

$news_model = new NewsModel;

$result = $news_model->setNewsShow($_POST['news_id'],$_POST['news_show']);

echo $result;
?>