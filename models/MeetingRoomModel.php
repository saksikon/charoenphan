<?php

require_once("BaseModel.php");
class MeetingRoomModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getMeetingRoomBy(){
        $sql = "SELECT * 
        FROM tb_meeting_room ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getMeetingRoomByID($id){
        $sql = " SELECT * 
        FROM tb_meeting_room
        WHERE meeting_room_id = '$id' 
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
    
    function updateMeetingRoomByID($id,$data = []){
        $sql = " UPDATE tb_meeting_room SET 
        meeting_room_title = '".$data['meeting_room_title']."',
        meeting_room_description_1 = '".$data['meeting_room_description_1']."',
        meeting_room_description_2 = '".$data['meeting_room_description_2']."',
        meeting_room_image_1 = '".$data['meeting_room_image_1']."',
        meeting_room_image_2 = '".$data['meeting_room_image_2']."',
        meeting_room_image_3 = '".$data['meeting_room_image_3']."',
        meeting_room_image_4 = '".$data['meeting_room_image_4']."',
        updateby = '".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE meeting_room_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertMeetingRoom($data=[]){
        $sql = " INSERT INTO tb_meeting_room(
        meeting_room_title,
        meeting_room_description_1,
        meeting_room_description_2,
        meeting_room_image_1,
        meeting_room_image_2,
        meeting_room_image_3,
        meeting_room_image_4,
        addby,
        adddate
        ) VALUES ('".
        $data['meeting_room_title']."','".
        $data['meeting_room_description_1']."','".
        $data['meeting_room_description_2']."','".
        $data['meeting_room_image_1']."','".
        $data['meeting_room_image_2']."','".
        $data['meeting_room_image_3']."','".
        $data['meeting_room_image_4']."','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
                return mysqli_insert_id(static::$db);
        }else {
                return 0;
        }
    }

    function deleteMeetingRoomByID($id){
        $sql = "DELETE FROM tb_meeting_room WHERE meeting_room_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>