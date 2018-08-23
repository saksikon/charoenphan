<?php

require_once("BaseModel.php");
class SettingModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getSettingBy(){
        $sql = "SELECT * 
        FROM tb_setting ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getSettingByID($id){
        $sql = " SELECT * 
        FROM tb_setting
        WHERE setting_id = '$id' 
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
    
    function updateSettingByID($id,$data = []){
        $sql = " UPDATE tb_setting SET 
        setting_title = '".$data['setting_title']."',
        setting_logo = '".$data['setting_logo']."',
        setting_icon = '".$data['setting_icon']."',
        setting_tag = '".$data['setting_tag']."',
        setting_description = '".$data['setting_description']."',
        setting_phone = '".$data['setting_phone']."',
        setting_email = '".$data['setting_email']."',
        setting_facebook = '".$data['setting_facebook']."',
        setting_line = '".$data['setting_line']."',
        setting_location = '".$data['setting_location']."',
        setting_address = '".$data['setting_address']."'
        WHERE setting_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertSetting($data=[]){
        $sql = " INSERT INTO tb_setting(
        setting_title,
        setting_logo,
        setting_icon,
        setting_tag,
        setting_description,
        setting_phone,
        setting_email,
        setting_facebook,
        setting_line,
        setting_location,
        setting_address
        ) VALUES ('".
        $data['setting_title']."','".
        $data['setting_logo']."','".
        $data['setting_icon']."','".
        $data['setting_tag']."','".
        $data['setting_description']."','".
        $data['setting_phone']."','".
        $data['setting_email']."','".
        $data['setting_facebook']."','".
        $data['setting_line']."','".
        $data['setting_location']."','".
        $data['setting_address']."') ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
    }else {
            return 0;
        }
    }

    function deleteSettingByID($id){
        $sql = "DELETE FROM tb_setting WHERE setting_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>