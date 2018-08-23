<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_about').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_about').attr('src', '../img_upload/about/default.png');
		}
	}
</script>

<div class="row">
    <div class="col-lg-6">
        <h1>ตั้งค่าเกี่ยวกับเรา</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="index.php?content=about&action=edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>หัวข้อใหญ่ประจำหน้า </label>
                                        <input id="about_header" name="about_header" class="form-control"  value="<?php echo $about['about_header']?>">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>รายละเอียดใต้หัวข้อ </label>
                                        <input id="about_header_detail" name="about_header_detail" class="form-control" value="<?php echo $about['about_header_detail']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียดประจำหน้า </label>
                                        <textarea id="about_description" name="about_description" class="form-control" style="min-height: 200px;"/><?php echo $about['about_description']?></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพประจำหน้า </label>
                                <div>
                                    <img id="img_about" src="../img_upload/about/<?php if($about['about_image'] != "") echo $about['about_image']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="about_image" name="about_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <input type="hidden" id="about_image_o" name="about_image_o" class="form-control" value="<?php echo $about['about_image']?>">
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<hr>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
        <h1>จัดการสไลด์เกี่ยวกับเรา</h1>
        <h2>เพิ่ม ลบ เเก้ไขข้อมูลสไลด์เกี่ยวกับเรา</h2>
        <div align=right>
            <a class="button" href="?content=about_slide&action=insert">
                เพิ่มสไลด์เกี่ยวกับเรา
            </a>
        </div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>หัวข้อสไลด์</th>  
					<th>รายละเอียด</th>
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($about_slide); $i++){ ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td>
                        <div align="left">
                            <img  src="../img_upload/about_slide/<?php if($about_slide[$i]['about_slide_image'] != "") echo $about_slide[$i]['about_slide_image']; else echo "default.png" ?>"  class="img-responsive img-detail"> 
                        </div>
                        <?php echo $about_slide[$i]['about_slide_header']; ?>
                    </td>
                    <td><?php echo $about_slide[$i]['about_slide_description']; ?></td>
                    <td id="about_slide_show_<?php echo $about_slide[$i]['about_slide_id'];?>">
                        <?php if($about_slide[$i]['about_slide_show'] == 1) {?> 
                        <a onclick="setAboutSlideShow(<?php echo $about_slide[$i]['about_slide_id'];?>,0)" style="color:blue; font-size: 20px;"> 
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <?php } ?>
                        <?php if($about_slide[$i]['about_slide_show'] == 0) {?> 
                        <a onclick="setAboutSlideShow(<?php echo $about_slide[$i]['about_slide_id'];?>,0)" style="color:gray; font-size: 20px;" > 
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="?content=about_slide&action=update&id=<?php echo $about_slide[$i]['about_slide_id'];?>" style="font-size: 20px;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                    </td>
                    <td>
                        <a href="?content=about_slide&action=delete&id=<?php echo $about_slide[$i]['about_slide_id'];?>" onclick="return confirm('คุณต้องการลบสไลด์ : <?php echo $about_slide[$i]['about_slide_header']; ?> ?');" style="color:red; font-size: 20px;">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>  
                    </td>
                </tr>
                <?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script>
	function setAboutSlideShow(id,val){
		$.post( "modules/about/controls/setAboutSlideShow.php", { about_slide_id: id, about_slide_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#about_slide_show_"+id).html('<a onclick="setAboutSlideShow('+id+',1)" style="color:gray; font-size: 20px;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#about_slide_show_"+id).html('<a onclick="setAboutSlideShow('+id+',0)" style="color:blue; font-size: 20px;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>
