	<section>
		<div class="container">
			<h2 class="text-center">Members</h2><hr id="usrPage_hr">
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
								<p><b>Error!!!</b></br>A file with '.jpg' or '.jpeg' extension is required!!</p>
							</div>";
					break;
				}
			?>
			<table class="table">
				<thead>
					<tr>
						<td colspan="6" class="text-center">
							<a class='btn btn-success'  data-toggle='modal' data-target='#addMember' style="color: white;">Add Member</a>
						</td>
					</tr>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Full Name</th>
						<th scope="col">Date Of Birth</th>
						<th scope="col">Gender</th>
						<th scope="col">Phone</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT mem_id, lastname, firstname, othernames, dob, gender, tel, email FROM members ORDER BY lastname ASC";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							$count= 1;
							while($row = $result->fetch_assoc()) {
								echo "
									<tr>
										<th>".$count++."</th>
										<td style='text-transform: capitalize;'>".$row["lastname"].", ".$row["firstname"]." ".$row["othernames"]."</td>
										<td>".$row["dob"]."</td>
										<td>";if($row["gender"]== "m")
								  		  		echo "Male";
								  			  else
								  		  		echo "Female";
								echo "</td>
										<td>".$row["tel"]."</td>
										<td>
											<button class='btn btn-info' data-toggle='modal' data-target='#".$row["mem_id"]."'>Read All</button>
											<a href='?l=del&&w=mem&&id=".$row["mem_id"]."' class='btn btn-danger'>Delete</a>
										</td>
									</tr>";
							}
							echo "
								<tr>
									<th colspan='6' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM members";
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
							echo '<tr><th colspan="6" scope="row" class="text-center">No records Available</th></tr>';
						}
						
					?>					
				</tbody>
			</table>
		</div>
	</section>
	<!-- Modal -->
	<?php
		$sql = "SELECT * FROM members";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				?>
				<div class="modal fade" id="<?php echo $row["mem_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
							<img src="<?php echo $row["pic"]; ?>" width="20%" style="margin-bottom: 1rem;">
							  <p style="text-transform: capitalize;"><b>Full Name: </b><?php echo $row["lastname"].", ".$row["firstname"]." ".$row["othernames"] ?></p>
							  <p><b>Date of Birth: </b><?php echo $row["dob"]; ?></p>
							  <p><b>Gender: </b>
								  <?php if($row["gender"]== "m")
								  		  echo "Male";
								  		else
								  		  echo "Female";
								  ?>
							  </p>
							  <p>
								  <?php if($row["baptized"]== "y")
								  		  echo "Baptized";
								  		else
								  		  echo "Not Baptized";
								  ?>
							  </p>
							  <p><b>Contact: </b><?php echo $row["tel"]; ?></p>
							  <p><b>Email: </b><?php echo $row["email"]; ?></p>
							  <!--p><?php/* echo $row["min_id"]; */?></p-->
							  <p><b>Ministry: </b><?php
							$min_id= $row["min_id"];
							$sqlMin = "SELECT ministry_name FROM ministry WHERE ministry_id= '$min_id'";//create sql query      WHERE status='active'
							$resultMin = $connect->query($sqlMin);//query database
							$rowMin = $resultMin->fetch_assoc();
									echo $rowMin["ministry_name"];
						?></p>
						  </div>
						<!--footer class="blockquote-footer"><?php //echo $row["date_added"]; ?></footer-->
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
	?>			<!-- Add member modal -->
				<div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
			<h2 class="text-center">Add New Member</h2><hr id="usrPage_hr">
			<form method="post"  enctype="multipart/form-data" action="?l=add_mem_act">
				<div class='form-group'>
					<label for='mem_pic'>Picture: </label>
					<input type="file" class='form-control' id='mem_pic' name='mem_pic' required>
				</div>
				<div class='form-group'>
					<label for='lastname' class='sr-only'>Last Name: </label>
					<input type='text' class='form-control' id='lastname' placeholder='Last Name*' name="lastname" size='25' maxlength="25" required>
				</div>
				<div class='form-group'>
					<label for='firstname' class='sr-only'>First Name: </label>
					<input type='text' class='form-control' id='firstname' placeholder='First Name*' name="firstname" size='25' maxlength="25" required>
				</div>
				<div class='form-group'>
					<label for='othernames' class='sr-only'>Last Name: </label>
					<input type='text' class='form-control' id='othernames' placeholder='Other Names' name="othernames" size='25' maxlength="25">
				</div>
				<div class='form-group'>
					<label for='dob' class='sr-only'>Date of Birth: </label>
					<input type='date' class='form-control' id='dob' name="dob" required>
				</div>
				<div class='form-group' style="padding-left: 1rem;">
					<label for='gender'><b>Gender: </b></label><br>
					<input type='radio' id='gender' name="gender" value="m" checked>Male
					<input type='radio' id='gender' name="gender" value="f">Female
				</div>
				<div class='form-group' style="padding-left: 1rem;">
					<label for='baptism'><b>Baptised: </b></label><br>
					<input type='radio' id='baptism' name="baptism" value="y">Yes
					<input type='radio' id='baptism' name="baptism" value="n" checked>No
				</div>
				<div class='form-group'>
					<label for='tel' class='sr-only'>Telephone: </label>
					<input type='tel' class='form-control' title="Format: 0244123456" id='tel' placeholder='Telephone' name="tel" size='10' maxlength="10" minlength="10" pattern="[0-9]{10}" required>
				</div>
				<div class='form-group'>
					<label for='email' class='sr-only'>Email: </label>
					<input type='email' class='form-control' title="Email Address" id='email' placeholder='email@example.com' name="email" size='100' maxlength="100" required>
				</div>
						<?php
							$sql = "SELECT ministry_id, ministry_name FROM ministry";//create sql query      WHERE status='active'
							$result = $connect->query($sql);//query database
							if ($result->num_rows > 0) {//if there is more than one result
								echo "
									<div class='form-group'>
										<label for='ministry' class='sr-only'>Ministry: </label>
										<select name='ministry' class='form-control'>
									";
								while($row = $result->fetch_assoc()) {
									echo '<option value='.$row['ministry_id'].'>'.$row['ministry_name'].'</option>';
								}
								echo "
										</select>
									</div>";
							}
						?>
				
				<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Add Member</button>
			</form>
					  </div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
</div>