<?php

require_once("BaseModel.php");
class SnackImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getSnackImageBy($id){
        $sql = "SELECT * 
        FROM tb_snack_image 
        WHERE snack_id = '$id' 
        ORDER BY snack_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getSnackImageByID($id){
        $sql = "SELECT * 
        FROM tb_snack_image
        WHERE snack_image_id = '$id' 
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
    
    function insertSnackImage($data=[]){
        $sql = " INSERT INTO tb_snack_image(
        snack_id,
        snack_image_image
        ) VALUES ('".
        $data['snack_id']."','".
        $data['snack_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteSnackImageByID($id){
        $sql = " DELETE FROM tb_snack_image WHERE snack_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>