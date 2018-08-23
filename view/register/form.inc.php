<script>

function check(){


var register_name = document.getElementById("register_name").value;
var register_address = document.getElementById("register_address").value;
var register_contact = document.getElementById("register_contact").value;
var register_phone = document.getElementById("register_phone").value;

register_name = $.trim(register_name);
register_phone = $.trim(register_phone);
register_address = $.trim(register_address);
register_contact = $.trim(register_contact);


if(register_name.length == 0){
    alert("กรุณากรอกชื่อธุรกิจ บริษัท/ห้าง/ร้าน");
    document.getElementById("register_name").focus();
    return false;
}else if(register_address.length == 0){
    alert("กรุณากรอกที่อยู่");
    document.getElementById("register_address").focus();
    return false;
}else if(register_contact.length == 0){
    alert("กรุณากรอกชื่อ - นามสกุล (ผู้ติดต่อประสานงาน)");
    document.getElementById("register_contact").focus();
    return false;
}else if(register_phone.length == 0){
    alert("กรุณากรอกเบอร์โทรศัพท์");
    document.getElementById("register_phone").focus();
    return false;
}else{
    return true;
}



}

</script>

<div class="register-section"> 
    <div class="container ">
        <h1>แบบฟอร์มเข้าร่วมโครงการมหกรรมโคราชลดทั้งเมือง</h1>
        <form role="form" method="post" onsubmit="return check();" action="register.php?action=add" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-lg-12">
                    <label>ชื่อธุรกิจ บริษัท/ห้าง/ร้าน<font color="#F00"><b>*</b></font></label>
                    <input type="text" id="register_name" name="register_name"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>ที่อยู่<font color="#F00"><b>*</b></font></label>
                    <input type="text" id="register_address" name="register_address"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>เวลาเปิด-ปิด<font color="#F00"><b></b></font></label>
                    <input type="text" id="register_open" name="register_open"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>ชื่อ - นามสกุล (ผู้ติดต่อประสานงาน)<font color="#F00"><b>*</b></font></label>
                    <input type="text" id="register_contact" name="register_contact"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>เบอร์โทรศัพท์<font color="#F00"><b>*</b></font></label>
                    <input type="text" id="register_phone" name="register_phone"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>Facebook<font color="#F00"><b></b></font></label>
                    <input type="text" id="register_facebook" name="register_facebook"  placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>Line ID<font color="#F00"><b></b></font></label>
                    <input type="text" id="register_line" name="register_line" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>Email<font color="#F00"><b></b></font></label>
                    <input type="text" id="register_email" name="register_email" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>ประเภทธุรกิจ<font color="#F00"><b></b></font></label>
                    <ul style="list-style-type: none;">
                    <?PHP for($i=0; $i<count($shop_category);$i++){ ?>
                    <li><input type="radio"  name="shop_category_id[]" value="<?PHP echo $shop_category[$i]['shop_category_id'];?>"  /> <?PHP echo $shop_category[$i]['shop_category_name']?></li>
                    <?PHP } ?>
                    <li>
                        <table width="100%">
                            <tr>
                                <td width="18">
                                    <input checked type="radio"  name="shop_category_id[]" value="0"  />  
                                </td>
                                <td>
                                    <input  type="text" id="shop_category_other" name="shop_category_other" placeholder="กรอกคำตอบ"  class="form-control input" />
                                </td>
                            </tr>
                        </table>
                    </li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <label>สินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 1 <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_product_1" name="register_product_1" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>รูปสินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 1 <font color="#F00"><b></b></font></label>
                    <input accept=".jpg"   type="file" id="register_image_1" name="register_image_1" >
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>สินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 2 <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_product_2" name="register_product_2" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>รูปสินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 2 <font color="#F00"><b></b></font></label>
                    <input accept=".jpg"   type="file" id="register_image_2" name="register_image_2" >
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>สินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 3 <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_product_3" name="register_product_3" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>รูปสินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 3 <font color="#F00"><b></b></font></label>
                    <input accept=".jpg"   type="file" id="register_image_3" name="register_image_3" >
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>สินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 4 <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_product_4" name="register_product_4" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>รูปสินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 4 <font color="#F00"><b></b></font></label>
                    <input accept=".jpg"   type="file" id="register_image_4" name="register_image_4" >
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>สินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 5 <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_product_5" name="register_product_5" placeholder="กรอกคำตอบ"  class="form-control input" />
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>รูปสินค้าหรือผลิตภัณฑ์ที่ร่วมรายการ 5 <font color="#F00"><b></b></font></label>
                    <input accept=".jpg"   type="file" id="register_image_5" name="register_image_5" >
                    <p class="help-block"></p>
                </div>
                <div class="col-lg-12">
                    <label>เงื่อนไขอื่นๆ <font color="#F00"><b></b></font></label>
                    <input type="text" id="register_condition" name="register_condition" placeholder="กรอกคำตอบ" class="form-control input" />
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" align="center">
                    <button type="Submit" class="btn btn-default">ล้างข้อมูล</button>
                    <button type="Submit" class="btn btn-success">สมัครเข้าร่วมโครงการ</button>
                </div>
            </div>
        </form>
       
    </div>
    <div class="row line-header">
        <div class="col-lg-12">
            <div class="container ">
                สามารถ Add line@ KoratMegaSale Partner เพื่อนรับรายละเอียดข้อมูลต่างๆ ในการจัดงานได้
            </div>
        </div>
    </div>
    <div class="row line-add">
        <div class="col-lg-12">
            <div class="container ">
                Scan ที่นี่เพื่มเข้าสู่ line@ KoratMegaSale Partner<br><br>
                <img src="img_upload/setting/line_ad.png" />
            </div>
        </div>
    </div>

</div>

