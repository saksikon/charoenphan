<?php

require_once("BaseModel.php");
class BranchModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        }
    }

    function getBranchBy($keyword = ''){
        $sql = "SELECT * 
        FROM tb_branch
        ORDER BY branch_name";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getBranchByID($id){
        $sql = " SELECT * 
        FROM tb_branch 
        WHERE branch_id = '$id' 
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
    
    function updateBranchByID($id,$data = []){
        $sql = " UPDATE tb_branch SET 
        branch_name = '".$data['branch_name']."',
        branch_detail = '".$data['branch_detail']."',
        branch_phone = '".$data['branch_phone']."',
        branch_email = '".$data['branch_email']."',
        branch_facebook = '".$data['branch_facebook']."',
        branch_line = '".$data['branch_line']."',
        branch_address = '".$data['branch_address']."',
        branch_province = '".$data['branch_province']."',
        branch_amphur = '".$data['branch_amphur']."',
        branch_district = '".$data['branch_district']."',
        branch_zipcode = '".$data['branch_zipcode']."',
        branch_image = '".$data['branch_image']."',
        branch_location_lat = '".$data['branch_location_lat']."',
        branch_location_long = '".$data['branch_location_long']."',
        updateby = '".$data['updateby']."',
        lastupdate = NOW() 
        WHERE branch_id = $id "; 

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertBranch($data=[]){
        $sql = " INSERT INTO tb_branch(
        branch_name, 
        branch_detail, 
        branch_phone, 
        branch_email, 
        branch_facebook, 
        branch_line, 
        branch_address, 
        branch_province, 
        branch_amphur, 
        branch_district, 
        branch_zipcode,
        branch_image,
        branch_location_lat,
        branch_location_long,
        branch_show,
        addby, 
        adddate
        ) VALUES ('".
        $data['branch_name']."','".
        $data['branch_detail']."','".
        $data['branch_phone']."','".
        $data['branch_email']."','".
        $data['branch_facebook']."','".
        $data['branch_line']."','".
        $data['branch_address']."','".
        $data['branch_province']."','".
        $data['branch_amphur']."','".
        $data['branch_district']."','".
        $data['branch_zipcode']."','".
        $data['branch_image']."','".
        $data['branch_location_lat']."','".
        $data['branch_location_long']."','".
        "1','".
        $data['addby']."',
        NOW()) ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteBranchByID($id){
        $sql = "DELETE FROM tb_branch_promotion WHERE branch_id = '$id' ";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $sql = "DELETE FROM tb_branch WHERE branch_id = '$id' ";
            if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
                return 1;
            }else {
                return 0;
            }
        }else {
            return 0;
        }
    }

    function setBranchShow($id,$val){
        $sql = "UPDATE tb_branch SET branch_show = '$val' WHERE branch_id = '$id'";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>