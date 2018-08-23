
<script type="text/javascript">

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#img_image').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#img_image').attr('src', '../img_upload/promotion/default.png');
		}
	}
</script>

<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>เพิ่มข้อมูลโปรโมชั่น</h1>
			<h2>เพิ่ม ลบ เเก้ไขข้อมูลโปรโมชั่น</h2>
			
			<div align=right>
				<a class="button" href="?content=promotion&action=insert">
					เพิ่มโปรโมชั่น
				</a>
			</div>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อโปรโมชั่น</th>  
					<th>รายละเอียด</th>
					<th>ระยะเวลา</th>
					<th>รูปภาพเพิ่มเติม</th>
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php  for($i=0; $i < count($promotion); $i++){ ?>
				<tr>
					<td align="center">
						<?PHP echo $i+1;?>.
					</td>
					<td>
						<div align="left">
							<img src="../img_upload/promotion/<?php if($promotion[$i]['promotion_image_1'] != "") echo $promotion[$i]['promotion_image_1']; else echo "default.jpg" ?>" style="width: 200px; height: 120px;"> 
						</div>
						<?php echo $promotion[$i]['promotion_name']; ?>
					</td>
					<td><?php echo $promotion[$i]['promotion_description'] ?></td>
					<td><?php echo $promotion[$i]['promotion_begin']." ถึง ".$promotion[$i]['promotion_end']; ?></td>
					<td>
						<a href="?content=promotion_image&promotion_id=<?php echo $promotion[$i]['promotion_id'];?>" style="color: green;">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="promotion_show_<?php echo $promotion[$i]['promotion_id'];?>">
						<?php if($promotion[$i]['promotion_show'] == 1) {?> 
						<a onclick="setPromotionShow(<?php echo $promotion[$i]['promotion_id'];?>,0)" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($promotion[$i]['promotion_show'] == 0) {?> 
						<a onclick="setPromotionShow(<?php echo $promotion[$i]['promotion_id'];?>,1)" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=promotion&action=update&id=<?php echo $promotion[$i]['promotion_id'];?>">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=promotion&action=delete&id=<?php echo $promotion[$i]['promotion_id'];?>" onclick="return confirm('คุณต้องการลบข้อมูลโปรโมชั่น : <?php echo $promotion[$i]['promotion_name']; ?> ใช่หรือไม่');" style="color:red; ">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a>  
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<?php
if(count($promotion) <= 0) {
	?>
	<br>
	<div style="text-align: center;">
		<span ><font>ยังไม่มีข้อเสนอพิเศษ</font></span>
	</div>
	<?php
}
?>

<script>
	function setPromotionShow(id,val){
		$.post( "modules/promotion/controls/setPromotionShow.php", { promotion_id: id, promotion_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#promotion_show_"+id).html('<a onclick="setPromotionShow('+id+',1)" class="icon" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#promotion_show_"+id).html('<a onclick="setPromotionShow('+id+',0)" class="icon" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>