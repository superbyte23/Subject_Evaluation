<?php 
require_once '../Library/AcademicYear.php'; 
if (isset($_GET['id'])) {
	if($academicyear->academicyear_delete($_GET['id'])){
		header('location: academicyear.php');
	}
}