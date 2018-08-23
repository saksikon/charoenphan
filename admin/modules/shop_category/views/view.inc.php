<div class="row">
	<div class="col-lg-12">
		<div>
			<h1>ระบบจัดการประเภทร้านค้า</h1>
			<h2>ค้นหา เพิ่ม ลบ เเก้ไขข้อมูลประเภทร้านค้า</h2>
		</div>
		<div align=right>
			<a class="button" href="?content=shop">ย้อนกลับ</a>
			<a class="button" href="?content=shop_category&action=insert">เพิ่มประเภท </a>
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
				<?php 
				for($i=0; $i < count($shop_categorys); $i++){
					?>
					<tr>
						<td><?php echo $i+1; ?></td>
						<td>
							<div align="left">
								<img src="../img_upload/shop_category/<?php if($shop_categorys[$i]['shop_category_image'] != ""){echo $shop_categorys[$i]['shop_category_image']; } else { echo "default.png";}?>" style="width: 120px; height: 120px;"> 
								<?php echo $shop_categorys[$i]['shop_category_name']; ?>
							</div>
						</td>
						<td>
							<?php if($shop_categorys[$i]['shop_category_show'] == 1) {?> <a href="?content=shop_category&action=see&id=<?php echo $shop_categorys[$i]['shop_category_id'];?>&val=0" style="color:blue;"> 
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<?php } ?>
							<?php if($shop_categorys[$i]['shop_category_show'] == 0) {?> <a href="?content=shop_category&action=see&id=<?php echo $shop_categorys[$i]['shop_category_id'];?>&val=1" style="color:gray;" > 
								<i class="fa fa-eye" aria-hidden="true"></i>
							</a>
							<?php } ?>
						</td>
						<td>
							<a href="?content=shop_category&action=update&id=<?php echo $shop_categorys[$i]['shop_category_id'];?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</a> 
						</td>
						<td>
							<a href="?content=shop_category&action=delete&id=<?php echo $shop_categorys[$i]['shop_category_id'];?>" onclick="return confirm('คุณต้องการลบประเภทร้านค้า : <?php echo $shop_categorys[$i]['shop_category_name']; ?> ใช่หรือไม่');" style="color:red;">
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



