<?php
require_once("BaseModel.php");
class UserStatusModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getUserStatusBy($name = ''){
        $sql = "SELECT * FROM tb_user_status WHERE user_status_name LIKE ('%$name%') 
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

    function getUserStatusByID($id){
        $sql = " SELECT * 
        FROM tb_user_status 
        WHERE user_status_id = '$id' 
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

    function updateUserStatusByID($id,$data = []){
        $sql = " UPDATE tb_user_status SET 
        user_status_name = '".$data['user_status_name']."'
        WHERE user_status_id = '$id' 
        ";
         if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }


    function deleteUserStatusByID($id){
        $sql = " DELETE FROM tb_user_status WHERE user_status_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>