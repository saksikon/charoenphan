<?php
require_once("BaseModel.php");
class PromotionModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }
    
    function getPromotionBy(){
        $sql = "SELECT * ,
        DATE_FORMAT(promotion_begin, '%d-%m-%Y') As promotion_begin,
        DATE_FORMAT(promotion_end, '%d-%m-%Y') As promotion_end
        from  tb_promotion 
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

    function getPromotionByID($id){
        $sql = "SELECT * ,
        DATE_FORMAT(promotion_begin, '%d-%m-%Y') As promotion_begin,
        DATE_FORMAT(promotion_end, '%d-%m-%Y') As promotion_end
        from tb_promotion 
        WHERE promotion_id = '$id'";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data= $row;
            }
            $result->close();
            return $data;
        }
    }


    function insertPromotion($data=[]){
        $sql = "INSERT INTO tb_promotion (  
            promotion_name,
            promotion_description,
            promotion_image_1,
            promotion_image_2,
            promotion_image_3,
            promotion_image_4,
            promotion_begin,
            promotion_end,
            promotion_show,
            addby,
            adddate) VALUES ('".
            $data['promotion_name']."','".
            $data['promotion_description']."','".
            $data['promotion_image_1']."','".
            $data['promotion_image_2']."','".
            $data['promotion_image_3']."','".
            $data['promotion_image_4']."','".
            $data['promotion_begin']."','".
            $data['promotion_end']."','".
            $data['promotion_show']."','".
            $data['addby']."',
            NOW()
        )";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $result = mysqli_insert_id(static::$db);
            return $result;
        }else {
            return 0;
        }
    }


    function updatePromotion($promotion_id,$data=[]){
        $sql = "UPDATE tb_promotion SET     
        promotion_name = '".$data['promotion_name']."',
        promotion_image_1 = '".$data['promotion_image_1']."',
        promotion_image_2 = '".$data['promotion_image_2']."',
        promotion_image_3 = '".$data['promotion_image_3']."',
        promotion_image_4 = '".$data['promotion_image_4']."',
        promotion_description = '".$data['promotion_description']."',
        promotion_begin = '".$data['promotion_begin']."',
        promotion_end = '".$data['promotion_end']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW() 
        WHERE promotion_id = '".$promotion_id."'";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function setPromotionShow($id,$val){
        $sql = "UPDATE tb_promotion SET 
        promotion_show = '$val' 
        WHERE promotion_id = '$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function deletePromotionByID($id){
        $sql = " DELETE FROM tb_promotion  WHERE promotion_id ='$id'";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>