<?php

require_once("BaseModel.php");
class NewsModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getNewsBy($keyword = ""){
        $sql = "SELECT * ,
        DATE_FORMAT(news_date, '%d-%m-%Y %H:%i') As news_date
        FROM tb_news 
        ORDER BY news_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getNewsMinBy($date_start = ""){
        $sql = "SELECT *
        FROM tb_news 
        WHERE STR_TO_DATE(news_date_begin,'%Y-%m-%d %H:%i:%s') >= STR_TO_DATE('$date_start','%Y-%m-%d %H:%i:%s')
        ORDER BY STR_TO_DATE(news_date_begin,'%Y-%m-%d %H:%i:%s')  ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getNewsByID($id){
        $sql = "SELECT * ,
        DATE_FORMAT(news_date, '%d-%m-%Y %H:%i') As news_date
        FROM tb_news
        WHERE news_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    
    function updateNewsByID($id,$data = []){
        $sql = " UPDATE tb_news SET 
        news_title  = '".$data['news_title']."',
        news_tag = '".$data['news_tag']."',
        news_description = '".$data['news_description']."',
        news_detail = '".$data['news_detail']."',
        news_date = '".$data['news_date']."',
        news_image_1 = '".$data['news_image_1']."',
        news_image_2 = '".$data['news_image_2']."',
        news_image_3 = '".$data['news_image_3']."',
        news_image_4 = '".$data['news_image_4']."',
        updateby = '".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE news_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }

    function insertNews($data=[]){
        $sql = " INSERT INTO tb_news(
        news_title, 
        news_tag,
        news_description, 
        news_detail,
        news_date,
        news_image_1,
        news_image_2,
        news_image_3,
        news_image_4,
        news_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['news_title']."','".
        $data['news_tag']."','".
        $data['news_description']."','".
        $data['news_detail']."','".
        $data['news_date']."','".
        $data['news_image_1']."','".
        $data['news_image_2']."','".
        $data['news_image_3']."','".
        $data['news_image_4']."','".
        "1"."','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteNewsByID($id){
        $sql = " DELETE FROM tb_news WHERE news_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }

    function setNewsShow($id,$val){
        $sql = "UPDATE tb_news SET news_show = '$val' WHERE news_id = '$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>