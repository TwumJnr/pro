<?php 

	$view= (isset($_GET['view']))? $_GET['view'] : 'view is not set';
	$id= (isset($_GET['pid']))? $_GET['pid'] : 'id is not set';

	switch($view){
		case 'activeCover':
			$sql= "SELECT * FROM cover_page";
			$result = $connect->query($sql);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$sql1 = "UPDATE cover_page SET status='Inactive' WHERE cover_id=".$row['cover_id'];
					$connect->query($sql1);
				}
			}
			$sql = "UPDATE cover_page SET status='Active' WHERE cover_id= '$id'";
			if(($connect->query($sql))== true)
				header('location: ?l=moduserpage&&msg=1');	
			else
				header('location: ?l=moduserpage&&msg=2');
		break;
		case 'modPrayerRequest':
			$sql = "UPDATE prayer_requests SET status='Done' WHERE req_id= '$id'";
			if(($connect->query($sql))== true)
				header('location: ?l=home&&msg=1');
			else
				header('location: ?l=home&&msg=2');
		break;
			
		case 'events':
			if (isset($_POST['nevent_details'])=== TRUE){
				$ofileName= mysqli_real_escape_string($connect, $_POST['oevent_details']);
				if(!unlink($ofileName)){
					header('location: ?l=events&&msg=2');
				}else{
									
					$file= $_FILES['nevent_details'];
					$file_name= $_FILES['nevent_details']['name'];
					$file_tmp= $_FILES['nevent_details']['tmp_name'];
					$file_size= $_FILES['nevent_details']['size'];
					$file_error= $_FILES['nevent_details']['error'];
					$file_type= $_FILES['nevent_details']['type'];

					$file_ext=  explode('.', $file_name);
					$file_ext= strtolower(end($file_ext));

					$allowed= 'txt';


					if ($file_ext==$allowed){	

						if ($file_error === 0){
							if ($file_size < 5000000) {
								$new_file_name= rand(1,999).".".$file_ext;
								$destination= '../files/events/'.$new_file_name;
								$path= 'files/events/'.$new_file_name;
								if (move_uploaded_file($file_tmp, $destination)){

									$event_name= mysqli_real_escape_string($connect, $_POST['event_name']);
									$event_venue= mysqli_real_escape_string($connect, $_POST['event_venue']);
									$event_theme= mysqli_real_escape_string($connect, $_POST['event_theme']);
									$date= new DateTime($_POST['event_date']);
									$event_date= mysqli_real_escape_string($connect, $date->format('Y-m-d'));
									$added_by= mysqli_real_escape_string($connect, $_SESSION['admin']);
									
									$sql = "UPDATE events SET event_name='$event_name', event_venue= '$event_venue', event_theme='$event_theme', added_by='$added_by', event_date='$event_date', event_details='$path' WHERE event_id='$id'";//create sql query
									echo "<section>$sql</section>";break;
									if($connect->query($sql) === TRUE){
										header('location: ?l=events&&msg=1');
									}else{
										header('location: ?l=events&&msg=2');
									}
								}else{
									header('location: ?l=events&&msg=3');
								}
							}else{
								header('location: ?l=events&&msg=4');
							}
						}else{
							header('location: ?l=events&&msg=5');
						}
					}else{
						header('location: ?l=events&&msg=7');
					}
				}
			}else{
				$event_name= mysqli_real_escape_string($connect, $_POST['event_name']);
				$event_venue= mysqli_real_escape_string($connect, $_POST['event_venue']);
				$event_theme= mysqli_real_escape_string($connect, $_POST['event_theme']);
				$date= new DateTime($_POST['event_date']);
				$event_date= mysqli_real_escape_string($connect, $date->format('Y-m-d'));
				$added_by= mysqli_real_escape_string($connect, $_SESSION['admin']);

				$sql = "UPDATE events SET event_name='$event_name', event_venue= '$event_venue', event_theme='$event_theme', added_by='$added_by', event_date='$event_date' WHERE event_id='$id'";//create sql query
echo "<section>$sql</section>";break;
				if($connect->query($sql) === TRUE){
					header('location: ?l=events&&msg=1');
				}else{
					header('location: ?l=events&&msg=2');
				}
			}
		break;
			
		case 'lead':
			$sql2 = "SELECT * FROM leaders";//create sql query      WHERE status='active'
			$result2 = $connect->query($sql2);
			$row2 = $result2->fetch_assoc();
			if(isset($_FILES['naboutLeader'])== TRUE){
				$ofile= mysqli_real_escape_string($connect, $_POST['oaboutLeader']);
				$ofileName= "../".$ofile;
				if(!unlink($ofileName)){
					echo "<section>$ofileName</section>";break;
					header('location: ?l=lead&&msg=2&det=fileNotFound');
				}else{
									
					$file= $_FILES['naboutLeader'];
					$file_name= $_FILES['naboutLeader']['name'];
					$file_tmp= $_FILES['naboutLeader']['tmp_name'];
					$file_size= $_FILES['naboutLeader']['size'];
					$file_error= $_FILES['naboutLeader']['error'];
					$file_type= $_FILES['naboutLeader']['type'];

					$file_ext=  explode('.', $file_name);
					$file_ext= strtolower(end($file_ext));

					$allowed= 'txt';


					if ($file_ext==$allowed){	

						if ($file_error === 0){
							if ($file_size < 5000000) {
								$new_file_name= rand(1,999).".".$file_ext;
								$destination= '../files/about/'.$new_file_name;
								$path= 'files/about/'.$new_file_name;
								if (move_uploaded_file($file_tmp, $destination)){

									$leader= mysqli_real_escape_string($connect, $_POST['leaderName']);
									$portfolio= mysqli_real_escape_string($connect, $_POST['portfolio']);

									$sql = "UPDATE leaders SET mem_id='$leader', portfolio= '$portfolio', about='$path' WHERE lead_id='$id'";//create sql query

									if($connect->query($sql) === TRUE){
										header('location: ?l=lead&&msg=1');
									}else{
										header('location: ?l=lead&&msg=2&det=this one');
									}
								}else{
									header('location: ?l=lead&&msg=3');
								}
							}else{
								header('location: ?l=lead&&msg=4');
							}
						}else{
							header('location: ?l=lead&&msg=5');
						}
					}else{
						header('location: ?l=lead&&msg=7');
					}
				}
			}else{
				$leader= mysqli_real_escape_string($connect, $_POST['leaderName']);
				$portfolio= mysqli_real_escape_string($connect, $_POST['portfolio']);

				$sql = "UPDATE leaders SET mem_id='$leader', portfolio= '$portfolio' WHERE lead_id='$id'";//create sql query

				if($connect->query($sql) === TRUE){
					header('location: ?l=lead&&msg=1');
				}else{
					header('location: ?l=lead&&msg=2&det=or this one');
				}
			}
		break;
		case 'min':
			$min_name= mysqli_real_escape_string($connect, $_POST['ministry_name']);
			$meet_days= mysqli_real_escape_string($connect, $_POST['meet_day']);
			
			$sql = "UPDATE ministry SET ministry_name='$min_name', meet_day= '$meet_days'";//create sql query

			if($connect->query($sql) === TRUE){
				header('location: ?l=min&&msg=1');
			}else{
				header('location: ?l=min&&msg=2');
			}
		break;
	}
?>