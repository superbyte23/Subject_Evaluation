<?php 

	if (isset($_GET['id'])) {
		require_once '../Library/User.php';
		$id = $_GET['id'];
		if ($users->destroy_user($id)) {
			header('location: accounts.php?status=success');
		}else{
			header('location: accounts.php?status=error');
		}
	}
?>