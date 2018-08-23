<?php

require_once("BaseModel.php");
class BakeryImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getBakeryImageBy($id){
        $sql = "SELECT * 
        FROM tb_bakery_image 
        WHERE bakery_id = '$id' 
        ORDER BY bakery_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getBakeryImageByID($id){
        $sql = "SELECT * 
        FROM tb_bakery_image
        WHERE bakery_image_id = '$id' 
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
    
    function insertBakeryImage($data=[]){
        $sql = " INSERT INTO tb_bakery_image(
        bakery_id,
        bakery_image_image
        ) VALUES ('".
        $data['bakery_id']."','".
        $data['bakery_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteBakeryImageByID($id){
        $sql = " DELETE FROM tb_bakery_image WHERE bakery_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>