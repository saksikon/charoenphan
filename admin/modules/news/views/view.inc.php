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
		<h1>ระบบจัดการข่าวสาร</h1>
		<h2>เพิ่ม ลบ เเก้ไขข้อมูลข่าวสาร</h2>
		<div align=right>
			<a href="?content=news&action=insert">
				<input class="button" type="submit" value="เพิ่มข่าวสาร">
			</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>หัวข้อข่าว</th>  
					<th>คำอธิบาย</th>
					<th>วันเวลา</th>
					<th>รูปภาพเพิ่มเติม</th>  
					<th>แสดง</th>
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=0; $i < count($news); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<div align="left">
							<img src="../img_upload/news/<?php if($news[$i]['news_image_1'] != "") echo $news[$i]['news_image_1']; else echo "default.png" ?>" height="72" class="img-responsive"/> 
						</div>
						<?php echo $news[$i]['news_title']; ?>
					</td>
					<td><?php echo $news[$i]['news_description']; ?></td>
					<td><?php echo $news[$i]['news_date']; ?> </td>
					<td>
						<a href="?content=news_image&news_id=<?php echo $news[$i]['news_id'];?>" style="color: green; ">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</a> 
					</td>
					<td id="news_show_<?php echo $news[$i]['news_id'];?>">
						<?php if($news[$i]['news_show'] == 1) {?> 
						<a onclick="setNewsShow(<?php echo $news[$i]['news_id'];?>,0)" class="icon" style="color:blue; "> 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
						<?php if($news[$i]['news_show'] == 0) {?> 
						<a onclick="setNewsShow(<?php echo $news[$i]['news_id'];?>,1)" class="icon" style="color:gray; " > 
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
						<?php } ?>
					</td>
					<td>
						<a href="?content=news&action=update&id=<?php echo $news[$i]['news_id'];?>" style="">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
					</td>
					<td>
						<a href="?content=news&action=delete&id=<?php echo $news[$i]['news_id'];?>" onclick="return confirm('คุณต้องการลบข่าว : <?php echo $news[$i]['news_title']; ?>');" style="color:red; ">
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
	function setNewsShow(id,val){
		$.post( "modules/news/controls/setNewsShow.php", { news_id: id, news_show: val})
			.done(function( data ) {
				if ($.trim(data)==1){
					if(val == 0){
						$("#news_show_"+id).html('<a onclick="setNewsShow('+id+',1)" style="color:gray; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}else{
						$("#news_show_"+id).html('<a onclick="setNewsShow('+id+',0)" style="color:blue; " ><i class="fa fa-eye" aria-hidden="true"></i></a>');
					}
				}else{
					alert("ขอโทดด้วย ไม่สามารถทำได้");
				}
		});
	}
</script>


