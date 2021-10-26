<?php 

require_once '../config/connection.php'; 
require_once '../Model/Course.php';
$db = new Connection;
$course = new Course($db);

$listOfCourses = $course->list_course();

if (isset($_GET['id'])) {
	 $course_info = $course->course_info($_GET['id']);
	  
}