<?php  
	session_start();

	require 'shared/pageloader.php';
	require 'shared/connect.php';
	// Check connection
	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	}
	if (!isset($_SESSION['admin'])){
		header("Location: login");
	}
	$cquery= "SELECT firstname FROM members WHERE email= '". $_SESSION['admin']."'";
	$cresult = $connect->query($cquery);
	$crow = $cresult->fetch_assoc();
	$_SESSION['username'] =  $crow['firstname'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!--metadata-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
		<!--favicon-->
		<link rel="shortcut icon" type="image/png" href="../img/favicon.png">
		
        <?php 
			include 'includes/style.php';
			echo "<title>$page_title</title>";
		?>
		
		<!--jquery-->
		<script src="js/jquery.js"></script>
    </head>
    <body id="page-top">
		
		<?php 
			include 'views/header.php';

			include $content;

			include 'views/footer.php'; 
		?>
		
		<!-- Scroll to Top Button-->
		<div class="scroll-top page-scroll hide">
			<a class="btn btn-primary page-scroll" href="#page-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>
		
        <?php include 'includes/script.php'; ?>
    </body>
	<?php $connect->close(); ?>
</html>