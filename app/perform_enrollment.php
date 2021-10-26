<?php 
print_r($_POST);
	if (isset($_POST['student_id'])) {
		require_once '../Library/Enrollment.php';
		// $result = $enrollment->enroll_student($_POST);	
		// 
		print_r($_POST);

		print("<br><br>");

		$subjectsID = $_POST["subjectsID"];


		$semester = $_POST["semester"];		
		$studentid = $_POST["student_id"];
		$courseid = $_POST["courseid"];
		$yearlevel = $_POST["yearlevel"];
		$cid = $_POST["cid"];
		$academic_year_id = $_POST["academic_year_id"];
		
		$result = $enrollment->insert_student_subjects(array_filter($subjectsID), $studentid, $cid, $courseid, $yearlevel, $semester, $academic_year_id);

		if ($result == "Success") {
			header('location: evaluation_dashboard.php?evaluation=success');
		}else{
			header('location: evaluation_dashboard.php?evaluation=error');
		}
	}
?>