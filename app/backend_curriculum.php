<?php 

if (isset($_POST['courseid'])) {
	require_once '../Library/Curriculum.php'; 
   
    $list_curriculum_per_course = $curriculum->list_curriculum_per_course($_POST['courseid']);
    ?><option value="" selected>Select Curriculum Year</option><?php
    foreach ($list_curriculum_per_course as $cy) {
       echo "<option value=".$cy['id'].">".$cy['curriculum_title']."</option>";
    } 
}
