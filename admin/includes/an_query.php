<?php
	$act= (isset($_GET['act']))?$_GET['act']: 'insert';

	switch($act){
		case 'insert':
			if (isset($_POST['done'])) {
				$file= $_FILES['an'];
				$headline= mysqli_real_escape_string($connect, $_POST['headline']);

				$file_name= $_FILES['an']['name'];
				$file_tmp= $_FILES['an']['tmp_name'];
				$file_size= $_FILES['an']['size'];
				$file_error= $_FILES['an']['error'];
				$file_type= $_FILES['an']['type'];

				$file_ext=  explode('.', $file_name);
				$file_ext= strtolower(end($file_ext));

				$allowed= array('txt', 'pdf', 'docx');

				if (in_array($file_ext, $allowed)){
				/*if ($file_ext == $allowed)*/ 
					if ($file_error === 0){
						if ($file_size < 500000) {
							$new_file_name= rand(1,999).".".$file_ext;
							$destination= '../files/an/'.$new_file_name;
							$path= 'files/an/'.$new_file_name;
							if (move_uploaded_file($file_tmp, $destination)){
								
								$sql = "INSERT INTO announcement VALUES ('','$headline','$path', now())";//create sql query

								if($connect->query($sql) === TRUE){
									header('location: ?l=an&&msg=1');
								}else{
									header('location: ?l=an&&msg=2');
								}
							}else{
								header('location: ?l=an&&msg=3');
							}
						}else{
							header('location: ?l=an&&msg=4');
						}
					}else{
						header('location: ?l=an&&msg=5');
					}
				}else{
					header('location: ?l=an&&msg=7');
				}
			}
		break;
		case 'del':
			$id= $_GET['id'];
			$sql_get= "SELECT * FROM announcement WHERE a_id='$id'";
			$result_get = $connect->query($sql_get);//query database
			if ($result_get->num_rows > 0) {//if there is more than one result
				$row_get = $result_get->fetch_assoc();
				$fileName= "../".$row_get["file"];
				if(!unlink($fileName)){
					header("location: ?l=an&&msg=2");
				}else{
					$sql= "DELETE FROM announcement WHERE a_id='$id'";
					if($connect->query($sql) === TRUE){
						header('location: ?l=an&&msg=1');
					}else{
						header('location: ?l=an&&msg=2');
					}
				}
			}
		break;
	}
	
	
?>