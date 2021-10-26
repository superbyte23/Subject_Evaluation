<?php 
require_once '../Library/Department.php'; 
if (isset($_GET['id'])) {
	if($departments->department_delete($_GET['id'])){
		header('location: departments.php');
	}
}