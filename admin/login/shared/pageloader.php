<?php
    $page= (isset($_GET['z']))?$_GET['z']: '';
	
    switch($page){
		case 'login':
			header("Location: index.php");
		break;
	}
?>