<?php 
require_once '../Library/Subject.php'; 
if (isset($_GET['id'])) {
	if($subjects->subject_delete($_GET['id'])){
		header('location: subjects.php');
	}
}