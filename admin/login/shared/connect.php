<?php
	$user = "love_ch";
	$pass = "Pass1234";
	$db_name = "love_church";
	$host = "localhost";

	$connect = mysqli_connect("$host","$user","$pass","$db_name");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

?>