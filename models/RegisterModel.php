<?php

require_once("BaseModel.php");
class RegisterModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getRegisterBy($date_start = '', $date_end = '', $shop_category_id = '', $accept = '', $keyword = ''){

        $str_accept = "";
        $str_date = "";
        $str_category = "";

        if($date_start != "" && $date_end != ""){
            $str_date = "AND STR_TO_DATE(lastupdate,'%Y-%m-%d %H:%i:%s') >= STR_TO_DATE('$date_start','%Y-%m-%d %H:%i:%s') AND STR_TO_DATE(lastupdate,'%Y-%m-%d %H:%i:%s') <= STR_TO_DATE('$date_end','%Y-%m-%d %H:%i:%s') ";
        }else if ($date_start != ""){
            $str_date = "AND STR_TO_DATE(lastupdate,'%Y-%m-%d %H:%i:%s') >= STR_TO_DATE('$date_start','%Y-%m-%d %H:%i:%s') ";    
        }else if ($date_end != ""){
            $str_date = "AND STR_TO_DATE(lastupdate,'%Y-%m-%d %H:%i:%s') <= STR_TO_DATE('$date_end','%Y-%m-%d %H:%i:%s') ";  
        }

        if($shop_category_id != ""){
            $str_category = "AND shop_category_id = '$shop_category_id' ";
        }

        if($accept == "1"){
            $str_accept = "AND shop_id > '0' ";
        }else if($accept == "0"){
            $str_accept = "AND shop_id = '0' ";
        }


        $sql = "SELECT * 
        FROM tb_register 
        WHERE (
            register_name LIKE ('%$keyword%') 
            OR register_email LIKE ('%$keyword%') 
            OR register_phone LIKE ('%$keyword%') 
        ) 
        $str_date 
        $str_category 
        $str_accept 
        ORDER BY register_name ";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getRegisterByID($id){
        $sql = " SELECT * 
        FROM tb_register 
        WHERE register_id = '$id' 
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

    function getRegisterViewByID($id){
        $sql = " SELECT * 
        FROM tb_register 
        LEFT JOIN tb_shop_category ON tb_register.shop_category_id = tb_shop_category.shop_category_id 
        WHERE register_id = '$id' 
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
    
    function updateRegisterByID($id,$data = []){
        $sql = " UPDATE tb_register SET 
        register_name='".$data['register_name']."',
        register_address='".$data['register_address']."',
        register_contact='".$data['register_contact']."',
        register_phone='".$data['register_phone']."',
        register_facebook='".$data['register_facebook']."',
        register_line='".$data['register_line']."',
        register_email='".$data['register_email']."',
        shop_category_id='".$data['shop_category_id']."',
        shop_category_other='".$data['shop_category_other']."',
        register_product_1='".$data['register_product_1']."',
        register_product_2='".$data['register_product_2']."',
        register_product_3='".$data['register_product_3']."',
        register_product_4='".$data['register_product_4']."',
        register_product_5='".$data['register_product_5']."',
        register_image_1='".$data['register_image_1']."',
        register_image_2='".$data['register_image_2']."',
        register_image_3='".$data['register_image_3']."',
        register_image_4='".$data['register_image_4']."',
        register_image_5='".$data['register_image_5']."',
        register_condition='".$data['register_condition']."', 
        updateby='".$data['updateby']."',        
        lastupdate = NOW() 
        WHERE register_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return true;
        }else {
            return false;
        }
    }

    function insertRegister($data=[]){
            $sql = " INSERT INTO tb_register(
            register_name,
            register_address,
            register_contact,
            register_phone,
            register_facebook,
            register_line,
            register_email,
            shop_category_id,
            shop_category_other,
            register_product_1,
            register_product_2,
            register_product_3,
            register_product_4,
            register_product_5,
            register_image_1,
            register_image_2,
            register_image_3,
            register_image_4,
            register_image_5,
            register_condition,
            addby, 
            adddate
        ) VALUES ('".
        $data['register_name']."','".
        $data['register_address']."','".
        $data['register_contact']."','".
        $data['register_phone']."','".
        $data['register_facebook']."','".
        $data['register_line']."','".
        $data['register_email']."','".
        $data['shop_category_id']."','".
        $data['shop_category_other']."','".
        $data['register_product_1']."','".
        $data['register_product_2']."','".
        $data['register_product_3']."','".
        $data['register_product_4']."','".
        $data['register_product_5']."','".
        $data['register_image_1']."','".
        $data['register_image_2']."','".
        $data['register_image_3']."','".
        $data['register_image_4']."','".
        $data['register_image_5']."','".
        $data['register_condition']."','".
        $data['addby']."',
        NOW()) ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
    }else {
            return false;
        }
    }


    function deleteRegisterByID($id){
        $sql = "DELETE FROM tb_register WHERE register_id = '$id' ";
        mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT);
    }




}
?>