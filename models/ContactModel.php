<?php

require_once("BaseModel.php");
class ContactModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getContactBy($keyword = ""){
        $sql = "SELECT *
        FROM tb_contact 
        ORDER BY contact_see";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getContactByID($id){
        $sql = " SELECT * 
        FROM tb_contact
        WHERE contact_id = '$id' 
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
    
    function updateContactByID($id,$data = []){
        $sql = " UPDATE tb_contact SET 
        contact_firstname  = '".$data['contact_firstname']."',
        contact_lastname='".$data['contact_lastname']."',
        contact_phone='".$data['contact_phone']."',
        contact_email='".$data['contact_email']."',
        contact_message='".$data['contact_message']."',
        updateby='".$data['updateby']."',
        lastupdate = NOW()
        WHERE contact_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertContact($data=[]){
        $sql = " INSERT INTO tb_contact(
        contact_firstname,
        contact_lastname,
        contact_phone,
        contact_email,
        contact_message,
        addby,
        adddate
    ) VALUES ('".
        $data['contact_firstname']."','".
        $data['contact_lastname']."','".
        $data['contact_phone']."','".
        $data['contact_email']."','".
        $data['contact_message']."','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteContactByID($id){
        $sql = " DELETE FROM tb_contact WHERE contact_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }    
    }

    function setContactSee($id){
        $sql = "UPDATE tb_contact SET contact_see = 1 WHERE contact_id = '$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>