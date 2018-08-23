<script>
    function check(){
        var promotion_name = document.getElementById("promotion_name").value;
        var promotion_description = document.getElementById("promotion_description").value;
        var promotion_begin = document.getElementById("promotion_begin").value;
        var promotion_end = document.getElementById("promotion_end").value;
       
        promotion_name = $.trim(promotion_name);
        promotion_description = $.trim(promotion_description);
        promotion_begin = $.trim(promotion_begin);
        promotion_end = $.trim(promotion_end);
        
        if(promotion_name.length == 0){
            alert("กรุณากรอกชื่อโปรโมชั่น");
            document.getElementById("promotion_name").focus();
            return false;
        }else if(promotion_description.length == 0){
            alert("กรุณากรอกรายละเอียดของโปรโมชั่น");
            document.getElementById("promotion_description").focus();
            return false;
        }else if(promotion_begin.length == 0){
            alert("กรุณากรอกวันที่เริ่มของโปรโมชั่น");
            document.getElementById("promotion_begin").focus();
            return false;
        }else if(promotion_end.length == 0){
            alert("กรุณากรอกวันสิ้นสุดของโปรโมชั่น");
            document.getElementById("promotion_end").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input,num) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_promotion_'+num).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_promotion_'+num).attr('src', '../img_upload/promotion/default.jpg');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขโปรโมชั่น</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=promotion&action=edit&id=<?PHP echo $promotion_id;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>ชื่อโปรโมชั่น <font color="#F00"><b>*</b></font></label>
                                <input id="promotion_name" name="promotion_name" class="form-control" value="<?php echo $promotion['promotion_name'];  ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>วันที่เริ่ม <font color="#F00"><b>*</b></font></label>
                                <input type="text" name="promotion_begin" id="promotion_begin" class="form-control" value="<?php echo $promotion['promotion_begin']; ?>" /> 
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>วันที่สิ้นสุด <font color="#F00"><b>*</b></font></label>
                                <input type="text" name="promotion_end" id="promotion_end" class="form-control" value="<?php echo $promotion['promotion_end']; ?>" /> 
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>รายละเอียดโปรโมชั่น <font color="#F00"><b>*</b></font></label>
                                <textarea id="promotion_description" name="promotion_description" class="form-control" style="min-height: 200px;" ><?php echo $promotion['promotion_description'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-9 (nested) -->
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>รูปภาพ <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                            <img id="img_promotion_1" src="../img_upload/promotion/<?php if($promotion['promotion_image_1'] != "") echo $promotion['promotion_image_1']; else echo "default.jpg"; ?>" class="img-responsive img-size"> 
                            <input accept=".jpg , .png" type="file" id="promotion_image_1" name="promotion_image_1" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,1);">
                        </diV>
                    </div>
                </div>
                <!-- /.col-lg-3 (nested) -->
            </div>
            <!-- /.row (nested) -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพเเถบข้าง <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                            <img id="img_promotion_2" src="../img_upload/promotion/<?php if($promotion['promotion_image_2'] != "") echo $promotion['promotion_image_2']; else echo "default.jpg"; ?>" class="img-responsive avatar"> 
                            <input accept=".jpg , .png" type="file" id="promotion_image_2" name="promotion_image_2" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,2);">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพเเถบข้าง <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                            <img id="img_promotion_3" src="../img_upload/promotion/<?php if($promotion['promotion_image_3'] != "") echo $promotion['promotion_image_3']; else echo "default.jpg"; ?>" class="img-responsive avatar"> 
                            <input accept=".jpg , .png" type="file" id="promotion_image_3" name="promotion_image_3" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,3);">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label>รูปภาพเเถบข้าง <font color="#F00"><b>600 x 315</b></font></label>
                        <div>
                            <img id="img_promotion_4" src="../img_upload/promotion/<?php if($promotion['promotion_image_4'] != "") echo $promotion['promotion_image_4']; else echo "default.jpg"; ?>" class="img-responsive avatar"> 
                            <input accept=".jpg , .png" type="file" id="promotion_image_4" name="promotion_image_4" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this,4);">
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" id="promotion_image_o_1" name="promotion_image_o_1" class="form-control" value="<? echo $promotion['promotion_image_1']; ?>">
            <input type="hidden" id="promotion_image_o_2" name="promotion_image_o_2" class="form-control" value="<? echo $promotion['promotion_image_2']; ?>">
            <input type="hidden" id="promotion_image_o_3" name="promotion_image_o_3" class="form-control" value="<? echo $promotion['promotion_image_3']; ?>">
            <input type="hidden" id="promotion_image_o_4" name="promotion_image_o_4" class="form-control" value="<? echo $promotion['promotion_image_4']; ?>">

            <div align="right">
                <button type="button" class="btn btn-default" onclick="window.location='?content=promotion&id=<?PHP echo $id;?>';" >ย้อนกลับ</button>
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
            <!-- /.row (nested) -->
        </form>
    </div>
    <!-- /.col-lg-12 -->
</div>
<link rel="stylesheet" media="all" type="text/css" href="../template/date-picker/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="../template/date-picker/jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="../template/date-picker/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../template/date-picker/jquery-ui.min.js"></script>

<script type="text/javascript" src="../template/date-picker/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../template/date-picker/jquery-ui-sliderAccess.js"></script>

<!-- <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script> -->

<script >
    $(function(){
        $("#promotion_end").datepicker({
            dateFormat: 'dd-mm-yy',
        // numberOfMonths: 2,
        });
        $("#promotion_begin").datepicker({
            dateFormat: 'dd-mm-yy',
        // numberOfMonths: 2,
        });

        // CKEDITOR.replace("promotion_description",{
		// 	filebrowserBrowseUrl : '../template/ckfinder/ckfinder.html',
		// 	filebrowserImageBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Images',
		// 	filebrowserFlashBrowseUrl : '../template/ckfinder/ckfinder.html?Type=Flash',
		// 	filebrowserUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		// 	filebrowserImageUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		// 	filebrowserFlashUploadUrl : '../template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		// });
    });
</script>