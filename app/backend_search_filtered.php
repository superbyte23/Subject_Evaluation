<?php
	if (isset($_POST['filter'])) {
		require_once '../Library/Enrollment.php';
		$data = $enrollment->search_class($_POST);
		echo $data;
	}else{
		echo "No Data Found";
	}
?>