<?php

require_once("BaseModel.php");
class SnackModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getSnackBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_snack
        ORDER BY snack_name";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getSnackByID($id){
        $sql = " SELECT * 
        FROM tb_snack 
        WHERE snack_id = '$id' 
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
    
    function updateSnackByID($id,$data = []){
        $sql = " UPDATE tb_snack SET 
        snack_type_id = '".$data['snack_type_id']."',
        snack_name = '".$data['snack_name']."',
        snack_detail = '".$data['snack_detail']."',
        snack_image = '".$data['snack_image']."',
        snack_price = '".$data['snack_price']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW() 
        WHERE snack_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertSnack($data=[]){
        $sql = " INSERT INTO tb_snack(
        snack_type_id,
        snack_name, 
        snack_detail, 
        snack_image, 
        snack_price,
        snack_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['snack_type_id']."','".
        $data['snack_name']."','".
        $data['snack_detail']."','".
        $data['snack_image']."','".
        $data['snack_price']."','".
        "1','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteSnackByID($id){
        $sql = "DELETE FROM tb_snack WHERE snack_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    
    function setSnackShow($id,$val){
        $sql = "UPDATE tb_snack SET snack_show = '$val' WHERE snack_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function setSnackSuggest($id,$val){
        $sql = "UPDATE tb_snack SET snack_suggest = '$val' WHERE snack_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>