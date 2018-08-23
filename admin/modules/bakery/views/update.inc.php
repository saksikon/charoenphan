<script>
	function check(){
		var bakery_name = document.getElementById("bakery_name").value;
		var bakery_detail = document.getElementById("bakery_detail").value;
		var bakery_price = document.getElementById("bakery_price").value;

		bakery_name = $.trim(bakery_name);
		bakery_detail = $.trim(bakery_detail);
		bakery_price = $.trim(bakery_price);

		if(bakery_name.length == 0){
			alert("กรุณากรอกชื่อผลิตภัณฑ์");
			document.getElementById("bakery_name").focus();
			return false;
		}else if(bakery_detail.length == 0){
			alert("กรุณากรอกรายละเอียดผลิตภัณฑ์");
			document.getElementById("bakery_detail").focus();
			return false;
		}else if(bakery_price.length == 0){
			alert("กรุณากรอกราคา");
			document.getElementById("bakery_price").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#image_bakery').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#image_bakery').attr('src', '../img_upload/bakery/default.png');
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
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=bakery&action=edit&id=<?PHP echo $bakery_id; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>ชื่อผลิตภัณฑ์ <font color="#F00"><b>*</b></font></label>
                                <input id="bakery_name" name="bakery_name" class="form-control" value="<?php echo $bakery['bakery_name']?>" maxlength="150">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>ประเภทผลิตภัณฑ์ <font color="#F00"><b>*</b></font></label>
                                <select id="bakery_type_id" name="bakery_type_id" class="form-control">
                                    <?php for($i =  0 ; $i < count($bakery_type) ; $i++){ ?>
                                    <option <?php if($user['bakery_type_id'] == $bakery_type[$i]['bakery_type_id'] ){?> selected <?php } ?> value="<?php echo $bakery_type[$i]['bakery_type_id'] ?>"><?php echo $bakery_type[$i]['bakery_type_name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>ราคา </label>
								<input id="bakery_price" name="bakery_price" class="form-control" value="<?php echo $bakery['bakery_price']?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>รายละเอียดเพิ่มเติม </label>
								<textarea id="bakery_detail" name="bakery_detail" class="form-control" style="min-height: 120px;"><?php echo $bakery['bakery_detail']?></textarea>
							</div>
						</div>
					</div>
                </div>
                <!-- /.col-lg-9 (nested) -->

                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                        <img id="image_bakery" src="../img_upload/bakery/<?php if($bakery['bakery_image'] != "") echo $bakery['bakery_image']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                        <input accept=".jpg , .png" type="file" id="bakery_image" name="bakery_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-3 (nested) -->
            </div>
            <!-- /.row (nested) -->
			
            <div align="right">
                <input type="hidden" id="bakery_id" name="bakery_id" class="form-control" value="<?php echo $bakery_id ?>">
                <input type="hidden" id="bakery_image_o" name="bakery_image_o" class="form-control" value="<?php echo $bakery['bakery_image']?>">
                <button type="button" class="btn btn-default" onclick="window.location='?content=bakery';" >ย้อนกลับ</button>
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>
