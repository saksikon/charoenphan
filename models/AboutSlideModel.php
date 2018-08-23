<?php

require_once("BaseModel.php");
class AboutSlideModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getAboutSlideBy(){
        $sql = "SELECT * 
        FROM tb_about_slide ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getAboutSlideByID($id){
        $sql = " SELECT * 
        FROM tb_about_slide
        WHERE about_slide_id = '$id' 
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
    
    function updateAboutSlideByID($id,$data = []){
        $sql = " UPDATE tb_about_slide SET 
        about_slide_header = '".$data['about_slide_header']."',
        about_slide_header_detail = '".$data['about_slide_header_detail']."',
        about_slide_description='".$data['about_slide_description']."',
        about_slide_image='".$data['about_slide_image']."'
        WHERE about_slide_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertAboutSlide($data=[]){
        $sql = " INSERT INTO tb_about_slide(
        about_slide_header,
        about_slide_header_detail,
        about_slide_description,
        about_slide_show,
        about_slide_image
        ) VALUES ('".
        $data['about_slide_header']."','".
        $data['about_slide_header_detail']."','".
        $data['about_slide_description']."',
        '1','".
        $data['about_slide_image']."') ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
                return mysqli_insert_id(static::$db);
        }else {
                return 0;
        }
    }

    function setAboutSlideShow($id,$val){
        $sql = "UPDATE tb_about_slide SET about_slide_show = $val WHERE about_slide_id = '$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function deleteAboutSlideByID($id){
        $sql = "DELETE FROM tb_about_slide WHERE about_slide_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>