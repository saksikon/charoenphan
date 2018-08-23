<script>
    function check(){
        var about_slide_header = document.getElementById("about_slide_header").value;
        var about_slide_header_detail = document.getElementById("about_slide_header_detail").value;
        var about_slide_description = document.getElementById("about_slide_description").value;

        about_slide_header = $.trim(about_slide_header);
        about_slide_header_detail = $.trim(about_slide_header_detail);
        about_slide_description = $.trim(about_slide_description);

        if(about_slide_header.length == 0){
            alert("กรุณากรอกหัวข้อสไลด์");
            document.getElementById("about_slide_header").focus();
            return false;
        }else if(about_slide_header_detail.length == 0){
            alert("กรุณากรอกรายละเอียดใต้หัวข้อ");
            document.getElementById("about_slide_header_detail").focus();
            return false;
        }else if(about_slide_description.length == 0){
            alert("กรุณากรอกรายละเอียด");
            document.getElementById("about_slide_description").focus();
            return false;
        }else{
            return true;
        }
    }

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_about_slide').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_about_slide').attr('src', '../img_upload/about_slide/default.png');
		}
	}
</script>

<div class="row">
    <div class="col-lg-6">
        <h1>เพิ่มสไลด์เกี่ยวกับเรา</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=about_slide&action=add" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อสไลด์ </label>
                                        <input id="about_slide_header" name="about_slide_header" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>รายละเอียดใต้หัวข้อ </label>
                                        <input id="about_slide_header_detail" name="about_slide_header_detail" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียด </label>
                                        <textarea id="about_slide_description" name="about_slide_description" class="form-control" style="min-height: 200px;"/></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพประจำสไลด์ </label>
                                <div>
                                    <img id="img_about_slide" src="../img_upload/about_slide/default.png" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="about_slide_image" name="about_slide_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->