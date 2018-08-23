<script>
    function check(){
		var branch_name = document.getElementById("branch_name").value;
		var branch_phone = document.getElementById("branch_phone").value;
		var branch_address = document.getElementById("branch_address").value;
		var branch_province = document.getElementById("branch_province").value;
		var branch_amphur = document.getElementById("branch_amphur").value;
		var branch_district = document.getElementById("branch_district").value;
		var branch_zipcode = document.getElementById("branch_zipcode").value;
		var branch_detail = document.getElementById("branch_detail").value;

		branch_name = $.trim(branch_name);
		branch_phone = $.trim(branch_phone);
		branch_address = $.trim(branch_address);
		branch_province = $.trim(branch_province);
		branch_amphur = $.trim(branch_amphur);
		branch_district = $.trim(branch_district);
		branch_zipcode = $.trim(branch_zipcode);
		branch_detail = $.trim(branch_detail);

		if(branch_name.length == 0){
			alert("กรุณากรอกชื่อสาขา");
			document.getElementById("branch_name").focus();
			return false;
		}else if(branch_address.length == 0){
			alert("กรุณากรอกที่อยู่สาขา");
			document.getElementById("branch_address").focus();
			return false;
		}else if(branch_province.length == 0){
			alert("กรุณากรอกจังหวัด");
			document.getElementById("branch_province").focus();
			return false;
		}else if(branch_amphur.length == 0){
			alert("กรุณากรอกอำเภอ");
			document.getElementById("branch_amphur").focus();
			return false;
		}else if(district_id.length == 0){
			alert("กรุณากรอกตำบล");
			document.getElementById("district_id").focus();
			return false;
		}else if(branch_zipcode.length == 0){
			alert("กรุณากรอกเลขไปรษณี");
			document.getElementById("branch_zipcode").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#branch_image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#branch_image').attr('src', '../img_upload/branch/default.png');
		}
	}


</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขร้านค้า</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=branch&action=edit&id=<?PHP echo $branch_id; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>ชื่อร้านค้า <font color="#F00"><b>*</b></font></label>
                                <input id="branch_name" name="branch_name" class="form-control" value="<?php echo $branch['branch_name']?>">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>เบอร์โทรศัพท์ </label>
                                <input id="branch_phone" name="branch_phone" class="form-control" value="<?php echo $branch['branch_phone']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>ที่อยู่อีเมล </label>
                                <input id="branch_email" name="branch_email" class="form-control" value="<?php echo $branch['branch_email']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>FACEBOOK URL </label>
                                <input id="branch_facebook" name="branch_facebook" class="form-control" value="<?php echo $branch['branch_facebook']?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>LINE ID </label>
                                <input id="branch_line" name="branch_line" class="form-control" value="<?php echo $branch['branch_line']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>รายละเอียดเพิ่มเติม </label>
                                <input id="branch_detail" name="branch_detail" class="form-control" value="<?php echo $branch['branch_detail']?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-9 (nested) -->

                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                        <img id="branch_image" src="../img_upload/branch/<?php if($branch['branch_image'] != "") echo $branch['branch_image']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                        <input accept=".jpg , .png" type="file" id="branch_image" name="branch_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-3 (nested) -->
            </div>
            <!-- /.row (nested) -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>ที่อยู่ <font color="#F00"><b>*</b></font> </label>
                        <input type="text" id="branch_address" name="branch_address" class="form-control" value="<?php echo $branch['branch_address']?>">
                        <p class="help-block">Example : 271/55.</p>
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ตำบล/แขวง <font color="#F00"><b>*</b></font> </label>
                        <input id="branch_district" name="branch_district" data-live-search="true" type="text" class="form-control" value="<?php echo $branch['branch_district']?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>อำเภอ/เขต <font color="#F00"><b>*</b></font> </label>
                        <input id="branch_amphur" name="branch_amphur" data-live-search="true" type="text" class="form-control" value="<?php echo $branch['branch_amphur']?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>จังหวัด <font color="#F00"><b>*</b></font> </label>
                        <input id="branch_province" name="branch_province" data-live-search="true" type="text" class="form-control" value="<?php echo $branch['branch_province']?>">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>หมายเลขไปรษณีย์ <font color="#F00"><b>*</b></font> </label>
                        <input id="branch_zipcode" name="branch_zipcode" type="text" class="form-control" value="<?php echo $branch['branch_zipcode']?>">
                    </div>
                </div>
            </div>
            <!-- /.row (nested) -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>แผนที่ตั้ง </label>
                        <fieldset class="gllpLatlonPicker">
                            <div class="row" style="padding:16px 0px;">
                                <div class="col-lg-6">
                                    <input type="text" class="gllpSearchField form-control" placeholder="ค้นหาตำแหน่ง">
                                </div>
                                <div class="col-lg-6">
                                    <input type="button" class="gllpSearchButton btn btn-primary" value="ค้นหา">
                                </div>
                            </div>
                            <div class="row" style="padding:16px 0px;">
                                <div class="col-lg-12">
                                <div class="gllpMap">Google Maps</div>
                                </div>
                            </div>
                            <div class="row" style="padding:16px 0px;">	
                                <div class="col-lg-6">
                                    <input type="text" class="gllpLongitude form-control" name="branch_location_long" value="<?php echo $branch['branch_location_long'] ?>"/>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="gllpLatitude form-control" name="branch_location_lat" value="<?php echo $branch['branch_location_lat'] ?>"/>
                                </div>
                            </div>
                            <input type="hidden" class="gllpZoom" value="16"/>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div align="right">
                <input type="hidden" id="branch_id" name="branch_id" class="form-control" value="<?php echo $branch['branch_id']?>">
                <input type="hidden" id="branch_image_o" name="branch_image_o" class="form-control" value="<?php echo $branch['branch_image']?>">
                <button type="button" class="btn btn-default" onclick="window.location='?content=branch';" >ย้อนกลับ</button>
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<link rel="stylesheet" type="text/css" href="../template/map/css/jquery-gmaps-latlon-picker.css"/>
<script src="../template/map/js/jquery-gmaps-latlon-picker.js"></script>
