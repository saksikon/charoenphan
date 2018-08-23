<?php

require_once("BaseModel.php");
class FoodModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getFoodBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_food
        ORDER BY food_name";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getFoodByID($id){
        $sql = " SELECT * 
        FROM tb_food 
        WHERE food_id = '$id' 
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
    
    function updateFoodByID($id,$data = []){
        $sql = " UPDATE tb_food SET 
        food_type_id = '".$data['food_type_id']."',
        food_name = '".$data['food_name']."',
        food_detail = '".$data['food_detail']."',
        food_image = '".$data['food_image']."',
        food_price = '".$data['food_price']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW() 
        WHERE food_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertFood($data=[]){
        $sql = " INSERT INTO tb_food(
        food_type_id,
        food_name, 
        food_detail, 
        food_image, 
        food_price,
        food_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['food_type_id']."','".
        $data['food_name']."','".
        $data['food_detail']."','".
        $data['food_image']."','".
        $data['food_price']."','".
        "1','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteFoodByID($id){
        $sql = "DELETE FROM tb_food WHERE food_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    
    function setFoodShow($id,$val){
        $sql = "UPDATE tb_food SET food_show = '$val' WHERE food_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function setFoodSuggest($id,$val){
        $sql = "UPDATE tb_food SET food_suggest = '$val' WHERE food_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>