<?php 
require_once '../Library/curriculum.php'; 
if (isset($_GET['id'])) {
	if($curriculum->curriculum_delete($_GET['id'])){
		header('location: curriculum.php');
	}
}