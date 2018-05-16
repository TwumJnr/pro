<?php
    $page= (isset($_GET['l']))?$_GET['l']: 'home';
	
    switch($page){
        case 'logout':
			$page_title= 'Logout';
			$content= 'includes/logout.php';
        break;
        case 'home':
            $page_title= 'Love Church- Admin';
            $content= 'views/home.php';
        break;
		case 'moduserpage':
			$page_title= 'Modify User Page';
            $content= 'views/usrPage.php';
		break;
		case 'events':
			$page_title= 'Love Church- Events';
            $content= 'views/events.php';
		break;
		case 'applycoverchanges':
			$page_title= '';
            $content= 'includes/insert.php';
		break;
		case 'modPrayerRequest':
			$page_title= '';
            $content= 'includes/modify.php';
		break;
		case 'delCover':
			$page_title= '';
            $content= 'includes/delete.php';
		break;
		case 'activeCover':
			$page_title= '';
            $content= 'includes/modify.php';
		break;
		case 'exp':
			$page_title= 'Love Church- Expenses';
			$content= 'views/exp.php';
		break;
		case 'tno':
			$page_title= 'Love Church- Tithes and Offerings';
			$content= 'views/tno.php';
		break;
		case 'an':
			$page_title= 'News and Announcements';
			$content= 'views/an.php';
		break;
		case 'an_query':
			$page_title= '';
            $content= 'includes/an_query.php';
		break;
		case 'mem':
			$page_title= 'Love Church- Members';
            $content= 'views/members.php';
		break;
		case 'add_mem_act':
			$page_title= 'Love Church- Add Member';
            $content= 'includes/insert.php';
		break;
		case 'add_event_act':
			$page_title= 'Love Church- Add Event';
            $content= 'includes/insert.php';
		break;
		case 'min':
			$page_title= 'Love Church- Ministries';
            $content= 'views/ministry.php';
		break;
		case 'add_tno_act':
			$page_title= 'Love Church- Add Tithe and Offering';
            $content= 'includes/insert.php';
		break;
		case 'add_min_act':
			$page_title= 'Love Church- Add Minstry';
            $content= 'includes/insert.php';
		break;
		case 'add_quote_act':
			$page_title= 'Love Church- Add Item';
            $content= 'includes/insert.php';
		break;
		case 'del':
			$page_title= 'Love Church- Delete Item';
            $content= 'includes/delete.php';
		break;
		case 'lead':
			$page_title= 'Love Church- Leaders';
            $content= 'views/leaders.php';
		break;
		case 'vid':
			$page_title= 'Love Church- Video Embed';
            $content= 'views/vid.php';
		break;
		case 'quotes':
			$page_title= 'Love Church- Quote';
            $content= 'views/quotes.php';
		break;
		case 'add_vid_act':
			$page_title= 'Love Church- Video Embed';
            $content= 'includes/insert.php';
		break;
		case 'add_lead_act':
			$page_title= 'Love Church- Add Leader';
			$content= 'includes/insert.php';
		break;
		case 'mod_lead_act':
			$page_title= 'Love Church- Add Leader';
			$content= 'includes/modify.php';
		break;
		case 'mod_event_act':
			$page_title= 'Love Church- Modify';
			$content= 'includes/modify.php';
		break;
		case 'mod_min_act':
			$page_title= 'Love Church- Add Leader';
			$content= 'includes/modify.php';
		break;
		case 'chat':
			$page_title= 'Love Church- Chat';
			$content= 'views/chat/chat.php';
		break;
	}
?>