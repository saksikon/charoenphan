<?php

require_once("BaseModel.php");
class EventModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getEventBy($keyword = ""){
        $sql = "SELECT * ,
        DATE_FORMAT(event_date_begin, '%d-%m-%Y %H:%i') As event_date_begin,
        DATE_FORMAT(event_date_end, '%d-%m-%Y %H:%i') As event_date_end
        FROM tb_event 
        ORDER BY event_id";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getEventMinBy($date_start = ""){
        $sql = "SELECT * ,
        DATE_FORMAT(event_date_begin, '%d-%m-%Y %H:%i') As event_date_begin,
        DATE_FORMAT(event_date_end, '%d-%m-%Y %H:%i') As event_date_end
        FROM tb_event 
        WHERE STR_TO_DATE(event_date_begin,'%Y-%m-%d %H:%i:%s') >= STR_TO_DATE('$date_start','%Y-%m-%d %H:%i:%s')
        ORDER BY STR_TO_DATE(event_date_begin,'%Y-%m-%d %H:%i:%s')  ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getEventByID($id){
        $sql = "SELECT * ,
        DATE_FORMAT(event_date_begin, '%d-%m-%Y %H:%i') As event_date_begin,
        DATE_FORMAT(event_date_end, '%d-%m-%Y %H:%i') As event_date_end
        FROM tb_event
        WHERE event_id = '$id' ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }
    
    function updateEventByID($id,$data = []){
        $sql = " UPDATE tb_event SET 
        event_title  = '".$data['event_title']."',
        event_tag = '".$data['event_tag']."',
        event_description = '".$data['event_description']."',
        event_detail = '".$data['event_detail']."',
        event_date_begin = '".$data['event_date_begin']."',
        event_date_end = '".$data['event_date_end']."',
        event_image_1 = '".$data['event_image_1']."',
        event_image_2 = '".$data['event_image_2']."',
        event_image_3 = '".$data['event_image_3']."',
        event_image_4 = '".$data['event_image_4']."',
        updateby = '".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE event_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }

    function insertEvent($data=[]){
        $sql = " INSERT INTO tb_event(
        event_title, 
        event_tag,
        event_description, 
        event_detail,
        event_date_begin,
        event_date_end,
        event_image_1,
        event_image_2,
        event_image_3,
        event_image_4,
        event_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['event_title']."','".
        $data['event_tag']."','".
        $data['event_description']."','".
        $data['event_detail']."','".
        $data['event_date_begin']."','".
        $data['event_date_end']."','".
        $data['event_image_1']."','".
        $data['event_image_2']."','".
        $data['event_image_3']."','".
        $data['event_image_4']."','".
        "1"."','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteEventByID($id){
        $sql = " DELETE FROM tb_event WHERE event_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }

    function setEventShow($id,$val){
        $sql = "UPDATE tb_event SET event_show = '$val' WHERE event_id = '$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>