<section id="announcements">
            <div class="container">
				<h2 class="text-center">Announcements</h2><hr>
				<div class="row text-center">
				<?php
				$sql = "SELECT * FROM announcement ORDER BY a_id DESC";//create sql query      WHERE status='active'
											$result = $connect->query($sql);//query database
											if ($result->num_rows > 0) {//if there is more than one result
												while($row = $result->fetch_assoc()) {
													//Read data in the file
													$fileName= $row["file"];
													$file= fopen($fileName, 'r');
													$content= fread($file, 50);
													fclose($file);
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
													
												}
											}else{
												echo '<tr><th colspan="5" scope="row" class="text-center">No Announcements</th></tr>';
											}
										?>
						</div>
            </div>
</section>