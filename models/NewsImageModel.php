<?php

require_once("BaseModel.php");
class NewsImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getNewsImageBy($id){
        $sql = "SELECT * 
        FROM tb_news_image 
        WHERE news_id = '$id' 
        ORDER BY news_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getNewsImageByID($id){
        $sql = "SELECT * 
        FROM tb_news_image
        WHERE news_image_id = '$id' 
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
    
    function insertNewsImage($data=[]){
        $sql = " INSERT INTO tb_news_image(
        news_id,
        news_image_image
        ) VALUES ('".
        $data['news_id']."','".
        $data['news_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteNewsImageByID($id){
        $sql = " DELETE FROM tb_news_image WHERE news_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>