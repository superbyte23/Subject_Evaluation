<?php 
require_once '../config/connection.php'; 
require_once '../Model/Prospectus.php';
$db = new Connection;
$prospectus = new Prospectus($db);

if (isset($_GET['id'])) {
	$prospectus_list = $prospectus->list_prospectus($_GET['id'], 1);
	$prospectus_list2 = $prospectus->list_prospectus($_GET['id'], 2);
}else{
	// header('location: 404.html');
}
 
