<?php 
require_once '../Library/Course.php'; 
if (isset($_GET['id'])) {
	if($course->course_delete($_GET['id'])){
		header('location: courses.php');
	}
}