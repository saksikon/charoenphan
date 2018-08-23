<?php

require_once("BaseModel.php");
class EventImageModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getEventImageBy($id){
        $sql = "SELECT * 
        FROM tb_event_image 
        WHERE event_id = '$id' 
        ORDER BY event_image_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getEventImageByID($id){
        $sql = "SELECT * 
        FROM tb_event_image
        WHERE event_image_id = '$id' 
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
    
    function insertEventImage($data=[]){
        $sql = " INSERT INTO tb_event_image(
        event_id,
        event_image_image
        ) VALUES ('".
        $data['event_id']."','".
        $data['event_image_image']."')
        ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteEventImageByID($id){
        $sql = " DELETE FROM tb_event_image WHERE event_image_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>