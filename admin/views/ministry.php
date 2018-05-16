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
						<td colspan="3" class="text-center"><a class='btn btn-success' data-toggle='modal' data-target='#addMin' style="color: white;">Add Ministry</a></td>
					</tr>
					<tr>
						<th scope="col">Ministy Name</th>
						<!--th scope="col">Ministry Head</th-->
						<th scope="col">Members Count</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT ministry_id, ministry_name, no_of_mem FROM ministry";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								echo "
									<tr>
										<td>".$row["ministry_name"]."</td>
										<td>".$row["no_of_mem"]."</td>
										<td>
										<button class='btn btn-info' data-toggle='modal' data-target='#".$row["ministry_id"]."'>Modify</button>
										<a href='?l=del&&w=min&&id=".$row["ministry_id"]."' class='btn btn-danger'>Delete</a>
										</td>
									</tr>";
							}
							echo "
								<tr>
									<th colspan='3' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM ministry";
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
							echo '<tr><th colspan="3" scope="row" class="text-center">No records Available</th></tr>';
						}
						
					?>					
				</tbody>
			</table>
		</div>
	</section>
	<!-- Modal -->
	<?php
		$sql = "SELECT * FROM ministry";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				?>
				<div class="modal fade" id="<?php echo $row["ministry_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="modalTitle">Modify</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						
					<form method="post"  enctype="multipart/form-data" action="?l=mod_min_act&&view=min&&pid=<?php echo $row["ministry_id"]; ?>">
						<div class='form-group'>
							<label for='ministry_name' class='sr-only'>Ministry Name: </label>
							<input type='text' class='form-control' id='ministry_name' placeholder='Ministry Name' name="ministry_name" size='50' maxlength="50" value="<?php echo $row['ministry_name']; ?>" required>
						</div>
						<div class='form-group'>
							<label for='meet_day'>Meet Day: </label>
							<select name="meet_day" class="form-control">
								<option value="Sun">Sunday</option>
								<option value="Mon">Monday</option>
								<option value="Tue">Tuesday</option>
								<option value="Wed">Wednesday</option>
								<option value="Thu">Thursday</option>
								<option value="Fri">Friday</option>
								<option value="Sat">Saturday</option>
							</select>
						</div>
						<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Add Ministry</button>
					</form>
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
	?>			<!-- Add Ministry -->
				<div class="modal fade" id="addMin" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
							  <h2 class="text-center">Add New Ministry</h2><hr id="usrPage_hr">
		<form method="post"  enctype="multipart/form-data" action="?l=add_min_act">
			<div class='form-group'>
				<label for='ministry_name' class='sr-only'>Ministry Name: </label>
				<input type='text' class='form-control' id='ministry_name' placeholder='Ministry Name' name="ministry_name" size='50' maxlength="50" required>
			</div>
			<!--div class='form-group'>
				<label for='min_head' class='sr-only'>Head: </label>
				<input type='text' class='form-control' id='min_head' placeholder='Ministry Head' name="min_head" size='50' maxlength="50" required>
			</div-->
			<div class='form-group'>
				<label for='meet_day'>Meet Day: </label>
				<select name="meet_day" class="form-control">
					<option value="Sun">Sunday</option>
					<option value="Mon">Monday</option>
					<option value="Tue">Tuesday</option>
					<option value="Wed">Wednesday</option>
					<option value="Thu">Thursday</option>
					<option value="Fri">Friday</option>
					<option value="Sat">Saturday</option>
				</select>
			</div>
			<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Add Ministry</button>
		</form>
						  </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						  </div>
						</div>
					</div>
</div>