
			<section id="pRequests" class="pRequests">
			<div class="container">
				<h2 class="section-header">Prayer Requests</h2>
				<div class="section-wrapper" id="pReqPage">
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
							case 6:
								echo "
									<div id='o_m' class='o_m_error'>
										<p><b>Error!!!<br>Could not upload image, please try again.</p>
									</div>";
							default:
							break;
						}
					?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Date</th>
								<th scope="col" style="text-align: center">Request</th>
								<th scope="col">Status</th>
   								<th scope="col">Operation</th>
							</tr>
						</thead>
					  	<tbody>
					<?php
						require 'shared/connect.php';
						// Check connection
						if ($connect->connect_error) {
							die("Connection failed: " . $connect->connect_error);
						}
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;

						$sql = "SELECT req_id, request, date_added, sent_by, status FROM prayer_requests WHERE status= 'Pending' LIMIT $x,$nrp";
						$result = $connect->query($sql);
							
						if ($result->num_rows > 0) {
							$r=1;
							$quantity=mysqli_num_rows($result);
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo '
									<tr>
									  <th scope="row">'.$row["req_id"].'</th>
									  <td>'.$row["sent_by"].'</td>
									  <td>'.$row["date_added"].'</td>
									  <td style="text-align: center">'.$row["request"].'</td>
									  <td>'.$row["status"].'</td>
		 							  <td><!--a class="btn btn-warning" href="Edit.php?pid=$pid&&pn=$pn">Edit</a>|--><a class="btn btn-danger" href="?l=modPrayerRequest&&pid='.$row['req_id'].'&&pn='.$pn.'&&view=modPrayerRequest">Done</a></td>
									</tr>
								';
							}
							echo "
								<tr>
									<th colspan='9' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM prayer_requests WHERE status= 'Pending'";
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
						$connect->close();
							
						} else {
							echo "<tr><th colspan='9' scope='row' style='text-align: center'>There no pending Prayer Requests</th></tr>";
						}
					?>
					  </tbody>
					</table>
				</div>
			</div>
		</section>