<?php

require_once("BaseModel.php");
class UserModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getLogin($username, $password){

        $username = static::$db->real_escape_string($username);
        $password = static::$db->real_escape_string($password);

        if ($result = mysqli_query(static::$db,"SELECT user_id, user_status_id, tb_user.user_type_id, user_firstname, user_image
            FROM tb_user LEFT JOIN tb_user_type ON tb_user.user_type_id = tb_user_type.user_type_id
            WHERE user_username = '$username' 
            AND user_password = '$password'", MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getUserBy($keyword){
        $sql = "SELECT * 
        FROM tb_user 
        LEFT JOIN tb_user_type ON tb_user.user_type_id = tb_user_type.user_type_id
        LEFT JOIN tb_user_status ON tb_user.user_status_id = tb_user_status.user_status_id
        ORDER BY CONCAT(tb_user.user_firstname,' ',tb_user.user_lastname) 
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

    function getUserByID($id){
        $sql = " SELECT * 
        FROM tb_user 
        WHERE user_id = '$id' 
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

    function updateUserByID($id,$data = []){
        $sql = "UPDATE tb_user SET 
        user_status_id = '".$data['user_status_id']."', 
        user_type_id = '".$data['user_type_id']."', 
        user_firstname = '".$data['user_firstname']."', 
        user_lastname = '".$data['user_lastname']."', 
        user_image = '".$data['user_image']."', 
        user_phone = '".$data['user_phone']."', 
        user_email = '".$data['user_email']."', 
        user_facebook = '".$data['user_facebook']."',
        user_line = '".$data['user_line']."',
        user_address = '".$data['user_address']."',
        user_province = '".$data['user_province']."',
        user_amphur = '".$data['user_amphur']."',
        user_district = '".$data['user_district']."',
        user_zipcode = '".$data['user_zipcode']."', 
        user_username = '".$data['user_username']."', 
        user_password = '".$data['user_password']."', 
        updateby = '".$data['updateby']."', 
        lastupdate = NOW() 
        WHERE user_id = $id ";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertUser($data=[]){
        $sql = " INSERT INTO tb_user(
            user_type_id,
            user_status_id,
            user_firstname,
            user_lastname,
            user_image,
            user_phone,
            user_email,
            user_facebook,
            user_line,
            user_address,
            user_province,
            user_amphur,
            user_district,
            user_zipcode,
            user_username,
            user_password,
            addby,
            adddate
        ) VALUES ('".
        $data['user_type_id']."','".
        $data['user_status_id']."','".
        $data['user_firstname']."','".
        $data['user_lastname']."','".
        $data['user_image']."','".
        $data['user_phone']."','".
        $data['user_email']."','".
        $data['user_facebook']."','".
        $data['user_line']."','".
        $data['user_address']."','".
        $data['user_province']."','".
        $data['user_amphur']."','".
        $data['user_district']."','".
        $data['user_zipcode']."','".
        $data['user_username']."','".
        $data['user_password']."','".
        $data['addby'].
        "',NOW())";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteUserByID($id){
        $sql = " DELETE FROM tb_user WHERE user_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>