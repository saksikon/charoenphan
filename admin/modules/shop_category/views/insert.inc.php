<script>
    function check(){
        var shop_category_name = document.getElementById("shop_category_name").value;
        var shop_category_title = document.getElementById("shop_category_title").value;

        shop_category_name = $.trim(shop_category_name);
        shop_category_title = $.trim(shop_category_title);

        if(shop_category_name.length == 0){
            alert("กรุณากรอกชื่อประเภทร้านค้า");
            document.getElementById("shop_category_name").focus();
            return false;
        }else if(shop_category_name.length == 0){
            alert("กรุณากรอกชื่อประเภทร้านค้าที่ใช้แสดงหน้าแรก");
            document.getElementById("shop_category_title").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#shop_category_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#shop_category_image').attr('src', '../img_upload/shop_category/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>เพิ่มประเภทร้านค้า</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=shop_category&action=add" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อประเภทร้านค้า <font color="#F00"><b>*</b></font></label>
                                        <input id="shop_category_name" name="shop_category_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อประเภทร้านค้า (แสดงหน้าแรก) <font color="#F00"><b>*</b></font></label>
                                        <input id="shop_category_title" name="shop_category_title" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <img id="shop_category_image" src="../img_upload/shop_category/default.png" class="img-responsive img-size"> 
                                        <input accept=".jpg , .png" type="file" id="shop_category_image" name="shop_category_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                                    </div>
                                </div>
                            </div>
                            <div align="right">
                                <button type="button" class="btn btn-default" onclick="window.location='?content=shop_category';" >ย้อนกลับ</button>
                                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </div>
                        <!-- /.col-lg-9 (nested) -->
                        <input type="hidden" id="addby" name="addby" class="form-control" value="<?=$_SESSION['jrp_user'][0][0]?>">
                    </div>
                    <!-- /.row (nested) --> 
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>