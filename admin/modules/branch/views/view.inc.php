<div class="row">
	<div class="col-lg-12">
		<h1>ระบบจัดการสาขา</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลสาขา</h2>
		<div align=right>
			<a class="button" href="?content=branch&action=insert">
				เพิ่มสาขา
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อสาขา</th>  
					<th>เบอร์โทรศัพท์</th>
					<th>ที่อยู่</th>
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($branch); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img  src="../img_upload/branch/<?php if($branch[$i]['branch_image'] != "") echo $branch[$i]['branch_image']; else echo "default.png" ?>"  class="img-responsive img-detail"> 
							<?php echo $branch[$i]['branch_name']; ?>
						</div>
					</td>
					<td><?php echo $branch[$i]['branch_phone']; ?></td>
					<td><?php echo $branch[$i]['branch_address']; ?> <?php echo $branch[$i]['branch_district']; ?> <?php echo $branch[$i]['branch_amphur']; ?> <?php echo $branch[$i]['branch_province']; ?></td>
					<td id="branch_show_<?php echo $branch[$i]['branch_id'];?>">
						<?php if($branch[$i]['branch_show'] == 1) {?> 
						<a onclick="setBranchShow(<?php echo $branch[$i]['branch_id'];?>,0)" style="color:blue; font-size: 20px;"> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($branch[$i]['branch_show'] == 0) {?> 
						<a onclick="setBranchShow(<?php echo $branch[$i]['branch_id'];?>,1)" style="color:gray; font-size: 20px;" > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=branch&action=update&id=<?php echo $branch[$i]['branch_id'];?>" style="font-size: 20px;">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=branch&action=delete&id=<?php echo $branch[$i]['branch_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $branch[$i]['branch_name']; ?> ?');" style="color:red; font-size: 20px;">
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
	function setBranchShow(id,val){
		$.post( "modules/branch/controls/setBranchShow.php", { branch_id: id, branch_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#branch_show_"+id).html('<a onclick="setBranchShow('+id+',1)" style="color:gray; font-size: 20px;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#branch_show_"+id).html('<a onclick="setBranchShow('+id+',0)" style="color:blue; font-size: 20px;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>