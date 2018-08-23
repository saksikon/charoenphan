<script>
    function check(){
        var user_status_id = document.getElementById("user_status_id").value;
        var user_type_id = document.getElementById("user_type_id").value;
        var user_firstname = document.getElementById("user_firstname").value;
        var user_lastname = document.getElementById("user_lastname").value;
        var user_phone = document.getElementById("user_phone").value;
        var user_image = document.getElementById("user_image").value;
        var user_email = document.getElementById("user_email").value;
        var user_facebook = document.getElementById("user_facebook").value;
        var user_line = document.getElementById("user_line").value;
        var user_username = document.getElementById("user_username").value; 
        var user_password = document.getElementById("user_password").value;
        var user_address = document.getElementById("user_address").value;
        var user_province = document.getElementById("user_province").value;
        var user_amphur = document.getElementById("user_amphur").value;
        var user_district = document.getElementById("user_district").value;
        var user_zipcode = document.getElementById("user_zipcode").value;

        user_status_id = $.trim(user_status_id);
        user_type_id = $.trim(user_type_id);
        user_firstname = $.trim(user_firstname);
        user_lastname = $.trim(user_lastname);
        user_phone = $.trim(user_phone);
        user_image = $.trim(user_image);
        user_email = $.trim(user_email);
        user_facebook = $.trim(user_facebook);
        user_line = $.trim(user_line);
        user_username = $.trim(user_username);
        user_password = $.trim(user_password);
        user_address = $.trim(user_address);
        user_province = $.trim(user_province);
        user_amphur = $.trim(user_amphur);
        user_district = $.trim(user_district);
        user_zipcode = $.trim(user_zipcode);

        if(user_username.length == 0){
            alert("กรุณากรอก username");
            document.getElementById("user_username").focus();
            return false;
        }else if(user_password.length == 0){
            alert("กรุณากรอก password");
            document.getElementById("user_password").focus();
            return false;
        }else if(user_firstname.length == 0){
            alert("กรุณากรอกชื่อ");
            document.getElementById("user_firstname").focus();
            return false;
        }else if(user_lastname.length == 0){
            alert("กรุณากรอกนามสกุล");
            document.getElementById("user_lastname").focus();
            return false;
        }else if(user_address.length == 0){
            alert("กรุณากรอกที่อยู่");
            document.getElementById("user_address").focus();
            return false;
        }else if(user_province.length == 0){
            alert("กรุณากรอกจังหวัด");
            document.getElementById("user_province").focus();
            return false;
        }else if(user_amphur.length == 0){
            alert("กรุณากรอกอำเภอ");
            document.getElementById("user_amphur").focus();
            return false;
        }else if(user_district.length == 0){
            alert("กรุณากรอกตำบล");
            document.getElementById("user_district").focus();
            return false;
        }else if(user_zipcode.length == 0){
            alert("กรุณากรอกหมาเลขไปรษณีย์");
            document.getElementById("user_zipcode").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_user').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_user').attr('src', '../img_upload/user/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>เเก้ไขข้อมูลผู้ดูเเลระบบ</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=user&action=edit" enctype="multipart/form-data">
                    <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user['user_id'] ?>" />
                    <input type="hidden"  id="user_image_o" name="user_image_o" value="<?php echo  $user['user_image'] ?>" />
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>username <font color="#F00"><b>*</b></font></label>
                                        <input id="user_username" name="user_username" class="form-control" value="<?php echo $user['user_username']?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>password <font color="#F00"><b>*</b></font></label>
                                        <input id="user_password" name="user_password" class="form-control" type="password" value="<?php echo $user['user_password']?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>สถาณะ <font color="#F00"><b>*</b></font></label>
                                        <select id="user_status_id" name="user_status_id" class="form-control">
                                            <?php 
                                            for($i =  0 ; $i < count($user_status) ; $i++){
                                            ?>
                                                <option <?php if($user['user_status_id'] == $user_status[$i]['user_status_id'] ){?> selected <?php } ?> value="<?php echo $user_status[$i]['user_status_id'] ?>"><?php echo $user_status[$i]['user_status_name'] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>ประเภทผู้ดูเเล <font color="#F00"><b>*</b></font></label>
                                        <select id="user_type_id" name="user_type_id" class="form-control">
                                            <?php 
                                            for($i =  0 ; $i < count($user_type) ; $i++){
                                            ?>
                                                <option <?php if($user['user_type_id'] == $user_type[$i]['user_type_id'] ){?> selected <?php } ?> value="<?php echo $user_type[$i]['user_type_id'] ?>"><?php echo $user_type[$i]['user_type_name'] ?></option>
                                            <?
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อ <font color="#F00"><b>*</b></font></label>
                                        <input id="user_firstname" name="user_firstname" class="form-control" value="<?php echo $user['user_firstname']?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>นามสกุล <font color="#F00"><b>*</b></font></label>
                                        <input id="user_lastname" name="user_lastname" class="form-control" value="<?php echo $user['user_lastname']?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>เบอร์โทรศัพท์ </label>
                                        <input id="user_phone" name="user_phone" class="form-control" value="<?php echo $user['user_phone']?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ที่อยู่อีเมล </label>
                                        <input id="user_email" name="user_email" class="form-control" value="<?php echo $user['user_email']?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>FACEBOOK URL </label>
                                        <input id="user_facebook" name="user_facebook" class="form-control" value="<?php echo $user['user_facebook']?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>LINE ID </label>
                                        <input id="user_line" name="user_line" class="form-control" value="<?php echo $user['user_line']?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.col-lg-9 (nested) -->

                        <div class="col-lg-3">
                            <div class="form-group" align="center">
                                <img id="img_user" src="../img_upload/user/<?php if($user['user_image'] != "" ){echo $user['user_image'];}else{ echo "default.png"; }?>" class="example-avater"> 
                                <input accept=".jpg , .png" type="file" id="user_image" name="user_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" value="<?php echo $user['user_image']?>">
                            </div>
                        </div>
                        <!-- /.col-lg-3 (nested) -->
                    </div>
                    <!-- /.row (nested) -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ที่อยู่ <font color="#F00"><b>*</b></font> </label>
                                <textarea type="text" id="user_address" name="user_address" class="form-control" ><?php echo $user['user_address']?></textarea>
                                <p class="help-block">Example : 271/55.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>จังหวัด <font color="#F00"><b>*</b></font> </label>
                                <input id="user_province" name="user_province" type="text" class="form-control" value="<?php echo $user['user_province']?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>อำเภอ/เขต <font color="#F00"><b>*</b></font> </label>
                                <input id="user_amphur" name="user_amphur" type="text" class="form-control" value="<?php echo $user['user_amphur']?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>ตำบล/แขวง <font color="#F00"><b>*</b></font> </label>
                                <input id="user_district" name="user_district" type="text" class="form-control" value="<?php echo $user['user_district']?>">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>หมายเลขไปรษณีย์ <font color="#F00"><b>*</b></font> </label>
                                <input id="user_zipcode" name="user_zipcode" type="text" class="form-control" value="<?php echo $user['user_zipcode']?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->

                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="window.location='?content=user';" >ย้อนกลับ</button>
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button name="submit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                    <!-- /.row (nested) -->
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>