<?php 

require_once '../config/connection.php'; 
require_once '../Model/Curriculum.php';
$db = new Connection;
$curriculum = new Curriculum($db);

if (isset($_GET['course'])) {
	$curriculum_list = $curriculum->list_curriculum_per_course($_GET['course']);
}else{
	$curriculum_list = $curriculum->list_curriculum();
}

if (isset($_GET['id'])) {
	 $curriculum_info = $curriculum->curriculum_info($_GET['id']);
	  
}