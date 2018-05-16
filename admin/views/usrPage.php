	<section>
		<div class="container">
			<h2 class="text-center">Modify User Page</h2><hr id="usrPage_hr">
			<h3 class="section-header">Cover Page</h3><hr>
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
								<p><b>Error!!!</b></br>There was an issue moving the pictue, please contact the <b>System's Administrator</b></p>
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
								<p><b>Error!!!</b></br>There is a problem with the image, please try again or change the image</p>
							</div>";
					break;
					case 6:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b><br>Could not upload image, please try again.</p>
							</div>";
					break;
					case 7:
						echo "
							<div id='o_m' class='o_m_error'>
								<p><b>Error!!!</b></br>An image with 'jpg', 'jpeg' or 'png' extension is required!!</p>
							</div>";
					break;
				}
			?>
			<form method="post"  enctype="multipart/form-data" action="?l=applycoverchanges">
				<div class='form-group'>
					<label for='header_bg' class='sr-only'>Header Background: </label>
					<input type="file" class='form-control' id='header_bg' placeholder='Header Background Image' name="header_bg" required>
				</div>
				<div class='form-group'>
					<label for='header_caption' class='sr-only'>Header Caption: </label>
					<input type='text' class='form-control' id='header_caption' placeholder='Header Caption' name="header_caption" required>
				</div>
				<div class='form-group'>
					<label for='header_text' class='sr-only'>Header text: </label>
					<textarea class='form-control' maxlength='255' id='header_text' placeholder='Header text' name="header_text" style="resize: none;" required></textarea>
				</div>
				<button type="submit" class="btn btn-outline-success" name="done" id="doneBtn">Done</button>
			</form>
			<a href="?l=home#dashboard" class="btn btn-outline-warning" id="bth">Back to home</a>
			
			<h2 class="text-center" style="margin-top: 2rem;">History</h2><hr id="usrPage_hr">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Cover Caption</th>
						<th scope="col">Cover Text</th>
						<th scope="col">Cover Background Image</th>
						<th scope="col">Status</th>
						<th scope="col">Opearation</th>
					</tr>
				</thead>
				<tbody>	
					<?php
						$nrp = 10;//number of rows per page
						$pn = (isset($_GET['p']))? $_GET['p'] : 1;//check if the page number is set; if it is, assign the number to the variable pn else ph=1
						$x = ($pn-1)*$nrp;
					
						$sql = "SELECT * FROM cover_page";//create sql query      WHERE status='active'
						$result = $connect->query($sql);//query database
						if ($result->num_rows > 0) {//if there is more than one result
							while($row = $result->fetch_assoc()) {
								echo "
									<tr>
										<td>".$row["header_caption"]."</td>
										<td>".$row["header_text"]."</td>
										<td><img src='../".$row["cover_bg"]."' width='250px'></td>
										<td>".$row["status"]."</td>";
									if($row['status']==='Inactive'){
										echo "<td>
										<a class='btn btn-success' href='?l=activeCover&&pid=$row[cover_id]&&view=activeCover'>Make Active</a>
										<a class='btn btn-danger' href='?l=delCover&&id=".$row['cover_id']."&&w=activeCover'>Delete</a>
										</td>
											</tr>
										";
									}else{
										echo "<td><a class='btn btn-danger disabled' href='#'>In Use</a></td>
											</tr>
										";
									}
							}
							echo "
								<tr>
									<th colspan='5' scope='row' style='text-align: center'>";
									
									$sql1 = "SELECT * FROM cover_page";
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
							echo '<tr><th colspan="5" scope="row" class="text-center">No records Available</th></tr>';
						}
					?>					
				</tbody>
			</table>
		</div>
	</section>