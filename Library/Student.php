<?php 

require_once '../config/connection.php'; 
require_once '../Model/Student.php';
$db = new Connection;
$students = new Students($db);

if (isset($_GET['course']) && isset($_GET['level'])) {
	$student_list = $students->search_student_course_level($_GET['course'], $_GET['level']);
}else{
	$student_list = $students->list_students();
}


if (isset($_GET['id'])) {
	$student_info = $students->student_info($_GET['id']);
	
}