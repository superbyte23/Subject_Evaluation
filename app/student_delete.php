<?php 
require_once '../Library/Student.php'; 
if (isset($_GET['id'])) {
	if($students->student_delete($_GET['id'])){
		header('location: students.php');
	}
}