<script>
	function check(){
		var event_title = document.getElementById("event_title").value;
		var event_description = document.getElementById("event_description").value;
		var event_detail = document.getElementById("event_detail").value;
		var event_date_begin = document.getElementById("event_date_begin").value;
		var event_date_end = document.getElementById("event_date_end").value;

		event_title = $.trim(event_title);
		event_description = $.trim(event_description);
		event_detail = $.trim(event_detail);
		event_date_begin = $.trim(event_date_begin);
		event_date_end = $.trim(event_date_end);

		if(event_title.length == 0){
			alert("กรุณากรอกชื่อกิจกรรม");
			document.getElementById("event_title").focus();
			return false;
		}else if(event_description.length == 0){
			alert("กรุณากกรอกรายละเอียดที่ใช้แสดงในหน้าแรก");
			document.getElementById("event_description").focus();
			return false;
		}else if(event_date_begin.length == 0){
			alert("กรุณากกรอกวันที่เริ่ม");
			document.getElementById("event_date_begin").focus();
			return false;
		}else if(event_date_end.length == 0){
			alert("กรุณากกรอกวันที่สิ้นสุด");
			document.getElementById("event_date_end").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input,num) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_event_'+num).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_event_'+num).attr('src', '../img_upload/event/default.png');
		}
	}

</script>

<div class="row">
	<div class="col-lg-6">
		<h1>แก้ไขกิจกรรม</h1>
	</div>
	<div class="col-lg-6" align="right">

	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<form role="form" method="post" onsubmit="return check();" action="index.php?content=event&action=edit" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>รูปภาพกิจกรรม <font color="#F00"><b>200 x 340</b></font></label>
						<div>
							<img id="img_event_1" src="../img_upload/event/<?php if($event['event_image_1'] != "") echo $event['event_image_1']; else echo "default.png"; ?>" style="height: 200px;width: 340px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="event_image_1" name="event_image_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,1);">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group" style="position: absolute;bottom: 0; width: 90%;">
						<label>รูปภาพกิจกรรม <font color="#F00"><b>150 x 200</b></font></label>
						<div>
							<img id="img_event_2" src="../img_upload/event/<?php if($event['event_image_2'] != "") echo $event['event_image_2']; else echo "default.png"; ?>" style="height: 150px;width: 200px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="event_image_2" name="event_image_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,2);">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>ชื่อกิจกรรม <font color="#F00"><b>*</b></font></label>
								<input id="event_title" name="event_title" class="form-control" value="<? echo $event['event_title']; ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>ป้ายกำกับ <font color="#F00"><b>*</b></font></label>
								<input id="event_tag" name="event_tag" class="form-control" value="<? echo $event['event_tag']; ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>วันที่เริ่ม <font color="#F00"><b>*</b></font></label>
								<input type="text" name="event_date_begin" id="event_date_begin" class="form-control" value="<? echo $event['event_date_begin']; ?>"/>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label>วันที่สิ้นสุด <font color="#F00"><b>*</b></font></label>
								<input type="text" name="event_date_end" id="event_date_end" class="form-control" value="<? echo $event['event_date_end']; ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>คำอธิบายโดยย่อ </label>
								<textarea id="event_description" name="event_description" class="form-control" style="min-height: 240px;"><? echo $event['event_description']; ?></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>คำอธิบายเพิ่มเติม </label>
								<textarea id="event_detail" name="event_detail" class="form-control" style="min-height: 270px;"><?php echo $event['event_detail']; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col-lg-9 (nested) -->

				<div class="col-lg-3">
					<div class="form-group">
						<label>รูปภาพภายในกิจกรรม <font color="#F00"><b>600 x 315</b></font></label>
						<div>
							<img id="img_event_3" src="../img_upload/event/<?php if($event['event_image_3'] != "") echo $event['event_image_3']; else echo "default.png"; ?>" style="height: 400px;width: 220px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="event_image_3" name="event_image_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,3);">
						</div>
					</div>
					<div class="form-group">
						<label>รูปภาพภายในกิจกรรม <font color="#F00"><b>400 x 240</b></font></label>
						<div>
							<img id="img_event_4" src="../img_upload/event/<?php if($event['event_image_4'] != "") echo $event['event_image_4']; else echo "default.png"; ?>" style="height: 150px;width: 220px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="event_image_4" name="event_image_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,4);">
						</div>
					</div>
				</div>
				<!-- /.col-lg-3 (nested) -->
			</div>
			<!-- /.row (nested) -->			
			<div align="right">
				<input type="hidden" id="event_id" name="event_id" class="form-control" value="<?php echo $event['event_id']; ?>">
				<input type="hidden" id="event_image_o_1" name="event_image_o_1" class="form-control" value="<?php echo $event['event_image_1']; ?>">
				<input type="hidden" id="event_image_o_2" name="event_image_o_2" class="form-control" value="<?php echo $event['event_image_2']; ?>">
				<input type="hidden" id="event_image_o_3" name="event_image_o_3" class="form-control" value="<?php echo $event['event_image_3']; ?>">
				<input type="hidden" id="event_image_o_4" name="event_image_o_4" class="form-control" value="<?php echo $event['event_image_4']; ?>">

				<button type="button" class="btn btn-default" onclick="window.location='?content=event';" >ย้อนกลับ</button>
				<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
				<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
			</div>
		</form>
	</div>
</div>

<link rel="stylesheet" media="all" type="text/css" href="../template/date-picker/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="../template/date-picker/jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="../template/date-picker/jquery-ui.min.js"></script>
<script type="text/javascript" src="../template/date-picker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../template/date-picker/jquery-ui-sliderAccess.js"></script>

<script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>

<script>
	$(function(){
		$("#event_date_begin").datetimepicker({
			dateFormat: 'dd-mm-yy',
		});
		$("#event_date_end").datetimepicker({
			dateFormat: 'dd-mm-yy',
		});
		// CKEDITOR.replace("event_detail",{
		// 	filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		// 	filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		// 	filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		// 	filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		// 	filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		// 	filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		// });
	});

</script>