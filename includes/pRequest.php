<?php
	$reqName= $_POST['pReqName'];
	$reqMsg= $_POST['request'];

	require '../shared/connect.php';


	$sql = "INSERT INTO prayer_requests(request, date_added, sent_by, status) VALUES ('$reqMsg', now(),'$reqName', 'Pending')";

	if ($connect->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $connect->error;
	}
?>