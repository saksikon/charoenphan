<?php
require_once("BaseModel.php");
class SnackTypeModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getSnackTypeBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_snack_type 
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

    function getSnackTypeByID($id){
        $sql = " SELECT * 
        FROM tb_snack_type
        WHERE snack_type_id = '$id' 
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

    function updateSnackTypeByID($id,$data = []){
        $sql = " UPDATE tb_snack_type  SET 
        snack_type_name = '".$data['snack_type_name']."',
        snack_type_image = '".$data['snack_type_image']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW()
        WHERE snack_type_id = '$id'";
        
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return true;

        }else{
            return false;
        }
    }
    function insertSnackType($data=[]){
        $sql = "INSERT INTO tb_snack_type (
        snack_type_name,
        snack_type_image,
        snack_type_show,
        addby,
        adddate
        ) VALUES ('".
        $data['snack_type_name']."','".
        $data['snack_type_image']."','".
        "1','".
        $data['addby']."',".
        "NOW())";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else{
            return 0;
        }
    }

    function deleteSnackTypeByID($id){
        $sql = " DELETE FROM tb_snack_type WHERE snack_type_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }

    }
    function setSnackTypeShow($id,$val){
        $sql = "UPDATE tb_snack_type SET snack_type_show = '$val' WHERE snack_type_id = '$id'";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>