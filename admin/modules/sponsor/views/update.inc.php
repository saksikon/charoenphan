<script>
    function check(){
        var sponsor_name = document.getElementById("sponsor_name").value;
        var sponsor_url = document.getElementById("sponsor_url").value;

        sponsor_name = $.trim(sponsor_name);
        sponsor_url = $.trim(sponsor_url);

        if(sponsor_name.length == 0){
            alert("กรุณากรอกชื่อผู้สนับสนุน");
            document.getElementById("sponsor_name").focus();
            return false;
        }else if(sponsor_name.length == 0){
            alert("กรุณากรอกชื่อผู้สนับสนุนที่ใช้แสดงหน้าแรก");
            document.getElementById("sponsor_url").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#sponsor_name').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#sponsor_name').attr('src', '../img_upload/sponsor/default.png');
        }
    }

</script>

<div class="row">
    <div class="col-lg-6">
        <h1>แก้ไขผู้สนับสนุน</h1>
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
                <form role="form" method="post" onsubmit="return check();" action="index.php?content=sponsor&action=edit&id=<?PHP echo $sponsor_id;?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>ชื่อผู้สนับสนุน <font color="#F00"><b>*</b></font></label>
                                        <input id="sponsor_name" name="sponsor_name" class="form-control" value="<?php echo $sponsor['sponsor_name']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>URL ผู้สนับสนุน <font color="#F00"><b>*</b></font></label>
                                        <input id="sponsor_url" name="sponsor_url" class="form-control" value="<?php echo $sponsor['sponsor_url']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <img id="sponsor_name" src="../img_upload/sponsor/<?php if($sponsor['sponsor_image'] != ""){ echo $sponsor['sponsor_image'];} else { echo "default.png";}  ?>" class="img-responsive img-size"> 
                                        <input accept=".jpg , .png" type="file" id="sponsor_image" name="sponsor_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" >
                                    </div>
                                </div>
                            </div>
                            <div align="right">
                                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                        </div>
                        <!-- /.col-lg-9 (nested) -->
                        <button type="button" class="btn btn-default" onclick="window.location='?content=sponsor';" >ย้อนกลับ</button>
                        <input type="hidden" id="updateby" name="updateby" class="form-control" value="<?=$_SESSION['jrp_user'][0][0]?>">
                        <input type="hidden" id="sponsor_id" name="sponsor_id" class="form-control" value="<?=$_GET['id']?>">
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