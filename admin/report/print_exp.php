<?php

require_once('../../models/ReportModel.php');
$model = new ReportModel;
if(isset($_GET['var'])){
	$report = $model->getReportExp($_GET['var']);
}
date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("h");
$d5=date("i");
$d6=date("s");




$str = '
<link href="../../template/css/style.css" rel="stylesheet">  
<style>
table {
	border-collapse: collapse;
	font-family: "Kanit-Regular";
}
.row{
	font-family: "Kanit-Regular";//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
}
table, td, th {
    border: 1px solid black;
}
</style>

<div class="row">
	<div class="col-lg-12">
		<div>
			<h3 style="text-align: center;">รายงานสมาชิกใกล้หมดอายุ</h1>';

if(isset($_GET['var'])){
		$str .=	'<h4 style="text-align: center;">รายงานสมาชิกที่เหลืออายุ ต่ำกว่า'.$_GET['var'].' วัน</h2>';
			 } 
			 $str .=	'<h4 style="text-align: right;">'.date(" H:m:s d/m/Y").'</h4>
		</div>';
if(count($report)){
	$str .= '<table style="width:100%; text-align: center;" >
				<thead>
					<tr>
						<th>#</th>
						<th>รหัสสมาชิก</th>  
						<th>ชื่อ - นามสกุล</th>
						<th>วันหมดอายุ</th>
						<th>คงเหลือ</th>

					</tr>
				</thead>
				<tbody>';
				

					for($i=0; $i < count($report); $i++){
					$str .='<tr>'.
							'<td style="text-align: center;" >'.($i+1).'</td>'.
							'<td style="text-align: center;" >'.
								$report[$i]['member_code'].
							'</td>'.
							'<td style="text-align: center;" >'.
							iconv("utf-8", "utf-8",$report[$i]['member_firstname']." ".$report[$i]['member_lastname']).
							'</td>'.
							'<td style="text-align: center;"  >'.$report[$i]['date_expire'].'</td>'.
							'<td style="text-align: center;" >'.
								$report[$i]['exp']."  วัน".
							'</td>'.

						'</tr>';
						
					}
					
			$str .='	</tbody>
			</table>';
			 } else if(!isset($report)<=0) $str .= "ไม่พบข้อมูล"; 
$str .='
		</div>
	</div>
';

if($_GET['action'] == "PDF"){

	// echo $str;

	include("../../template/mpdf/mpdf.php");
	$mpdf=new mPDF('th', 'A4', '0', 'garuda');   
	
	$mpdf->mirrorMargins = true;
	
	$mpdf->SetDisplayMode('fullpage','two');
	//$str1 = convertImg($str);
	$mpdf->WriteHTML($str);
	
	$mpdf->Output('rp_exp'.$d1.'-'.$d2.'-'.$d3.' '.$d4.'-'.$d5.'-'.$d6.'.pdf','D');
	exit;

}
else if($_GET['action'] == "Excel"){
	header("Content-type: application/vnd.ms-excel");
	// header('Content-type: application/csv'); //*** CSV ***//
	
	header("Content-Disposition: attachment; filename=rp_exp $d1-$d2-$d3 $d4:$d5:$d6.xls");
	echo $str;
} else {
	echo $str;
	?>
	<script language="javascript">
	
		window.print();
	</script>
<?php 
}



?>

