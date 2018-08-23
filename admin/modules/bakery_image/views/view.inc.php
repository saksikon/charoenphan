<script>
	function check(){
		var bakery_image_image = document.getElementById("bakery_image_image").value;

		bakery_image_image = $.trim(bakery_image_image);

		if(bakery_image_image.length == 0){
			alert("กรุณาเลือกรูปภาพ");
			document.getElementById("bakery_image_image").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_image_bakery').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_image_bakery').attr('src', '../img_upload/bakery_image/default.png');
		}
	}
</script>

<div class="row">
	<div class="col-lg-6">
		<h1>เพิ่มรูปภาพ</h1>
	</div>
	<div class="col-lg-6" align="right">

	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<form role="form" method="post" onsubmit="return check();" action="index.php?content=bakery_image&action=add&bakery_id=<? echo $bakery_id ?>" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<label>รูปภาพ <font color="#F00"><b>200 x 340</b></font></label>
						<div>
							<img id="img_image_bakery" src="../img_upload/bakery_image/default.png" style="height: 200px;width: 340px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="bakery_image_image" name="bakery_image_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
						</div>
					</div>
				</div>
			</div>
			<div>
				<button type="button" class="btn btn-default" onclick="window.location='?content=bakery';" >ย้อนกลับ</button>
				<button type="submit" class="btn btn-success">เพิ่มรูปภาพ</button>
			</div>
		</form>
	</div>
</div>

<div style="border: 1px solid #ccc!important; border-radius: 16px; margin-top: 20px;">
	<div class="row">
		<? for($i = 0; $i < count($bakery_image); $i++ ) {?>
		<div class="col-lg-2">
			<div class="form-group" style="margin-top: 10px;margin-bottom: 10px;">
				<div style="text-align: center;">
					<img id="bakery_image" src="../img_upload/bakery_image/<?php if($bakery_image[$i]['bakery_image_image'] != "") echo $bakery_image[$i]['bakery_image_image']; else echo "default.png" ?>" class="img-responsive img-size-sup"> 
					<a href="?content=bakery_image&action=delete&bakery_id=<? echo $bakery_id ?>&id=<? echo $bakery_image[$i]['bakery_image_id'] ?>" onclick="return confirm('คุณต้องการลบรูปภาพนี้ใช่หรือไม่ ?');" style="color:red; font-size: 20px;">
						<i class="fa fa-times" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		<? } ?>
	</div>
</div>