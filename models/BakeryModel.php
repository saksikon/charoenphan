<?php

require_once("BaseModel.php");
class BakeryModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getBakeryBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_bakery
        ORDER BY bakery_name";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getBakeryByID($id){
        $sql = " SELECT * 
        FROM tb_bakery 
        WHERE bakery_id = '$id' 
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
    
    function updateBakeryByID($id,$data = []){
        $sql = " UPDATE tb_bakery SET 
        bakery_type_id = '".$data['bakery_type_id']."',
        bakery_name = '".$data['bakery_name']."',
        bakery_detail = '".$data['bakery_detail']."',
        bakery_image = '".$data['bakery_image']."',
        bakery_price = '".$data['bakery_price']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW() 
        WHERE bakery_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertBakery($data=[]){
        $sql = " INSERT INTO tb_bakery(
        bakery_type_id,
        bakery_name, 
        bakery_detail, 
        bakery_image, 
        bakery_price,
        bakery_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['bakery_type_id']."','".
        $data['bakery_name']."','".
        $data['bakery_detail']."','".
        $data['bakery_image']."','".
        $data['bakery_price']."','".
        "1','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteBakeryByID($id){
        $sql = "DELETE FROM tb_bakery WHERE bakery_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
    
    function setBakeryShow($id,$val){
        $sql = "UPDATE tb_bakery SET bakery_show = '$val' WHERE bakery_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function setBakerySuggest($id,$val){
        $sql = "UPDATE tb_bakery SET bakery_suggest = '$val' WHERE bakery_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>