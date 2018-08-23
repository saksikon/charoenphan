<script>
    function check(){
        varbakery_type_name = document.getElementById("bakery_type_name").value;

       bakery_type_name = $.trim(bakery_type_name);

        if(bakery_type_name.length == 0){
            alert("กรุณากรอกชื่อประเภทผลิตภัณฑ์");
            document.getElementById("bakery_type_name").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#bakery_type_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#bakery_type_image').attr('src', '../img_upload/bakery_type/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>เพิ่มประเภทผลิตภัณฑ์</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=bakery_type&action=add" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>ชื่อประเภทผลิตภัณฑ์ <font color="#F00"><b>*</b></font></label>
                                <input id="bakery_type_name" name="bakery_type_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img id="bakery_type_image" src="../img_upload/bakery_type/default.png" class="img-responsive img-size"> 
                                <input accept=".jpg , .png" type="file" id="bakery_type_image" name="bakery_type_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="window.location='?content=bakery_type';" >ย้อนกลับ</button>
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>