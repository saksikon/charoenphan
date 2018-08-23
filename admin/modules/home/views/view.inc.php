<script>
   

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#setting_logo').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#setting_logo').attr('src', '../img_upload/setting/default.png');
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
                <form role="form" method="post"  action="index.php?content=setting&action=edit&id=<?PHP echo $setting_id; ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อเว็ปไซต์ <font color="#F00"><b>*</b></font></label>
                                        <input id="setting_name" name="setting_name" class="form-control" value="<?php echo $setting['setting_name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>ป้ายกำกับ </label>
                                        <input id="setting_tag" name="setting_tag" class="form-control" value="<?php echo $setting['setting_tag']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียด </label>
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
                                        <label>INSTARGRAM </label>
                                        <input id="setting_ig" name="setting_ig" class="form-control"  value="<?php echo $setting['setting_ig']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>TWITTER </label>
                                        <input id="setting_twitter" name="setting_twitter" class="form-control"  value="<?php echo $setting['setting_twitter']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>YOUTUBE </label>
                                        <input id="setting_youtube" name="setting_youtube" class="form-control"  value="<?php echo $setting['setting_youtube']?>">
                                    </div>
                                    
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ที่อยู่ </label>
                                        <input id="setting_address" name="setting_address" class="form-control"  value="<?php echo $setting['setting_address']?>">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.col-lg-9 (nested) -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <img id="setting_logo" src="../img_upload/setting/<?php if($setting['setting_logo'] != "") echo $setting['setting_logo']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                <input accept=".jpg , .png" type="file" id="setting_logo" name="setting_logo" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                            </div>
                        </div>
                        <!-- /.col-lg-3 (nested) -->
                    </div>
                    <!-- /.row (nested) -->

                    

                   <div align="right">
                    <input type="hidden" id="updateby" name="updateby" class="form-control" value="<?=$_SESSION['jrp_user'][0][0]?>">
                    <input type="hidden" id="setting_id" name="setting_id" class="form-control" value="<?php echo $setting['setting_id']?>">
                    <input type="hidden" id="setting_logo_o" name="setting_logo_o" class="form-control" value="<?php echo $setting['setting_logo']?>">
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
<script >
    $(function(){
        $("#setting_open").timepicker({
            dateFormat: 'yy-mm-dd',
        // numberOfMonths: 2,
    });
        $("#setting_close").timepicker({
            dateFormat: 'yy-mm-dd',
        // numberOfMonths: 2,
    });

    });
</script>