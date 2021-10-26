<?php 

require_once '../Library/Prospectus.php'; 

if (isset($_POST['sub_id1'])) {
	$subject_id = $_POST['sub_id1'];
	$curriculum_level_id = $_POST['clevel'];
	$cid = $_POST['cid'];
	$add_result = $prospectus->prospectus_add("INSERT INTO `prospectus`(`curriculum_id`,`curriculum_level_id`, `subject_id`, `semester`) VALUES ('$cid','$curriculum_level_id', '$subject_id', 1)");
	if ($add_result) {
		$prospectus_list = $prospectus->list_prospectus($curriculum_level_id, 1);
 
		require 'list_table.php';
	}	
}elseif (isset($_POST['sub_id2'])) {
	$subject_id = $_POST['sub_id2'];
	$curriculum_level_id = $_POST['clevel'];
	$cid = $_POST['cid'];	
	$add_result = $prospectus->prospectus_add("INSERT INTO `prospectus`(`curriculum_id`,`curriculum_level_id`, `subject_id`, `semester`) VALUES ('$cid','$curriculum_level_id', '$subject_id', 2)");
	if ($add_result) {
		$prospectus_list = $prospectus->list_prospectus($curriculum_level_id, 2);
 
		require 'list_table.php';
	}	
}
?> 