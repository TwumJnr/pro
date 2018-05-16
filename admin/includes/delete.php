<?php
	$w= (isset($_GET['w']))?$_GET['w']: '';
	$id= $_GET['id'];
	$sql=$l='';
	
	switch($w){
		case 'min':
			$sql= "DELETE FROM ministry WHERE ministry_id= '$id'";
			$l= "min";
		break;
			
		case 'vid':
			$sql= "DELETE FROM video WHERE video_id= '$id'";
			$l= "vid";
		break;
		case 'quotes':
			$sql= "DELETE FROM quotes WHERE quote_id= '$id'";
			$l= "quotes";
		break;
			
		case 'activeCover':
			
			$sql_get= "SELECT * FROM cover_page WHERE cover_id='$id'";
			$result = $connect->query($sql_get);//query database
			if ($result->num_rows > 0) {//if there is more than one result
				$row = $result->fetch_assoc();
				$fileName= "../".$row["cover_bg"];
				if(!unlink($fileName)){
					header('location: ?l=moduserpage&&msg=2');
				}else{
					$sql= "DELETE FROM cover_page WHERE cover_id= '$id'";
				}
			}	
					$l= "moduserpage";
		break;
		case 'mem':
			$sql_get= "SELECT * FROM members WHERE mem_id='$id'";
			$result = $connect->query($sql_get);//query database
			if ($result->num_rows > 0) {//if there is more than one result
				$row = $result->fetch_assoc();
				
				$fileName= $row["pic"];
				if(!unlink($fileName)){
					header('location: ?l=mem&&msg=2');
				}else{
					$sql= "DELETE FROM members WHERE mem_id= '$id'";
				}
			}	
					$l= "mem";
		break;
	}
	if($connect->query($sql) === TRUE){
			header("location: ?l=$l&&msg=1");
		}else{
			header("location: ?l=$l&&msg=2");
		//echo "<section>".$sql."</section>";
		}
?>