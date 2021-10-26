<?php 

require_once '../config/connection.php'; 
require_once '../Model/User.php';
$db = new Connection;
$users = new User($db);

$lists_users = $users->lists_users();

if (isset($_GET['id'])) {
	// $subject_info = $users->users_info($_GET['id']);
	
}