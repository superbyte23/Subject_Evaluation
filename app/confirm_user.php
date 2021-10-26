<?php 
if (isset($_GET['id'])) {
	
	try {
		require_once "../Library/User.php";
		if ($users->user_confirmation($_GET['id'])) {
			header('location: accounts.php');
		}else{
			header('location: accounts.php');
		}
	} catch (Exception $e) {
		
	}
}elseif (isset($_POST['adminPassword'])) {
	try {
		require_once "../Library/User.php";
		if ($users->admin_authentication($_POST['adminPassword']) == true) {
			echo true;
		}else{
			echo false;
		}
	} catch (Exception $e) {
		
	}
}

?>