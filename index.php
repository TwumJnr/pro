<?php
	require 'shared/pageloader.php';
	require 'shared/connect.php';
	// Check connection
	if ($connect->connect_error) {
		die("Connection failed: " . $connect->connect_error);
	}
?>

<!DOCTYPE html>
<html lang='en'>
	
    <head>
        <!--metadata-->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta http-equiv='x-ua-compatible' content='ie=edge'>
        
		<!--favicon-->
		<link rel='shortcut icon' type='image/png' href='img/favicon.png'>
		
       	<?php 
			include 'includes/style.php';
			echo "<title>$page_title</title>";
			$cover_sql= "SELECT * FROM cover_page WHERE status='Active'";
			$result = $connect->query($cover_sql);
			$row= $result->fetch_assoc();
		?>
		
		<!--DYNAMIC STYLES-->
		<style>
			#cover{
				background: #222 url('<?php echo $row['cover_bg'];?>') bottom center no-repeat fixed;
				background-size: cover;
			}
		</style>
		
		<!--jquery-->
		<script src='js/jquery.js'></script>
    </head>
	
    <body id='page-top'>
		<?php 
			include 'views/nav.php';
			include $content;
			include 'views/footer.php';
		?>
		
		<!--Prayer Request-->
		<div class='pReq pReqCollapse' style='bottom: -5.3rem; width: 20rem' id="pReqContainer">
			<button id='pReqBtn' type='button' class='btn btn-warning'>Prayer Request</button>
			<form method="post" name="send_request">
				<div class='form-group'>
				  	<label for='pReqName' class='sr-only'>Name:</label>
				  	<input type='text' class='form-control' id='pReqName' placeholder='Name' name="pReqName" style="height: 0px; width: 0px; padding: 0px;">
				</div>
				<div class='form-group'>
				  	<label for='request' class='sr-only'>Comment:</label>
				  	<textarea class='form-control' maxlength='255' id='request' name='request' placeholder='Prayer Request' style="height: 0px; width: 0px; padding: 0px;"></textarea>
				</div>
				<button type="button" class="btn btn-success" id="pReqSub" name="pReqSub" style="margin: 1rem 0.5rem; height: 0px; width: 0px; padding: 0px;">Submit</button>
			</form>
		</div>
		
		<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
		<div class='scroll-top page-scroll hide'>
			<a class='btn btn-primary page-scroll' href='#page-top'>
				<i class='fa fa-chevron-up'></i>
			</a>
		</div>
		
        <!--Script-->
		<?php include 'includes/script.php'; ?>
    </body>
	<?php $connect->close(); ?>
</html>