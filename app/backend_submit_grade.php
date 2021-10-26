<?php 
	if (isset($_POST['submit'])) {
		require_once '../Library/Grades.php';
		$score = $_POST['grade'];
		$stud_subject_id = $_POST['id'];
		$student_id = $_POST['student_id'];

		$courseid = $_POST['courseid'];
		$cid = $_POST['cid'];
		$semester = $_POST['semester'];
		$level = $_POST['level'];

		$add_grade = $grade->submit_grade($student_id, $stud_subject_id, $score, $cid, $courseid, $level, $semester);
		print($add_grade);
	}
?>