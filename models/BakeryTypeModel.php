<?php
require_once("BaseModel.php");
class BakeryTypeModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getBakeryTypeBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_bakery_type 
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

    function getBakeryTypeByID($id){
        $sql = " SELECT * 
        FROM tb_bakery_type
        WHERE bakery_type_id = '$id' 
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

    function updateBakeryTypeByID($id,$data = []){
        $sql = " UPDATE tb_bakery_type  SET 
        bakery_type_name = '".$data['bakery_type_name']."',
        bakery_type_image = '".$data['bakery_type_image']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW()
        WHERE bakery_type_id = '$id'";
        
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return true;

        }else{
            return false;
        }
    }
    function insertBakeryType($data=[]){
        $sql = "INSERT INTO tb_bakery_type (
        bakery_type_name,
        bakery_type_image,
        addby,
        adddate
        ) VALUES ('".
        $data['bakery_type_name']."','".
        $data['bakery_type_image']."','".
        $data['addby']."',".
        "NOW())";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else{
            return 0;
        }
    }

    function deleteBakeryTypeByID($id){
        $sql = " DELETE FROM tb_bakery_type WHERE bakery_type_id = '$id' ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }

    }
    function setBakeryTypeShow($id,$val){
        $sql = "UPDATE tb_bakery_type SET bakery_type_show = '$val' WHERE bakery_type_id = '$id'";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else{
            return 0;
        }
    }
}
?>