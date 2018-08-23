<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>ระบบจัดการประเภทเบเกอรี่</h1>
			<h2>ค้นหา เพิ่ม ลบ เเก้ไขข้อมูลประเภทเบเกอรี่</h2>
		</div>
		<div align=right>
			<a class="button" href="?content=snack">ย้อนกลับ</a>
			<a class="button" href="?content=snack_type&action=insert">เพิ่มประเภท</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อประเภท</th>  
					<th>แสดง</th>  
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($snack_type); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img src="../img_upload/snack_type/<?php if($snack_type[$i]['snack_type_image'] != ""){echo $snack_type[$i]['snack_type_image']; } else { echo "default.png";}?>" style="width: 120px; height: 120px;"> 
							<?php echo $snack_type[$i]['snack_type_name']; ?>
						</div>
					</td>
					<td id="snack_type_show_<?php echo $snack_type[$i]['snack_type_id'];?>">
						<?php if($snack_type[$i]['snack_type_show'] == 1) {?> 
						<a onclick="setSnackTypeShow(<?php echo $snack_type[$i]['snack_type_id'];?>,0)" class="icon" style="color:blue;"> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($snack_type[$i]['snack_type_show'] == 0) {?> 
						<a onclick="setSnackTypeShow(<?php echo $snack_type[$i]['snack_type_id'];?>,1)" class="icon" style="color:gray;" > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=snack_type&action=update&id=<?php echo $snack_type[$i]['snack_type_id'];?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=snack_type&action=delete&id=<?php echo $snack_type[$i]['snack_type_id'];?>" onclick="return confirm('คุณต้องการลบประเภทร้านค้า : <?php echo $snack_type[$i]['snack_type_name']; ?> ใช่หรือไม่');" style="color:red;">
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
	function setSnackTypeShow(id,val){
		$.post( "modules/snack_type/controls/setSnackTypeShow.php", { snack_type_id: id, snack_type_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#snack_type_show_"+id).html('<a onclick="setSnackTypeShow('+id+',1)" class="icon" style="color:gray;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#snack_type_show_"+id).html('<a onclick="setSnackTypeShow('+id+',0)" class="icon" style="color:blue;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>



