<?PHP
session_start();
$user = $_SESSION['jrp_user'];
$page = $_REQUEST['content'];
// to change a session variable, just overwrite it

if($user[0][0] == ""){
	require_once("modules/login/views/index.inc.php"); 
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN PANEL</title>

    <!-- Bootstrap Core CSS -->
    <link href="../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Simple-Sidebar CSS -->
    <link href="../template/css/simple-sidebar.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link href="../template/css/style.css" rel="stylesheet">  

    <script src="../template/js/jquery.min.js"></script>
    <script src="../template/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="wrapper" class="toggled">
		<?php require_once('views/header.inc.php') ?>
		
		<!-- Sidebar -->
		<?php require_once('views/menu.inc.php') ?>
		<!-- /#sidebar-wrapper -->

		<!-- Page Content -->
		<div id="page-content-wrapper">
			<?php require_once("views/body.inc.php"); ?>
		</div>
		<!-- /#page-content-wrapper -->
	</div>
	<!-- /#wrapper -->
	<script>
		function menu_toggle(){
			$("#wrapper").toggleClass("toggled");
		}
	</script>
</body>
</html> 
<?PHP }?>




