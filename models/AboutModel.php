<?php

require_once("BaseModel.php");
class AboutModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getAboutBy(){
        $sql = "SELECT * 
        FROM tb_about ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getAboutByID($id){
        $sql = " SELECT * 
        FROM tb_about
        WHERE about_id = '$id' 
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
    
    function updateAboutByID($id,$data = []){
        $sql = " UPDATE tb_about SET 
        about_header = '".$data['about_header']."',
        about_header_detail = '".$data['about_header_detail']."',
        about_description='".$data['about_description']."',
        about_image='".$data['about_image']."',
        updateby = '".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE about_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertAbout($data=[]){
        $sql = " INSERT INTO tb_about(
        about_header,
        about_header_detail,
        about_description,
        about_image
        ) VALUES ('".
        $data['about_header']."','".
        $data['about_header_detail']."','".
        $data['about_description']."','".
        $data['about_image']."') ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
                return mysqli_insert_id(static::$db);
        }else {
                return 0;
        }
    }

    function deleteAboutByID($id){
        $sql = "DELETE FROM tb_about WHERE about_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>