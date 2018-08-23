<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>ระบบจัดการผู้สนับสนุน</h1>
			<h2>ค้นหา เพิ่ม ลบ เเก้ไขข้อมูลผู้สนับสนุน</h2>
		</div>
		<div align=right>
			<a class="button" href="?content=sponsor&action=insert">เพิ่มผู้สนับสนุน </a>
		</div>
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>ชื่อผู้สนับสนุน</th>  
					<th>แสดง</th>  
					<th>เเก้ไข</th>
					<th>ลบ</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				for($i=0; $i < count($sponsors); $i++){
					?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td>
							<div align="left">
								<img src="../img_upload/sponsor/<?php if($sponsors[$i]['sponsor_image'] != ""){echo $sponsors[$i]['sponsor_image']; } else { echo "default.png";}?>" style="width: 120px; height: 120px;"> 
								<?php echo $sponsors[$i]['sponsor_name']; ?>
							</div>
						</td>
						<td>
							<?php if($sponsors[$i]['sponsor_show'] == 1) {?> <a href="?content=sponsor&action=see&id=<?php echo $sponsors[$i]['sponsor_id'];?>&val=0" style="color:blue;"> 
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<?php } ?>
							<?php if($sponsors[$i]['sponsor_show'] == 0) {?> <a href="?content=sponsor&action=see&id=<?php echo $sponsors[$i]['sponsor_id'];?>&val=1" style="color:gray;" > 
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<?php } ?>
						</td>
						<td>
							<a href="?content=sponsor&action=update&id=<?php echo $sponsors[$i]['sponsor_id'];?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a> 
						</td>
						<td>
							<a href="?content=sponsor&action=delete&id=<?php echo $sponsors[$i]['sponsor_id'];?>" onclick="return confirm('คุณต้องการลบผู้สนับสนุน : <?php echo $sponsors[$i]['sponsor_name']; ?> ใช่หรือไม่');" style="color:red;">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>  
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>



