<?php

require_once("BaseModel.php");
class FoodImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getFoodImageBy($id){
        $sql = "SELECT * 
        FROM tb_food_image 
        WHERE food_id = '$id' 
        ORDER BY food_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getFoodImageByID($id){
        $sql = "SELECT * 
        FROM tb_food_image
        WHERE food_image_id = '$id' 
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
    
    function insertFoodImage($data=[]){
        $sql = " INSERT INTO tb_food_image(
        food_id,
        food_image_image
        ) VALUES ('".
        $data['food_id']."','".
        $data['food_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteFoodImageByID($id){
        $sql = " DELETE FROM tb_food_image WHERE food_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>