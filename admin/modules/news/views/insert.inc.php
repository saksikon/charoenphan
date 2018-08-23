<script>
	function check(){
		var news_title = document.getElementById("news_title").value;
		var news_description = document.getElementById("news_description").value;
		var news_detail = document.getElementById("news_detail").value;
		var news_date = document.getElementById("news_date").value;

		news_title = $.trim(news_title);
		news_description = $.trim(news_description);
		news_detail = $.trim(news_detail);
		news_date = $.trim(news_date);

		if(news_title.length == 0){
			alert("กรุณากรอกชื่อกิจกรรม");
			document.getElementById("news_title").focus();
			return false;
		}else if(news_description.length == 0){
			alert("กรุณากกรอกรายละเอียดกิจกรรมที่ใช้แสดงในหน้าแรก");
			document.getElementById("news_description").focus();
			return false;
		}else if(news_date.length == 0){
			alert("กรุณากกรอกวันที่ข่าว");
			document.getElementById("news_date").focus();
			return false;
		}else{
			return true;
		}
	}

	function readURL(input,num) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_news_'+num).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_news_'+num).attr('src', '../img_upload/news/default.png');
		}
	}

</script>

<div class="row">
	<div class="col-lg-6">
		<h1>เพิ่มข่าวสาร</h1>
	</div>
	<div class="col-lg-6" align="right">

	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<form role="form" method="post" onsubmit="return check();" action="index.php?content=news&action=add" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>รูปภาพ <font color="#F00"><b>200 x 340</b></font></label>
						<div>
							<img id="img_news_1" src="../img_upload/news/default.png" style="height: 200px;width: 340px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="news_image_1" name="news_image_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,1);">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group" style="position: absolute;bottom: 0; width: 90%;">
						<label>รูปภาพ <font color="#F00"><b>150 x 200</b></font></label>
						<div>
							<img id="img_news_2" src="../img_upload/news/default.png" style="height: 150px;width: 200px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="news_image_2" name="news_image_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,2);">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>หัวข้อข่าว <font color="#F00"><b>*</b></font></label>
								<input id="news_title" name="news_title" class="form-control">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>ป้ายกำกับ <font color="#F00"><b>*</b></font></label>
								<input id="news_tag" name="news_tag" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label>วันที่ <font color="#F00"><b>*</b></font></label>
								<input type="text" name="news_date" id="news_date" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>คำอธิบายโดยย่อ </label>
								<textarea id="news_description" name="news_description" class="form-control" style="min-height: 240px;"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>คำอธิบายเพิ่มเติม </label>
								<textarea id="news_detail" name="news_detail" class="form-control" style="min-height: 270px;"></textarea>
							</div>
						</div>
					</div>
				</div>
				<!-- /.col-lg-9 (nested) -->
				<div class="col-lg-3">
					<div class="form-group">
						<label>รูปภาพภายในเนื้อหาข่าว <font color="#F00"><b>600 x 315</b></font></label>
						<div>
							<img id="img_news_3" src="../img_upload/news/default.png" style="height: 400px;width: 220px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="news_image_3" name="news_image_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,3);">
						</div>
					</div>
					<div class="form-group">
						<label>รูปภาพภายในเนื้อหาข่าว <font color="#F00"><b>400 x 240</b></font></label>
						<div>
							<img id="img_news_4" src="../img_upload/news/default.png" style="height: 150px;width: 220px;" class="img-responsive"> 
							<input accept=".jpg , .png" type="file" id="news_image_4" name="news_image_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,4);">
						</div>
					</div>
				</div>
				<!-- /.col-lg-3 (nested) -->
			</div>
			<!-- /.row (nested) -->
			<div align="right">
				<button type="button" class="btn btn-default" onclick="window.location='?content=news';" >ย้อนกลับ</button>
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

<script >
	$(function(){
		$("#news_date").datetimepicker({
			dateFormat: 'dd-mm-yy',
        // numberOfMonths: 2,
		});
		
		// CKEDITOR.replace("news_detail",{
		// 	filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		// 	filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		// 	filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		// 	filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		// 	filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		// 	filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		// });
	});

</script>