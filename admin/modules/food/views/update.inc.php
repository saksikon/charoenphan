<script>
	function check(){
		var food_name = document.getElementById("food_name").value;
		var food_detail = document.getElementById("food_detail").value;
		var food_price = document.getElementById("food_price").value;

		food_name = $.trim(food_name);
		food_detail = $.trim(food_detail);
		food_price = $.trim(food_price);

		if(food_name.length == 0){
			alert("กรุณากรอกชื่ออาหาร");
			document.getElementById("food_name").focus();
			return false;
		}else if(food_detail.length == 0){
			alert("กรุณากรอกรายละเอียดอาหาร");
			document.getElementById("food_detail").focus();
			return false;
		}else if(food_price.length == 0){
			alert("กรุณากรอกราคา");
			document.getElementById("food_price").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#image_food').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#image_food').attr('src', '../img_upload/food/default.png');
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
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=food&action=edit&id=<?PHP echo $food_id; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label>ชื่ออาหาร <font color="#F00"><b>*</b></font></label>
                                <input id="food_name" name="food_name" class="form-control" value="<?php echo $food['food_name']?>" maxlength="150">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>ประเภทอาหาร <font color="#F00"><b>*</b></font></label>
                                <select id="food_type_id" name="food_type_id" class="form-control">
                                    <?php for($i =  0 ; $i < count($food_type) ; $i++){ ?>
                                    <option <?php if($user['food_type_id'] == $food_type[$i]['food_type_id'] ){?> selected <?php } ?> value="<?php echo $food_type[$i]['food_type_id'] ?>"><?php echo $food_type[$i]['food_type_name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>ราคา </label>
								<input id="food_price" name="food_price" class="form-control" value="<?php echo $food['food_price']?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>รายละเอียดเพิ่มเติม </label>
								<textarea id="food_detail" name="food_detail" class="form-control" style="min-height: 120px;"><?php echo $food['food_detail']?></textarea>
							</div>
						</div>
					</div>
                </div>
                <!-- /.col-lg-9 (nested) -->

                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                        <img id="image_food" src="../img_upload/food/<?php if($food['food_image'] != "") echo $food['food_image']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                        <input accept=".jpg , .png" type="file" id="food_image" name="food_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-3 (nested) -->
            </div>
            <!-- /.row (nested) -->
			
            <div align="right">
                <input type="hidden" id="food_id" name="food_id" class="form-control" value="<?php echo $food_id ?>">
                <input type="hidden" id="food_image_o" name="food_image_o" class="form-control" value="<?php echo $food['food_image']?>">
                <button type="button" class="btn btn-default" onclick="window.location='?content=food';" >ย้อนกลับ</button>
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>
</div>
