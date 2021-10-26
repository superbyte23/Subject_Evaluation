<?php 

require_once '../config/connection.php'; 
require_once '../Model/semester.php';
$db = new Connection;
$semester = new Semester($db);

$semester_list = $semester->semester_list();

 