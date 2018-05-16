        <div id="announcements">
            <div class="container">
				<h2 class="text-center">Announcements</h2><hr>
				<div class="row text-center">
				<?php
					$count=1;
				$sql = "SELECT * FROM announcement ORDER BY a_id DESC";//create sql query      WHERE status='active'
											$result = $connect->query($sql);//query database
											if ($result->num_rows > 0) {//if there is more than one result
												while($row = $result->fetch_assoc()) {
													//Read data in the file
													$fileName= $row["file"];
													$file= fopen($fileName, 'r');
													$content= fread($file, 50);
													fclose($file);
													$count++;
				?>
						  <div class="col-sm-4">
							<div class="card">
							  <div class="card-body">
								<h5 class="card-title" style='text-transform: capitalize'><?php echo $row["headline"]; ?></h5>
								<p class="card-text"><?php echo trim($content); ?></p>
								<a data-toggle='modal' data-target='#<?php echo $row["a_id"]; ?>' class="btn btn-primary" style="color: white;">Read All</a>
							  </div>
							</div>
						  </div>
							<?php
													if ($count>3){
														echo "<br><a href='?l=an_all' class='btn btn-secondary' style='float: right;'>See All</a>";
														break;
													}
												}
											}else{
												echo '<tr><th colspan="5" scope="row" class="text-center">No Announcements</th></tr>';
											}
										?>
						</div>
            </div>
        </div>
<!-- Modal -->
	<?php
		$sql = "SELECT * FROM announcement";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				//Read data in the file
				$fileName= $row["file"];
				$file= fopen($fileName, 'r');
				$content= fread($file, filesize($fileName));
				fclose($file);
				?>
				<div class="modal fade" id="<?php echo $row["a_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="modalTitle"><?php echo $row["headline"]; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body text-center">
						<?php 
							$lines= explode('\n', $content);
							foreach($lines as $newLine){
								echo $newLine . "<br>";
							}
							//echo $content; 
						?>
						<footer class="blockquote-footer" style="float: right;padding-right: 2rem;"><?php echo $row["date_added"]; ?></footer>
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
	