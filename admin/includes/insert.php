<?php 
	$chr= "qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM0123456789asdfghjklqwertyuiopmnbvcxzASDFGHJKLMNZXCVBQWERTPOIUY";
	$chr= substr(str_shuffle($chr), 0, 10);

	if (isset($_POST['done'])) {
		$s= $_GET['l'];
		switch($s){
			case 'applycoverchanges':
				$pic= $_FILES['header_bg'];
				$header_caption= mysqli_real_escape_string($connect, $_POST['header_caption']);
				$header_text= mysqli_real_escape_string($connect, $_POST['header_text']);

				$pic_name= $_FILES['header_bg']['name'];
				$pic_tmp= $_FILES['header_bg']['tmp_name'];
				$pic_size= $_FILES['header_bg']['size'];
				$pic_error= $_FILES['header_bg']['error'];
				$pic_type= $_FILES['header_bg']['type'];

				$pic_ext=  explode('.', $pic_name);
				$pic_ext= strtolower(end($pic_ext));

				$allowed= array('jpg', 'jpeg', 'png');

				if (in_array($pic_ext, $allowed)) {
					if ($pic_error === 0){
						if ($pic_size < 5000000) {
							$new_pic_name= rand(1,999).".".$pic_ext;
							$destination= '../img/cover/'.$new_pic_name;
							$path= 'img/cover/'.$new_pic_name;
							if (move_uploaded_file($pic_tmp, $destination)){
								$sql= "SELECT * FROM cover_page";
								$result = $connect->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										$sql1 = "UPDATE cover_page SET status='Inactive' WHERE cover_id=".$row['cover_id'];
										$connect->query($sql1);
									}
								}
								$sql = "INSERT INTO cover_page VALUES ('','$header_caption','$header_text','$path','Active')";//create sql query

								if($connect->query($sql) === TRUE){
									header('location: ?l=moduserpage&&msg=1');
								}else{
									header('location: ?l=moduserpage&&msg=2');
								}
							}else{
								header('location: ?l=moduserpage&&msg=3');
							}
						}else{
							header('location: ?l=moduserpage&&msg=4');
						}
					}else{
						header('location: ?l=moduserpage&&msg=5');
					}
				}else{
					header('location: ?l=moduserpage&&msg=7');
				}
			break;
			
			//Add member action
			case 'add_mem_act':
				$pic= $_FILES['mem_pic'];
				$pic_name= $_FILES['mem_pic']['name'];
				$pic_tmp= $_FILES['mem_pic']['tmp_name'];
				$pic_size= $_FILES['mem_pic']['size'];
				$pic_error= $_FILES['mem_pic']['error'];
				$pic_type= $_FILES['mem_pic']['type'];
				
				$lastname= mysqli_real_escape_string($connect, $_POST['lastname']);
				$firstname= mysqli_real_escape_string($connect, $_POST['firstname']);
				$othernames= mysqli_real_escape_string($connect, $_POST['othernames']);
				$date= new DateTime($_POST['dob']);
				$dob= mysqli_real_escape_string($connect, $date->format('Y-m-d'));
				$gender= mysqli_real_escape_string($connect, $_POST['gender']);
				$baptism= mysqli_real_escape_string($connect, $_POST['baptism']);
				$tel= mysqli_real_escape_string($connect, $_POST['tel']);
				$email= mysqli_real_escape_string($connect, $_POST['email']);
				$ministry= mysqli_real_escape_string($connect, $_POST['ministry']);				
				

				$pic_ext=  explode('.', $pic_name);
				$pic_ext= strtolower(end($pic_ext));

				$allowed= array('jpg', 'jpeg');

				if (in_array($pic_ext, $allowed)) {
					if ($pic_error === 0){
						if ($pic_size < 5000000) {
							$new_pic_name= rand(1,999).".".$pic_ext;
							$path= 'img/user_p/'.$new_pic_name;
							if (move_uploaded_file($pic_tmp, $path)){
								$sqlz = "SELECT no_of_mem FROM ministry WHERE ministry_id='$ministry'";//create sql query
								$resultz= $connect->query($sqlz);
								$rowz= $resultz->fetch_assoc();
								$value =$rowz['no_of_mem'] + 1;
								
								$sqly = "UPDATE ministry SET no_of_mem= '$value' WHERE ministry_id='$ministry'";//create sql query
								
								if($connect->query($sqly) === TRUE){
									header('location: ?l=min&&msg=1');
								}else{
									header('location: ?l=min&&msg=2');
								}
																
								$sql = "INSERT INTO members VALUES ('$chr', '$path', '$lastname', '$firstname', '$othernames', '$dob', '$gender', '$baptism', '$tel', '$email', '$ministry')";//create sql query
								if($connect->query($sql) === TRUE){
									header('location: ?l=mem&&msg=1');
								}else{
									header('location: ?l=mem&&msg=2');
								}
							}else{
								header('location: ?l=mem&&msg=3');
							}
						}else{
							header('location: ?l=mem&&msg=4');
						}
					}else{
						header('location: ?l=mem&&msg=5');
					}
				}else{
					header('location: ?l=mem&&msg=7');
				}
			break;
				
			//add event action
			case 'add_event_act':
				$event_details= $_FILES['event_details'];
				$event_details_name= $_FILES['event_details']['name'];
				$event_details_tmp= $_FILES['event_details']['tmp_name'];
				$event_details_size= $_FILES['event_details']['size'];
				$event_details_error= $_FILES['event_details']['error'];
				$event_details_type= $_FILES['event_details']['type'];
				$event_details_ext=  explode('.', $event_details_name);
				$event_details_ext= strtolower(end($event_details_ext));
				
				
				$allowed= array('jpg', 'jpeg', 'png');

				if (in_array($event_details_ext, $allowed)) {
					if ($event_details_error === 0){
						if ($event_details_size < 5000000) {
							$new_event_details_name= rand(1,999).".".$event_details_ext;
							$destination= '../files/events/'.$new_event_details_name;
							$path= 'files/events/'.$new_event_details_name;
							if (move_uploaded_file($event_details_tmp, $destination)){
																
								$sql = "INSERT INTO events VALUES ('', '$path')";//create sql query
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
			break;
			
			//add ministry action
			case 'add_min_act':
				$ministry_name= mysqli_real_escape_string($connect, $_POST['ministry_name']);
				$meet_day= mysqli_real_escape_string($connect, $_POST['meet_day']);
								
				$sql = "INSERT INTO ministry VALUES ('$chr', '$meet_day','$ministry_name','')";//create sql query
				if($connect->query($sql) === TRUE){
					header('location: ?l=min&&msg=1');
				}else{
					header('location: ?l=min&&msg=2');
				}
			break;
			
			//add quote action
			case 'add_quote_act':
				$quoter= mysqli_real_escape_string($connect, $_POST['quoter']);
				$quote= mysqli_real_escape_string($connect, $_POST['quote']);
				
				$sqlz = "UPDATE quotes SET status= 'Down'";//create sql query
				$resultz= $connect->query($sqlz);
				
				$sql = "INSERT INTO quotes VALUES ('', '$quoter','$quote', 'Live')";//create sql query
				if($connect->query($sql) === TRUE){
					header('location: ?l=quotes&&msg=1');
				}else{
					header('location: ?l=quotes&&msg=2');
				}
			break;
				
			//add tno action
			case 'add_tno_act':
				$date= new DateTime($_POST['date']);
				$date1= mysqli_real_escape_string($connect, $date->format('Y-m-d'));
				$amount= mysqli_real_escape_string($connect, $_POST['amount']);
				
				$sql = "INSERT INTO tno VALUES ('', '$date1','$amount')";//create sql query
				if($connect->query($sql) === TRUE){
					header('location: ?l=tno&&msg=1');
				}else{
					header('location: ?l=tno&&msg=2');
				}
			break;
			
			//add video
			case 'add_vid_act':
				$title= mysqli_real_escape_string($connect, $_POST['vid_title']);
				$video= mysqli_real_escape_string($connect, $_POST['vid_id']);
				
				$sql1= "SELECT * FROM video";
				$result = $connect->query($sql1);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$sql1 = "UPDATE video SET status='past' WHERE video_id=".$row['video_id'];
						$connect->query($sql1);
					}
				}
				
				$sql = "INSERT INTO video VALUES ('', '$title','$video', 'Current')";//create sql query
				if($connect->query($sql) === TRUE){
					header('location: ?l=vid&&msg=1');
				}else{
					header('location: ?l=vid&&msg=2');
				}
			break;
				
			//add leader action
			case 'add_lead_act':
				$file= $_FILES['aboutLeader'];
				$file_name= $_FILES['aboutLeader']['name'];
				$file_tmp= $_FILES['aboutLeader']['tmp_name'];
				$file_size= $_FILES['aboutLeader']['size'];
				$file_error= $_FILES['aboutLeader']['error'];
				$file_type= $_FILES['aboutLeader']['type'];

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

								$sql = "INSERT INTO leaders VALUES ('', '$leader','$portfolio', '$path')";//create sql query
								$query1= "SELECT email, firstname FROM members WHERE mem_id='$leader'";
								$result1 = $connect->query($query1);
								$rowl =  $result1->fetch_assoc();
								$admin_email = $rowl['email'];
								$admin_pwd = password_hash($leader, PASSWORD_DEFAULT);
								$sql_admin = "INSERT INTO admin VALUES ('$chr', '$admin_email','$admin_pwd')";
								
								if($connect->query($sql_admin) === TRUE){
									//prepare message
									$lMsg= "Hey there ".$rowl["email"].",\n\tCongratulations on being a Leader in the Church. You now have Administrator rights on the Church's website among the many other you do.\n\nYour Username is: $admin_email\nYour Password is: $leader\n\nKindly keep them safe from unauthorised persons and use your rights sparringly...\n\nGod Richly bless you.";

									$lMsg= wordwrap($lMsg, 70);
									$to= $admin_email;
									$subject= "Leader Update";
									
									//send mail
									mail($to, $subject, $lMsg);
								}
																
								if($connect->query($sql) === TRUE){
									header('location: ?l=lead&&msg=1');
								}else{
									header('location: ?l=lead&&msg=2');
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
			break;
		}
	}
?>