<script>
    function readURL(input,num) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_meeting_room_'+num).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_meeting_room_'+num).attr('src', '../img_upload/meeting_room/default.png');
		}
	}
</script>

<div class="row">
    <div class="col-lg-6">
        <h1>ห้องประชุม</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <form role="form" method="post" action="index.php?content=meeting_room&action=edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>หัวข้อ </label>
                                        <input id="meeting_room_title" name="meeting_room_title" class="form-control"  value="<?php echo $meeting_room['meeting_room_title']?>">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียดย่อหน้า 1 </label>
                                        <textarea id="meeting_room_description_1" name="meeting_room_description_1" class="form-control" style="min-height: 200px;"/><?php echo $meeting_room['meeting_room_description_1']?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>รายละเอียดย่อหน้า 2 </label>
                                        <textarea id="meeting_room_description_2" name="meeting_room_description_2" class="form-control" style="min-height: 280px;"/><?php echo $meeting_room['meeting_room_description_2']?></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพ </label>
                                <div>
                                    <img id="img_meeting_room_1" src="../img_upload/meeting_room/<?php if($meeting_room['meeting_room_image_1'] != "") echo $meeting_room['meeting_room_image_1']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="meeting_room_image_1" name="meeting_room_image_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,1);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>รูปภาพ </label>
                                <div>
                                    <img id="img_meeting_room_2" src="../img_upload/meeting_room/<?php if($meeting_room['meeting_room_image_2'] != "") echo $meeting_room['meeting_room_image_2']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="meeting_room_image_2" name="meeting_room_image_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,2);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพ </label>
                                <div>
                                    <img id="img_meeting_room_3" src="../img_upload/meeting_room/<?php if($meeting_room['meeting_room_image_3'] != "") echo $meeting_room['meeting_room_image_3']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="meeting_room_image_3" name="meeting_room_image_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,3);">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>รูปภาพ </label>
                                <div>
                                    <img id="img_meeting_room_4" src="../img_upload/meeting_room/<?php if($meeting_room['meeting_room_image_4'] != "") echo $meeting_room['meeting_room_image_4']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                                    <input accept=".jpg , .png" type="file" id="meeting_room_image_4" name="meeting_room_image_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,4);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <input type="hidden" id="meeting_room_image_o_1" name="meeting_room_image_o_1" class="form-control" value="<?php echo $meeting_room['meeting_room_image_1']?>">
                        <input type="hidden" id="meeting_room_image_o_2" name="meeting_room_image_o_2" class="form-control" value="<?php echo $meeting_room['meeting_room_image_2']?>">
                        <input type="hidden" id="meeting_room_image_o_3" name="meeting_room_image_o_3" class="form-control" value="<?php echo $meeting_room['meeting_room_image_3']?>">
                        <input type="hidden" id="meeting_room_image_o_4" name="meeting_room_image_o_4" class="form-control" value="<?php echo $meeting_room['meeting_room_image_4']?>">
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