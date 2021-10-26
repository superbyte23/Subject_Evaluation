<?php 

require_once '../config/connection.php'; 
require_once '../Model/Department.php';
$db = new Connection;
$departments = new Department($db);

$listOfDepartments = $departments->list_department();

if (isset($_GET['id'])) {
	 $department_info = $departments->department_info($_GET['id']);
	  
}