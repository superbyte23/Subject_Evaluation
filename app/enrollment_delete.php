<?php

if (isset($_GET['ACTION']) == 'delete') {
	require_once '../Library/Enrollment.php';
	$id = $_GET['ID'];
		$delete = $enrollment->delete_enrollment($id);
		if ($delete) {
			header('Location: enrollment.php?success');
		}else{
			header('Location: enrollment.php?error');
		}
}if (isset($_GET['ACTION']) == 'multiple') {
	require_once '../Library/Enrollment.php';
	$id = $_GET['ID'];
		$delete = $enrollment->delete_enrollment($id);
		if ($delete) {
			header('Location: enrollment.php?success');
		}else{
			header('Location: enrollment.php?error');
		}
}


?>