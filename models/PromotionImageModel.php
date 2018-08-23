<?php

require_once("BaseModel.php");
class PromotionImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getPromotionImageBy($id){
        $sql = "SELECT * 
        FROM tb_promotion_image 
        WHERE promotion_id = '$id' 
        ORDER BY promotion_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getPromotionImageByID($id){
        $sql = "SELECT * 
        FROM tb_promotion_image
        WHERE promotion_image_id = '$id' 
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
    
    function insertPromotionImage($data=[]){
        $sql = " INSERT INTO tb_promotion_image(
        promotion_id,
        promotion_image_image
        ) VALUES ('".
        $data['promotion_id']."','".
        $data['promotion_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deletePromotionImageByID($id){
        $sql = " DELETE FROM tb_promotion_image WHERE promotion_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>