<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>ระบบจัดการประเภทเบเกอรี่</h1>
			<h2>ค้นหา เพิ่ม ลบ เเก้ไขข้อมูลประเภทเบเกอรี่</h2>
		</div>
		<div align=right>
			<a class="button" href="?content=food">ย้อนกลับ</a>
			<a class="button" href="?content=food_type&action=insert">เพิ่มประเภท</a>
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
				<?php for($i=0; $i < count($food_type); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img src="../img_upload/food_type/<?php if($food_type[$i]['food_type_image'] != ""){echo $food_type[$i]['food_type_image']; } else { echo "default.png";}?>" style="width: 120px; height: 120px;"> 
							<?php echo $food_type[$i]['food_type_name']; ?>
						</div>
					</td>
					<td id="food_type_show_<?php echo $food_type[$i]['food_type_id'];?>">
						<?php if($food_type[$i]['food_type_show'] == 1) {?> 
						<a onclick="setFoodTypeShow(<?php echo $food_type[$i]['food_type_id'];?>,0)" class="icon" style="color:blue;"> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($food_type[$i]['food_type_show'] == 0) {?> 
						<a onclick="setFoodTypeShow(<?php echo $food_type[$i]['food_type_id'];?>,1)" class="icon" style="color:gray;" > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=food_type&action=update&id=<?php echo $food_type[$i]['food_type_id'];?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=food_type&action=delete&id=<?php echo $food_type[$i]['food_type_id'];?>" onclick="return confirm('คุณต้องการลบประเภทร้านค้า : <?php echo $food_type[$i]['food_type_name']; ?> ใช่หรือไม่');" style="color:red;">
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
	function setFoodTypeShow(id,val){
		$.post( "modules/food_type/controls/setFoodTypeShow.php", { food_type_id: id, food_type_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#food_type_show_"+id).html('<a onclick="setFoodTypeShow('+id+',1)" class="icon" style="color:gray;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#food_type_show_"+id).html('<a onclick="setFoodTypeShow('+id+',0)" class="icon" style="color:blue;" ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>



