<?php
    $page= (isset($_GET['l']))?$_GET['l']: 'home';
	
    switch($page){
        case 'home':
            $page_title= 'Love Church- Homepage';
            $content= 'views/home.php';
        break;
		case 'lead':
			$page_title= 'Love Church- Leaders';
            $content= 'views/lead.php';
		break;
		case 'an_all':
			$page_title= 'Love Church- All Announcements';
            $content= 'views/an_all.php';
		break;
		case 'contact_us':
			header("Location: contact_us/contact/index.html");
		break;
	}
?>