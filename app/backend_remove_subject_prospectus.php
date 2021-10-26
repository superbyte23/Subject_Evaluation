<?php  
require_once '../Library/Prospectus.php';  
if (isset($_GET['pid'])) {
	$subpros_id = $_GET['pid'];
	$curriculum_level_id = $_GET['id'];
	$id = $_GET['cid'];
	$check = $prospectus->prospectus_add("DELETE FROM `prospectus` WHERE `id` = $subpros_id");
	if ($check) {
		
		header('location: prospectus_add.php?id='.$curriculum_level_id.'&cid='.$id);
	}
	
}
?>

