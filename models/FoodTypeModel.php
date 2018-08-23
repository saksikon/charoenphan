<?php
require_once("BaseModel.php");
class FoodTypeModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getFoodTypeBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_food_type 
        ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getFoodTypeByID($id){
        $sql = " SELECT * 
        FROM tb_food_type
        WHERE food_type_id = '$id' 
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

    function updateFoodTypeByID($id,$data = []){
        $sql = " UPDATE tb_food_type  SET 
        food_type_name = '".$data['food_type_name']."',
        food_type_image = '".$data['food_type_image']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW()
        WHERE food_type_id = '$id'";
        
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return true;

        }else{
            return false;
        }
    }

    function insertFoodType($data=[]){
        $sql = "INSERT INTO tb_food_type (
        food_type_name,
        food_type_image,
        food_type_show,
        addby,
        adddate
        ) VALUES ('".
        $data['food_type_name']."','".
        $data['food_type_image']."','".
        "1','".
        $data['addby']."',".
        "NOW())";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else{
            return 0;
        }
    }

    function deleteFoodTypeByID($id){
        $sql = " DELETE FROM tb_food_type WHERE food_type_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }

    }
    function setFoodTypeShow($id,$val){
        $sql = "UPDATE tb_food_type SET food_type_show = '$val' WHERE food_type_id = '$id'";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>