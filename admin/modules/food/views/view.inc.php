<div class="row">
	<div class="col-lg-12">
		<h1>ระบบจัดการอาหาร</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลอาหาร</h2>
		<div align=right>
			<a class="button" href="?content=food_type">
				จัดการประเภทอาหาร
			</a>
			<a class="button" href="?content=food&action=insert">
				เพิ่มอาหาร
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่ออาหาร</th>  
					<th>รายละเอียด</th>
					<th>ราคา</th>
					<th>เเนะนำ</th>
					<th>รูปภาพเพิ่มเติม</th>
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($food); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img  src="../img_upload/food/<?php if($food[$i]['food_image'] != "") echo $food[$i]['food_image']; else echo "default.png" ?>"  class="img-responsive img-detail"> 
						</div>
						<?php echo $food[$i]['food_name']; ?>
					</td>
					<td><?php echo $food[$i]['food_detail']; ?></td>
					<td><?php echo $food[$i]['food_price']; ?></td>
					<td id="food_suggest_<?php echo $food[$i]['food_id'];?>">
						<?php if($food[$i]['food_suggest'] == 1) {?> 
						<a onclick="setFoodSuggest(<?php echo $food[$i]['food_id'];?>,0)" style="color:#f39927; "> 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($food[$i]['food_suggest'] == 0) {?> 
						<a onclick="setFoodSuggest(<?php echo $food[$i]['food_id'];?>,1)" style="color:gray; " > 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=food_image&food_id=<?php echo $food[$i]['food_id'];?>" style="color: green;">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="food_show_<?php echo $food[$i]['food_id'];?>">
						<?php if($food[$i]['food_show'] == 1) {?> 
						<a onclick="setFoodShow(<?php echo $food[$i]['food_id'];?>,0)" class="icon" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($food[$i]['food_show'] == 0) {?> 
						<a onclick="setFoodShow(<?php echo $food[$i]['food_id'];?>,1)" class="icon" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=food&action=update&id=<?php echo $food[$i]['food_id'];?>" style="">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=food&action=delete&id=<?php echo $food[$i]['food_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $food[$i]['food_name']; ?> ?');" style="color:red; ">
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
	function setFoodShow(id,val){
		$.post( "modules/food/controls/setFoodShow.php", { food_id: id, food_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#food_show_"+id).html('<a onclick="setFoodShow('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#food_show_"+id).html('<a onclick="setFoodShow('+id+',0)" class="icon" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}

	function setFoodSuggest(id,val){
		$.post( "modules/food/controls/setFoodSuggest.php", { food_id: id, food_suggest: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#food_suggest_"+id).html('<a onclick="setFoodSuggest('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}else{
						$("#food_suggest_"+id).html('<a onclick="setFoodSuggest('+id+',0)" class="icon" style="color:#f39927; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>