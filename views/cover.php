		<?php
			require 'shared/connect.php';
			// Check connection
			if ($connect->connect_error) {
				die("Connection failed: " . $connect->connect_error);
			}
			$sql = "SELECT * FROM cover_page WHERE status='active'";//create sql query
			$result = $connect->query($sql);//query database
			$row= $result->fetch_assoc();//get values from database							
			
		?>

		<div id="cover" class="content-center">
			<div id="cover-caption" class="element-center">
				<div class="container">
					<div class="col-md-12">
						<h1 class="display-5"><?php echo $row['header_caption']; ?></h1>
						<p><?php echo $row['header_text']; ?></p>
					</div>
				</div>
			</div>
		</div>