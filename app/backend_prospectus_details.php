<?php

if (isset($_POST['show'])) {
	require_once '../Library/Prospectus.php';

	$cid = $_POST['cid'];
	$clid = $_POST['clid'];

	$prospectus_subjects = json_encode($prospectus->prospectusSubjects_per_level($clid)->fetchAll(PDO::FETCH_ASSOC)); 

	print($prospectus_subjects);

}

?>