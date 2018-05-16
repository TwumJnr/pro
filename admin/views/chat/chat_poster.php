<?php
	include_once('../../shared/connect.php');

	if (isset($_POST['message'])){
		$text = strip_tags(stripslashes($_POST['message']));
				
		//echo "this is in text: ".$text;
		if(!empty($text)){
			$sql = "INSERT INTO chat VALUES ('','', '$text')";
			$connect->query($sql);
		}else{
			echo "Textbox is empty";
		}
	}
$sql = "SELECT `message` FROM `chat` ORDER BY `Id` DESC";
		$result = $connect->query($sql);

		while($row = $result->fetch_assoc())
		 echo $row['message']."\n";
?>