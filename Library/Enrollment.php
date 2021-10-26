<?php 

require_once '../config/connection.php'; 
require_once '../Model/Enrollment.php';
$db = new Connection;
$enrollment = new Enrollment($db);

$enrolled = $enrollment->list_enrolled();
// if (isset($_GET['enroll_id'])) {
// 	$student = $enrollment->enrollment_details($_GET['enroll_id']);
// 	$std = json_decode($student, 1);
// }

