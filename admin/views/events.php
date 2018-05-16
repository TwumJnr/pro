<section id="eventSec">
<div class="container">
			<h2 class="text-center">Events</h2><hr id="usrPage_hr">
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
								<p><b>Error!!!</b></br>There was an issue uploading the file, please contact the <b>System's Administrator</b></p>
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
						<td colspan="2" class="text-center">
							<a class='btn btn-primary' data-toggle='modal' data-target='#addEvent' style="color: white;">Add Event</a>
						</td>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col">Event Details</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$count= 1;
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT * FROM events ORDER BY event_id DESC";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								//Read data in the file
								$fileName= "../".$row["event_details"];
								$file= fopen($fileName, 'r');
								$content= fread($file, 50);
								fclose($file);
								
								echo "
									<tr>
										<td>".$count++."</td>
										<td><img src='../".$row['event_details']."' width='30%'></td>
									</tr>";
							}//end while loop
							echo "
								<tr>
									<th colspan='2' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM events";
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
							echo '<tr><th colspan="2" scope="row" class="text-center">No records Available</th></tr>';
						}
						
					?>					
				</tbody>
			</table>
		</div>
	</section>
				<!-- Insert Modal -->
				<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
							  <h2 class="text-center">Add New event</h2><hr id="usrPage_hr">
								<form method="post"  enctype="multipart/form-data" action="?l=add_event_act">
									<div class='form-group'>
										<label for='event_details'>Event Details: </label>
										<input type='file' class='form-control' id='event_details' name="event_details" required>
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