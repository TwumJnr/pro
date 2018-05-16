	<section>
		<div class="container">
			<h2 class="text-center">News and Announcements</h2><hr id="usrPage_hr">
			<!--h3 class="section-header">Cover Page</h3><hr-->
			<?php
				$msg= (isset($_GET['msg']))? $_GET['msg'] : 'msg is not set';
				switch($msg){
					case 1:
						echo "
							<div id='o_m' class='o_m_success'>
								<p>Changes have been made</p>
							</div>";
					break;
					case 2:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>Please contact the system's administrator!</p>
							</div>";
					break;
					case 3:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>There was an issue moving the file, please contact the <b>System's Administrator</b></p>
							</div>";
					break;
					case 4:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>The uploaded file is too big</p>
							</div>";
					break;
					case 5:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>There is a problem with the file, please try again or change the file</p>
							</div>";
					break;
					case 6:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b><br>Could not upload file, please try again.</p>
							</div>";
					break;
					case 7:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>A file with '.txt' extension is required!!</p>
							</div>";
					break;
				}
			?>
				
			<table class="table">
				<thead>
					<tr>
						<th colspan="4" scope="row" class="text-center">
							<a class='btn btn-success'  data-toggle='modal' data-target='#addAnn' style="color: white;">Add Announcement</a>
						</th>
					</tr>
					<tr>
						<th scope="col">Headline</th>
						<th scope="col">Announcement</th>
						<th scope="col">Date Added</th>
						<th scope="col">Operation</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT * FROM announcement ORDER BY a_id DESC";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								//Read data in the file
								$fileName= "../".$row["file"];
								$file= fopen($fileName, 'r');
								$content= fread($file, 50);
								fclose($file);
								echo "
									<tr>
										<td>".$row["headline"]."</td>
										<td>".trim($content)."...</td>
										<td>".$row["date_added"]."</td>
										<td>
										<button class='btn btn-primary' data-toggle='modal' data-target='#".$row["a_id"]."'>Read All</button>
										<a href='?l=an_query&&act=del&&id=".$row["a_id"]."' class='btn btn-danger'>Delete</a>
										</td>";
							}
							echo "
								<tr>
									<th colspan='4' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM announcement";
									$result1 = mysqli_query($connect,$sql1);
									$quantity = mysqli_num_rows($result1);
									$np = (ceil($quantity/$nrp));

									for($t=1;$t<=$np;$t++){
											if($t==$pn)
											  {
												  echo " $t ";
											  } else
											  {
												 echo "<a href='?p=$t'> $t</a> ";  
											  }
										}
									   echo "<br><br>page $pn of $np ";
							echo	"</th>
								  </tr>	  ";
						}else{
							echo '<tr><th colspan="4" scope="row" class="text-center">No records Available</th></tr>';
						}
						
					?>					
				</tbody>
			</table>
		</div>
	</section>
	<!-- Modal -->
	<?php
		$sql = "SELECT * FROM announcement";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				//Read data in the file
				$fileName= "../".$row["file"];
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
					  <div class="modal-body">
						<?php 
							$lines= explode('\n', $content);
							foreach($lines as $newLine){
								echo $newLine . "<br>";
							}
							//echo $content; 
						?>
						<footer class="blockquote-footer"><?php echo $row["date_added"]; ?></footer>
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
	<!-- Add Announcement modal -->
				<div class="modal fade" id="addAnn" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="modalTitle">Full Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						  <div class="container text-center">
							  <form method="post"  enctype="multipart/form-data" action="?l=an_query&&act=insert">
				<div class='form-group'>
					<label for='headline' class='sr-only'>Headline: </label>
					<input type="text" class='form-control' id='headline' placeholder='Announcement Headline' name="headline" required>
				</div>
				<div class='form-group'>
					<label for='an' class='sr-only'>Header Caption: </label>
					<input type='file' class='form-control' id='an' placeholder='Select file' name="an" required>
				</div>
				<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Done</button>
			</form>
					  		</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
</div>