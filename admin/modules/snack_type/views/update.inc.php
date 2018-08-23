<script>
    function check(){
        var snack_type_name = document.getElementById("snack_type_name").value;

        snack_type_name = $.trim(snack_type_name);

        if(snack_type_name.length == 0){
            alert("กรุณากรอกชื่อประเภทขนม");
            document.getElementById("snack_type_name").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#snack_type_name').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#snack_type_name').attr('src', '../img_upload/snack_type/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขประเภทขนม</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=snack_type&action=edit&id=<?PHP echo $snack_type_id;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>ชื่อประเภทขนม <font color="#F00"><b>*</b></font></label>
                                <input id="snack_type_name" name="snack_type_name" class="form-control" value="<?php echo $snack_type['snack_type_name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img id="snack_type_name" src="../img_upload/snack_type/<?php if($snack_type['snack_type_image'] != ""){ echo $snack_type['snack_type_image'];} else { echo "default.png";}  ?>" class="img-responsive img-size"> 
                                <input accept=".jpg , .png" type="file" id="snack_type_image" name="snack_type_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" >
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="window.location='?content=snack_type';" >ย้อนกลับ</button>
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                </div>
                <input type="hidden" id="snack_type_id" name="snack_type_id" class="form-control" value="<?=$_GET['id']?>">
            </div>
        </form>
    </div>
</div>