<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>ระบบจัดการการติดต่อ</h1>
			<h2>ดูรายละเอียด เพิ่ม ลบ เเก้ไขข้อมูลการติดต่อ</h2>
			<div align=right>
				<!-- <a href="?content=contact&action=insert">
					<input class="button" type="submit" value="เพิ่มการติดต่อ">
				</a> -->
			</div>
		</div>
		<br>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อผู้ติดต่อ</th>
					<th>สาขาที่ติดต่อ</th>
					<th>ข้อความ</th>
					<th>อ่าน</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($contact); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td><?php echo $contact[$i]['contact_firstname']; ?> <?php echo $contact[$i]['contact_lastname']; ?></td>
					<td><?php echo $contact[$i]['branch_id'];  ?></td>
					<td><?php echo $contact[$i]['contact_message']; ?></td>
					<td>
						<?php if($contact[$i]['contact_see'] == 1) {?> 
						<a onclick="seeContact(<?php echo $contact[$i]['contact_id'];?>)" style="color:gray; font-size: 20px; cursor: pointer;"> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($contact[$i]['contact_see'] == 0) {?> 
						<a onclick="seeContact(<?php echo $contact[$i]['contact_id'];?>)" style="color:blue; font-size: 20px; cursor: pointer;" > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=contact&action=delete&id=<?php echo $contact[$i]['contact_id'];?>" onclick="return confirm('ต้องการลบการติอต่อจากคุณ : <?php echo $contact[$i]['contact_firstname']; ?> ?');" style="color:red; font-size: 20px;">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>  
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="modal_contact" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
                <h6 class="modal-title">การติดต่อ</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
							<label>จากคุณ : </label>
							<input class="form-control form-control-sm" name="modal_contact_name" id="modal_contact_name" type="text" readonly>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-lg-6">
                        <div class="form-group">
							<label>Email</label>
							<input class="form-control form-control-sm" name="modal_contact_email" id="modal_contact_email" type="text" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
							<label>Phone</label>
							<input class="form-control form-control-sm" name="modal_contact_phone" id="modal_contact_phone" type="text" readonly>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm">
                        <div class="form-group">
							<label>ข้อความ</label>
							<textarea class="form-control form-control-sm" style="min-height: 200px;" name="modal_contact_message" id="modal_contact_message" type="text" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-default" style="cursor: pointer;" data-dismiss="modal">Close</button>
            </div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$('#modal_contact').on('hidden.bs.modal', function () {
		window.location="index.php?content=contact";
	})

	function seeContact(id){
		$.post( "modules/contact/controls/seeContact.php", { contact_id: id})
			.done(function( data ) {
				$("#modal_contact_name").val(data.contact_firstname+' '+data.contact_lastname);
				$("#modal_contact_email").val(data.contact_email);
				$("#modal_contact_phone").val(data.contact_phone);
				$("#modal_contact_message").val(data.contact_message);
				$('#modal_contact').modal('show');
		});
	}
</script>



