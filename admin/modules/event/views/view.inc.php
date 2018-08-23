<script type="text/javascript">

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$('#img_image').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}else{
		$('#img_image').attr('src', '../img_upload/page/default.png');
	}
}
</script>

<div class="row">
	<div class="col-lg-12">
		<h1>ระบบจัดการกิจกรรม</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลกิจกรรม</h2>
		<div align=right>
			<a href="?content=event&action=insert">
				<input class="button" type="submit" value="เพิ่มกิจกรรม">
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>กิจกรรม</th>  
					<th>คำอธิบาย</th>
					<th>วันเวลา</th>
					<th>รูปภาพเพิ่มเติม</th>  
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($event); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img src="../img_upload/event/<?php if($event[$i]['event_image_1'] != "") echo $event[$i]['event_image_1']; else echo "default.png" ?>" height="72" class="img-responsive"/> 
						</div>
						<?php echo $event[$i]['event_title']; ?>
					</td>
					<td><?php echo $event[$i]['event_description']; ?></td>
					<td><?php echo $event[$i]['event_date_begin']; ?> ถึง <?php echo $event[$i]['event_date_end']; ?></td>
					<td>
						<a href="?content=event_image&event_id=<?php echo $event[$i]['event_id'];?>" style="color: green; ">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="event_show_<?php echo $event[$i]['event_id'];?>">
						<?php if($event[$i]['event_show'] == 1) {?> 
						<a onclick="setEventShow(<?php echo $event[$i]['event_id'];?>,0)" class="icon" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($event[$i]['event_show'] == 0) {?> 
						<a onclick="setEventShow(<?php echo $event[$i]['event_id'];?>,1)" class="icon" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=event&action=update&id=<?php echo $event[$i]['event_id'];?>" style="">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=event&action=delete&id=<?php echo $event[$i]['event_id'];?>" onclick="return confirm('คุณต้องการลบกิจกรรม : <?php echo $event[$i]['event_title']; ?>');" style="color:red; ">
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
	function setEventShow(id,val){
		$.post( "modules/event/controls/setEventShow.php", { event_id: id, event_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#event_show_"+id).html('<a onclick="setEventShow('+id+',1)" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#event_show_"+id).html('<a onclick="setEventShow('+id+',0)" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>


