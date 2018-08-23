<script>
    function check(){
        var food_type_name = document.getElementById("food_type_name").value;

        food_type_name = $.trim(food_type_name);

        if(food_type_name.length == 0){
            alert("กรุณากรอกชื่อประเภทผลิตภัณฑ์");
            document.getElementById("food_type_name").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#food_type_name').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#food_type_name').attr('src', '../img_upload/food_type/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขประเภทผลิตภัณฑ์</h1>
    </div>
    <div class="col-lg-6" align="right">

    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form role="form" method="post" onsubmit="return check();" action="index.php?content=food_type&action=edit&id=<?PHP echo $food_type_id;?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>ชื่อประเภทผลิตภัณฑ์ <font color="#F00"><b>*</b></font></label>
                                <input id="food_type_name" name="food_type_name" class="form-control" value="<?php echo $food_type['food_type_name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <img id="food_type_name" src="../img_upload/food_type/<?php if($food_type['food_type_image'] != ""){ echo $food_type['food_type_image'];} else { echo "default.png";}  ?>" class="img-responsive img-size"> 
                                <input accept=".jpg , .png" type="file" id="food_type_image" name="food_type_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" >
                            </div>
                        </div>
                    </div>
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="window.location='?content=food_type';" >ย้อนกลับ</button>
                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    </div>
                </div>
                <input type="hidden" id="food_type_id" name="food_type_id" class="form-control" value="<?=$_GET['id']?>">
            </div>
        </form>
    </div>
</div>