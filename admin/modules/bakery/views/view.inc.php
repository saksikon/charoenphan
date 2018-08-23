<div class="row">
	<div class="col-lg-12">
		<h1>ระบบจัดการเบเกอรี่</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลเบเกอรี่</h2>
		<div align=right>
			<a class="button" href="?content=bakery_type">
				จัดการประเภทเบเกอรี่
			</a>
			<a class="button" href="?content=bakery&action=insert">
				เพิ่มเบเกอรี่
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อเบเกอรี่</th>  
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
				<?php for($i=0; $i < count($bakery); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img  src="../img_upload/bakery/<?php if($bakery[$i]['bakery_image'] != "") echo $bakery[$i]['bakery_image']; else echo "default.png" ?>"  class="img-responsive img-detail"> 
							<?php echo $bakery[$i]['bakery_name']; ?>
						</div>
					</td>
					<td><?php echo $bakery[$i]['bakery_detail']; ?></td>
					<td><?php echo $bakery[$i]['bakery_price']; ?></td>
					<td id="bakery_suggest_<?php echo $bakery[$i]['bakery_id'];?>">
						<?php if($bakery[$i]['bakery_suggest'] == 1) {?> 
						<a onclick="setBakerySuggest(<?php echo $bakery[$i]['bakery_id'];?>,0)" style="color:#f39927; "> 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($bakery[$i]['bakery_suggest'] == 0) {?> 
						<a onclick="setBakerySuggest(<?php echo $bakery[$i]['bakery_id'];?>,1)" style="color:gray; " > 
							<i class="fa fa-star" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=bakery_image&bakery_id=<?php echo $bakery[$i]['bakery_id'];?>" style="color: green;">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="bakery_show_<?php echo $bakery[$i]['bakery_id'];?>">
						<?php if($bakery[$i]['bakery_show'] == 1) {?> 
						<a onclick="setBakeryShow(<?php echo $bakery[$i]['bakery_id'];?>,0)" class="icon" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($bakery[$i]['bakery_show'] == 0) {?> 
						<a onclick="setBakeryShow(<?php echo $bakery[$i]['bakery_id'];?>,1)" class="icon" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=bakery&action=update&id=<?php echo $bakery[$i]['bakery_id'];?>" style="">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=bakery&action=delete&id=<?php echo $bakery[$i]['bakery_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $bakery[$i]['bakery_name']; ?> ?');" style="color:red; ">
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
		$.post( "modules/bakery/controls/setBakeryShow.php", { bakery_id: id, bakery_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#bakery_show_"+id).html('<a onclick="setBakeryShow('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#bakery_show_"+id).html('<a onclick="setBakeryShow('+id+',0)" class="icon" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}

	function setBakerySuggest(id,val){
		$.post( "modules/bakery/controls/setBakerySuggest.php", { bakery_id: id, bakery_suggest: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#bakery_suggest_"+id).html('<a onclick="setBakerySuggest('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}else{
						$("#bakery_suggest_"+id).html('<a onclick="setBakerySuggest('+id+',0)" class="icon" style="color:#f39927; " ><i class="fa fa-star" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>