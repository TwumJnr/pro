<?php
if (isset($_POST['message'])){
	$message = $_POST['message'];
	if($message != ""){
		 $sql = "INSERT INTO `chat` VALUES('', '','$message')";
		 $connect->query($sql);
		}

	}//end if statement
		$sql = "SELECT `message` FROM `chat` ORDER BY `Id` DESC";
		$result = $connect->query($sql);

		while($row = $result->fetch_assoc())
		 echo $row['message']."\n";

?>