	<section>
		<div class="container">
			<h2 class="text-center">Ministries</h2><hr id="usrPage_hr">
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
								<p><b>Error!!!</b></br>There was an issue uploading the picture, please contact the <b>System's Administrator</b></p>
							</div>";
					break;
					case 4:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>The uploaded picture is too big</p>
							</div>";
					break;
					case 5:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>There is a problem with the picture, please try again or change the file</p>
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
						<td colspan="4" class="text-center"><a class='btn btn-success' data-toggle='modal' data-target='#addVid' style="color: white;">Add Video</a></td>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col">Title</th>
						<th scope="col">Video</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$count= 1;
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT * FROM video ORDER BY video_id DESC";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								echo "
									<tr>
										<td>".$count++."</td>
										<td>".$row["title"]."</td>
										<td><a href='https://www.youtube.com/watch?v=".$row["video"]."' target='_blank'>https://www.youtube.com/watch?v=".$row['video']."</td>
										<td>".$row['status']."</td>
										<td>
										<a href='?l=del&&w=vid&&id=".$row["video_id"]."' class='btn btn-danger'>Delete</a>
										</td>
									</tr>";
							}
							echo "
								<tr>
									<th colspan='4' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM video";
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
				<!-- Add Video -->
				<div class="modal fade" id="addVid" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<!--h5 class="modal-title" id="modalTitle">Full Details</h5!-->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						  <div class="container text-center">
							  <h2 class="text-center">Add New Video</h2><hr id="usrPage_hr">
		<form method="post"  enctype="multipart/form-data" action="?l=add_vid_act">
			<div class='form-group'>
				<label for='vid_title' class='sr-only'>Video Title: </label>
				<input type='text' class='form-control' id='vid_title' placeholder='Video Title' name="vid_title" size='56' maxlength="56" required>
			</div>
			<div class='form-group'>
				<label for='vid_id' class='sr-only'>Video Id: </label>
				<input type='text' class='form-control' id='vid_id' placeholder='Video Id' name="vid_id" size='11' maxlength="11" pattern="[A-Za-z0-9]{11}" required>
			</div>
			<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Add Video</button>
		</form>
						  </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						  </div>
						</div>
					</div>