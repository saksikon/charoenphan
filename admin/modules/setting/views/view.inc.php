<script>
    function check(){
        var setting_title = document.getElementById("setting_title").value;
        var setting_location = document.getElementById("setting_location").value;

        setting_title = $.trim(setting_title);
        setting_location = $.trim(setting_location);

        if(setting_title.length == 0){
            alert("กรุณาระบุชื่อเว็ปไซต์");
            document.getElementById("setting_title").focus();
            return false;
        }else if(setting_location.length == 0){
            alert("กรุณาระบุตำเเหน่งที่ตั้ง");
            document.getElementById("setting_location").focus();
            return false;
        }else{
            return true;
        }
    }

	function readURLLogo(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_logo').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_logo').attr('src', '../img_upload/setting/default.png');
		}
	}

    function readURLIcon(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('img_icon').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_icon').attr('src', '../img_upload/setting/default.png');
		}
	}
</script>

<div class="row">
    <div class="col-lg-6">
        <h1>ตั้งค่าเว็ปไซต์</h1>
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
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=setting&action=edit&id=<?PHP echo $setting['setting_id']; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อเว็ปไซต์ <font color="#F00"><b>*</b></font></label>
                                        <input id="setting_title" name="setting_title" class="form-control" value="<?php echo $setting['setting_title']?>">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>ป้ายกำกับ </label>
                                        <input id="setting_tag" name="setting_tag" class="form-control" value="<?php echo $setting['setting_tag']?>">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>รายละเอียดเพิ่มเติม </label>
                                        <input id="setting_description" name="setting_description" class="form-control" value="<?php echo $setting['setting_description']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>EMAIL </label>
                                        <input id="setting_email" name="setting_email" class="form-control"  value="<?php echo $setting['setting_email']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>FACEBOOK URL </label>
                                        <input id="setting_facebook" name="setting_facebook" class="form-control" value="<?php echo $setting['setting_facebook']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>LINE ID </label>
                                        <input id="setting_line" name="setting_line" class="form-control" value="<?php echo $setting['setting_line']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>PHONE </label>
                                        <input id="setting_phone" name="setting_phone" class="form-control"  value="<?php echo $setting['setting_phone']?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ที่อยู่ </label>
                                        <input id="setting_address" name="setting_address" class="form-control"  value="<?php echo $setting['setting_address']?>">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ตำเเหน่งที่ตั้ง <font color="#F00"><b>*</b></font></label>
                                        <input id="setting_location" name="setting_location" class="form-control"  value="<?php echo $setting['setting_location']?>">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.col-lg-9 (nested) -->

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <img id="img_logo" src="../img_upload/setting/<?php if($setting['setting_logo'] != "") echo $setting['setting_logo']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                        <input accept=".jpg , .png" type="file" id="setting_logo" name="setting_logo" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURLLogo(this);">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <img id="img_icon" src="../img_upload/setting/<?php if($setting['setting_icon'] != "") echo $setting['setting_icon']; else echo "default.png"; ?>" class="img-responsive " width="48" height="48"> 
                                        <input accept=".jpg , .png" type="file" id="setting_icon" name="setting_icon" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURLIcon(this);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-3 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                   <div align="right">
                    <input type="hidden" id="updateby" name="updateby" class="form-control" value="<?=$_SESSION['jrp_user'][0][0]?>">
                    <input type="hidden" id="setting_id" name="setting_id" class="form-control" value="<?php echo $setting['setting_id']?>">
                    <input type="hidden" id="setting_logo_o" name="setting_logo_o" class="form-control" value="<?php echo $setting['setting_logo']?>">
                    <input type="hidden" id="setting_icon_o" name="setting_icon_o" class="form-control" value="<?php echo $setting['setting_icon']?>">
                    <button type="button" class="btn btn-default" onclick="window.location='?content=setting';" >ย้อนกลับ</button>
                    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
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