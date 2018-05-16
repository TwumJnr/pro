<section id='lead'>
	<div class="container">
		<div class="row">
			<?php
				$sql = "SELECT mem_id, portfolio, lead_id FROM leaders";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								
								$mem_id = $row['mem_id'];
								$sqlName = "SELECT firstname, lastname, othernames, pic FROM members WHERE mem_id= '$mem_id'";
								$resultName = $connect->query($sqlName);
								$rowName = $resultName->fetch_assoc();
								$Name = $rowName['lastname'].", ".$rowName['firstname']." ".$rowName['othernames'];
			?>
			<div class="card col-md-3 text-center">
			  <img class="card-img-top" src="admin/<?php echo $rowName['pic'];?>" alt="Card image cap">
			  <div class="card-body">
				<h5 class="card-title" style="text-transform: capitalize"><?php echo $Name; ?></h5>
				<p class="card-text"><?php echo $row['portfolio']; ?></p>
				<a data-toggle='modal' data-target='#<?php echo $row['lead_id']; ?>' class="btn btn-primary" style="color: white">See More</a>
			  </div>
			</div>
			<?php
							}//end while loop
						}//end if statement
			?>
		</div>
	</div>
</section>

	<!-- Details Modal -->
	<?php
		$sql = "SELECT * FROM leaders";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				$fileName= $row["about"];
				$file= fopen($fileName, 'r');
				$content= fread($file, filesize($fileName));
				fclose($file);
				?>
				<div class="modal fade" id="<?php echo $row["lead_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="modalTitle">Full Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body container text-center">
						  <?php
							$mem_id = $row["mem_id"];
							$sqlMem = "SELECT * FROM members WHERE mem_id= '$mem_id'";//create sql query      WHERE status='active'
							$resultMem = $connect->query($sqlMem);//query database
							$rowMem = $resultMem->fetch_assoc();
							
						  ?>
						  <img src="admin/<?php echo $rowMem["pic"]; ?>" width="20%" style="margin-bottom: 1rem;">
						  <p style="text-transform: capitalize;"><b><?php echo $rowMem["lastname"].", ".$rowMem["firstname"]." ".$rowMem["othernames"] ?></b></p>
						  
						  <?php 
								$lines= explode('\n', $content);
								foreach($lines as $newLine){
									echo "<p>". $newLine . "</p>";
								}
							?>
						  
						  <p><b>Contact: </b><?php echo $rowMem["tel"]; ?></p>
						  <p><b>Email: </b><?php echo $rowMem["email"]; ?></p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					  </div>
					</div>
				  </div>
				</div>
			<?php
			}
		}
	?>