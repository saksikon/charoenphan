<script>
	function check(){
		var snack_name = document.getElementById("snack_name").value;
		var snack_detail = document.getElementById("snack_detail").value;
		var snack_price = document.getElementById("snack_price").value;

		snack_name = $.trim(snack_name);
		snack_detail = $.trim(snack_detail);
		snack_price = $.trim(snack_price);

		if(snack_name.length == 0){
			alert("กรุณากรอกชื่อขนม");
			document.getElementById("snack_name").focus();
			return false;
		}else if(snack_detail.length == 0){
			alert("กรุณากรอกรายละเอียดขนม");
			document.getElementById("snack_detail").focus();
			return false;
		}else if(snack_price.length == 0){
			alert("กรุณากรอกราคา");
			document.getElementById("snack_price").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#image_snack').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#image_snack').attr('src', '../img_upload/snack/default.png');
		}
	}
</script>

<div class="row">
	<div class="col-lg-6">
		<h1>เพิ่มขนม</h1>
	</div>
	<div class="col-lg-6" align="right">

	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<form role="form" method="post" onsubmit="return check();" action="index.php?content=snack&action=add" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-7">
							<div class="form-group">
								<label>ชื่อขนม <font color="#F00"><b>*</b></font></label>
								<input id="snack_name" name="snack_name" class="form-control" maxlength="150">
							</div>
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<label>ประเภทขนม <font color="#F00"><b>*</b></font></label>
								<select id="snack_type_id" name="snack_type_id" class="form-control">
									<?php for($i =  0 ; $i < count($snack_type) ; $i++){ ?>
									<option value="<?php echo $snack_type[$i]['snack_type_id'] ?>"><?php echo $snack_type[$i]['snack_type_name'] ?></option>
									<? } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>ราคา </label>
								<input id="snack_price" name="snack_price" class="form-control" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>รายละเอียดเพิ่มเติม </label>
								<textarea id="snack_detail" name="snack_detail" class="form-control" style="min-height: 120px;"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
					<label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
						<div>
						<img id="image_snack" src="../img_upload/snack/default.png" class="img-responsive img-size"> 
						<input accept=".jpg , .png" type="file" id="snack_image" name="snack_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
						</div>
					</div>
				</div>
			</div>
			
			<div align="right">
				<button type="button" class="btn btn-default" onclick="window.location='?content=snack';" >ย้อนกลับ</button>
				<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
				<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
			</div>
		</form>
   </div>
</div>