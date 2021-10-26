<?php 

if (isset($_POST['destroy'])) {
	require_once '../config/session.php';

	$session = new app_session;

	if($session->destroy_session() == true){	
		header('location: login.php');
	} 
}

?>