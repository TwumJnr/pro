<section>
<div class="container">
			<h2 class="text-center">Tithe and Offerings</h2><hr id="usrPage_hr">
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
						<td colspan="3" class="text-center"><a class='btn btn-success' data-toggle='modal' data-target='#addLeader' style="color: white;">Add</a></td>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col">Date</th>
						<th scope="col">Amount</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$count= 1;
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT * FROM tno ORDER BY tno_id DESC";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								echo "
									<tr>
										<td>".$count++."</td>
										<td>".$row["date"]."</td>
										<td><b>&#x20B5; </b>".$row['amount']."</td>
									</tr>";
							}
							echo "
								<tr>
									<th colspan='3' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM tno";
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
	<!-- Details Modal -->
	<?php
		$sql = "SELECT * FROM tno";//create sql query      WHERE status='active'
		$result = $connect->query($sql);//query database
		if ($result->num_rows > 0) {//if there is more than one result
			while($row = $result->fetch_assoc()) {
				?>
				<div class="modal fade" id="<?php echo $row["tno_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
						  <img src="<?php echo $rowMem["pic"]; ?>" width="20%" style="margin-bottom: 1rem;">
						  <p style="text-transform: capitalize;"><?php echo $rowMem["lastname"].", ".$rowMem["firstname"]." ".$rowMem["othernames"] ?></p>
						  
						  <?php 
								$lines= explode('\n', $content);
								foreach($lines as $newLine){
									echo "<p>". $newLine . "</p>";
								}
							?>
						  
						  <p><?php echo $rowMem["tel"]; ?></p>
						  <p><?php echo $rowMem["email"]; ?></p>
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
				<!-- Insert Modal -->
				<div class="modal fade" id="addLeader" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
							  <h2 class="text-center">Add Tithe and Offering</h2><hr id="usrPage_hr">
								<form method="post"  enctype="multipart/form-data" action="?l=add_tno_act">
									<div class='form-group'>
										<label for='date'>Date: </label>
										<input type='date' class='form-control' id='date' name="date" required>
									</div>
									<div class='form-group'>
										<label for='amount'>Amount: </label>
										<input type='number' class='form-control' id='amount' placeholder='Amount' name="amount" required>
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
					<!-- Edit Modal -->
				<?php
					$sql2 = "SELECT * FROM leaders";//create sql query      WHERE status='active'
					$result2 = $connect->query($sql2);//query database
					if ($result2->num_rows > 0) {//if there is more than one result
						while($row2 = $result2->fetch_assoc()) {
				?>
				<div class="modal fade" id="editLead<?php echo $row2["lead_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
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
							  <h2 class="text-center">Make Changes</h2><hr id="usrPage_hr">
								<form method="post"  enctype="multipart/form-data" action="?l=mod_lead_act&&view=lead&&pid=<?php echo $row2['lead_id']; ?>">
									<div class='form-group'>
										<label for='portfolio' class='sr-only'>Portfolio: </label>
										<input type='text' class='form-control' id='portfolio' placeholder='Portfolio' name="portfolio" size='50' maxlength="50" value="<?php echo $row2["portfolio"]; ?>" required>
									</div>
									<div class='form-group'>
										<label for='aboutLeader'>About Leader: </label>
										<input type='file' class='form-control' id='aboutLeader' placeholder='Select file' name="naboutLeader" >
										<input type='input' class='form-control' id='aboutLeader' placeholder='Select file' name="oaboutLeader" value="<?php echo $row2['about']; ?>" style="display: none" disabled>
									</div>
									<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Save</button>
								</form>
						  </div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						  </div>
						</div>
					</div>
				</div>
				<?php
						}//end while loop
					}//end if statement
				?>