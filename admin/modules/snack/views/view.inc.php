<div class="row">
	<div class="col-lg-12">
		<h1>ระบบจัดการขนม</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลขนม</h2>
		<div align=right>
			<a class="button" href="?content=snack_type">
				จัดการประเภทขนม
			</a>
			<a class="button" href="?content=snack&action=insert">
				เพิ่มขนม
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อขนม</th>  
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
				<?php for($i=0; $i < count($snack); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img  src="../img_upload/snack/<?php if($snack[$i]['snack_image'] != "") echo $snack[$i]['snack_image']; else echo "default.png" ?>"  class="img-responsive img-detail"> 
							<?php echo $snack[$i]['snack_name']; ?>
						</div>
					</td>
					<td><?php echo $snack[$i]['snack_detail']; ?></td>
					<td><?php echo $snack[$i]['snack_price']; ?></td>
					<td id="snack_suggest_<?php echo $snack[$i]['snack_id'];?>">
						<?php if($snack[$i]['snack_suggest'] == 1) {?> 
						<a onclick="setBakerySuggest(<?php echo $snack[$i]['snack_id'];?>,0)" style="color:#f39927; "> 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($snack[$i]['snack_suggest'] == 0) {?> 
						<a onclick="setBakerySuggest(<?php echo $snack[$i]['snack_id'];?>,1)" style="color:gray; " > 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=snack_image&snack_id=<?php echo $snack[$i]['snack_id'];?>" style="color: green;">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="snack_show_<?php echo $snack[$i]['snack_id'];?>">
						<?php if($snack[$i]['snack_show'] == 1) {?> 
						<a onclick="setBakeryShow(<?php echo $snack[$i]['snack_id'];?>,0)" class="icon" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($snack[$i]['snack_show'] == 0) {?> 
						<a onclick="setBakeryShow(<?php echo $snack[$i]['snack_id'];?>,1)" class="icon" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=snack&action=update&id=<?php echo $snack[$i]['snack_id'];?>" style="">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=snack&action=delete&id=<?php echo $snack[$i]['snack_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $snack[$i]['snack_name']; ?> ?');" style="color:red; ">
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
	function setBakeryShow(id,val){
		$.post( "modules/snack/controls/setBakeryShow.php", { snack_id: id, snack_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#snack_show_"+id).html('<a onclick="setBakeryShow('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#snack_show_"+id).html('<a onclick="setBakeryShow('+id+',0)" class="icon" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}

	function setBakerySuggest(id,val){
		$.post( "modules/snack/controls/setBakerySuggest.php", { snack_id: id, snack_suggest: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#snack_suggest_"+id).html('<a onclick="setBakerySuggest('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}else{
						$("#snack_suggest_"+id).html('<a onclick="setBakerySuggest('+id+',0)" class="icon" style="color:#f39927; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>