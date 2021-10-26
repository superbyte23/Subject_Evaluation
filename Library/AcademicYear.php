<?php 

require_once '../config/connection.php'; 
require_once '../Model/AcademicYear.php';
$db = new Connection;
$academicyear = new AcademicYear($db);

$academic_list = $academicyear->list_academicyear();

if (isset($_GET['id'])) {
	 $academic_info = $academicyear->academicyear_info($_GET['id']);
	  
}