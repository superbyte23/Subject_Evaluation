<?php
require_once '../config/connection.php';

class Grade extends Connection{

	public function __construct(connection $conn) {
		$this->conn = $conn->conn;
	}
	/**
	 * [add_grades description]
	 * @param [type] $request [description]
	 */
	public function add_grades($request)
	{
		
	}
	// /**
	//  * [submit_grade description]
	//  * @param  [type] $stud_subject_id [description]
	//  * @param  [type] $grade           [description]
	//  * @return [type]                  [description]
	//  */
	// public function submit_grade($student_id, $stud_subject_id, $grade)
	// {
	// 	try {
	// 		$check = $this->check_grade_exist($stud_subject_id);
	// 		if ($check == true) {
				
	// 			// Update Grade
	// 			$update = $this->update_grade($stud_subject_id, $grade);

	// 			if ($update) {
	// 				return "Successfully Updated";
	// 				die();
	// 			}
	// 		}else{
	// 			$stmt = $this->conn->prepare("INSERT INTO `grades`(`student_id`, `stud_subject_id`, `gwa`) VALUES (:student_id, :stud_subject_id, :grade)");
	// 			$stmt->bindParam(":stud_subject_id", $stud_subject_id);
	// 			$stmt->bindParam(":student_id", $student_id);
	// 			$stmt->bindParam(":grade", $grade);
	// 			$stmt->execute();
	// 			if ($stmt == true) {
	// 				return "Grade Successfully Submitted";
	// 			}
	// 		}
	// 	} catch (PDOException $e) {
	// 		echo $e->get_message();
	// 		die();
	// 	}
	// }
	public function submit_grade($student_id, $stud_subject_id, $grade, $cid, $course, $level, $semester)
	{
		try {
			$check = $this->check_grade_exist($student_id, $stud_subject_id);
			if ($check == true) {
				
				// Update Grade
				$update = $this->update_grade($stud_subject_id, $student_id, $grade);

				if ($update) {
					return "Successfully Updated";
					die();
				}
			}else{
				$stmt = $this->conn->prepare("
					INSERT INTO `grades`(`student_id`, `stud_subject_id`, `cid`, `course`, `level`, `semester`, `gwa`) 
					VALUES (:student_id, :stud_subject_id, :cid, :course, :level, :semester, :grade)");
				$stmt->bindParam(":stud_subject_id", $stud_subject_id);
				$stmt->bindParam(":student_id", $student_id);
				$stmt->bindParam(":cid", $cid);
				$stmt->bindParam(":course", $course);				
				$stmt->bindParam(":level", $level);
				$stmt->bindParam(":semester", $semester);
				$stmt->bindParam(":grade", $grade);
				$stmt->execute();
				if ($stmt == true) {
					return "Grade Successfully Submitted";
				}
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	/**
	 * [check_grade_exist // THIS FUNCTION IS USED IF ENROLLMENT IS ENABLED]
	 * @param  [type] $stud_subject_id [SUBJECTS OF STUDENT ACCORDING TO ENROLLMENT ID]
	 * @return [type]                  [description]
	 */
	public function check_grade_exist($student_id, $stud_subject_id)
	{
		try {

			$stmt = $this->conn->prepare("SELECT * FROM `grades` WHERE `student_id` = :student_id AND `stud_subject_id` = :stud_subject_id AND `gwa` <> ''");
			$stmt->bindParam(":stud_subject_id", $stud_subject_id); 
			$stmt->bindParam(":student_id", $student_id); 
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				return true;
			}
			
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}

	public function update_grade($stud_subject_id, $student_id, $grade)
	{
		try {

			$stmt = $this->conn->prepare("UPDATE `grades` SET `gwa`= :grade WHERE `stud_subject_id` = :stud_subject_id AND `student_id` = :student_id");
			$stmt->bindParam(":stud_subject_id", $stud_subject_id); 
			$stmt->bindParam(":student_id", $student_id); 
			$stmt->bindParam(":grade", $grade);
			$stmt->execute();
			
			return $stmt;
			
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	public function submitted_grades($student_id, $cid, $course, $level, $semester)
	{
		try {

			$stmt = $this->conn->prepare("
				SELECT
				    `prospectus`.`id` AS 'pid',
				    `subject`.*,
				    `grades`.`stud_subject_id`,
				    `grades`.`gwa`
				FROM
				    `grades`
				LEFT JOIN `prospectus` ON `grades`.`stud_subject_id` = `prospectus`.`id`
				LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
				WHERE
				    `student_id` = :student_id AND `cid` = :cid AND `course` = :course AND `level` = :level AND `grades`.`semester` = :semester
				"); 
			$stmt->bindParam(":student_id", $student_id);
			$stmt->bindParam(":cid", $cid);
			$stmt->bindParam(":course", $course);				
			$stmt->bindParam(":level", $level);
			$stmt->bindParam(":semester", $semester); 
			$stmt->execute(); 
			return $stmt;
			
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}
	public function for_submit($stdid,$cid,$level,$semester, $pid) 
	{
		try {
			 $q = substr($pid, 1);
			$stmt = $this->conn->prepare("
				SELECT `prospectus`.`id` AS 'pid', `subject`.*, NULL as 'gwa' FROM `prospectus` 
				LEFT JOIN `curriculum_level` ON `prospectus`.`curriculum_level_id` = `curriculum_level`.`id`
				LEFT JOIN `curriculum` ON `curriculum_level`.`curriculum_id` = `curriculum`.`id`
				LEFT JOIN `grades` ON `prospectus`.`id` = `grades`.`stud_subject_id`
				LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
				WHERE `curriculum`.`id` = :cid AND `curriculum_level`.`year_level` = :level AND `prospectus`.`semester` = :semester 
				AND `prospectus`.`id` NOT IN ($q)"); 
			$stmt->bindParam(':cid' , $cid);
			$stmt->bindParam(':level' , $level);
			$stmt->bindParam(':semester' , $semester); 
			// $stmt->bindParam(':stdid' , $stdid);
			$stmt->execute();			 
			return $stmt;			
			 
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}

	public function fresh_grades($stdid,$cid,$level,$semester)
	{
		try {
			$stmt = $this->conn->prepare("
				SELECT `prospectus`.`id` AS 'pid', `subject`.*, NULL as 'gwa' FROM `prospectus` 
				LEFT JOIN `curriculum_level` ON `prospectus`.`curriculum_level_id` = `curriculum_level`.`id`
				LEFT JOIN `curriculum` ON `curriculum_level`.`curriculum_id` = `curriculum`.`id`
				LEFT JOIN `grades` ON `prospectus`.`id` = `grades`.`stud_subject_id`
				LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
				WHERE `curriculum`.`id` = :cid AND `curriculum_level`.`year_level` = :level AND `prospectus`.`semester` = :semester 
				-- and ((`grades`.`student_id` = :stdid) OR (`prospectus`.`id` is null OR `grades`.`id` is null))"); 
			$stmt->bindParam(':cid' , $cid);
			$stmt->bindParam(':level' , $level);
			$stmt->bindParam(':semester' , $semester);
			// $stmt->bindParam(':stdid' , $stdid);
			$stmt->execute();			 
			return $stmt;			
			 
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}

	public function fresh_stud_grades()
	{
		try {
			$stmt = $this->conn->prepare("
				SELECT `prospectus`.`id` AS 'pid', `subject`.*, 'gwa' as `gwa` FROM `prospectus` 
				LEFT JOIN `curriculum_level` ON `prospectus`.`curriculum_level_id` = `curriculum_level`.`id`
				LEFT JOIN `curriculum` ON `curriculum_level`.`curriculum_id` = `curriculum`.`id`
				LEFT JOIN `grades` ON `prospectus`.`id` = `grades`.`stud_subject_id`
				RIGHT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
				WHERE `curriculum`.`id` = :cid AND `curriculum_level`.`year_level` = :level AND `prospectus`.`semester` = :semester 
				and ((`grades`.`student_id` = :stdid) OR (`prospectus`.`id` is null OR `grades`.`id` is null))"); 
			$stmt->bindParam(':cid' , $cid);
			$stmt->bindParam(':level' , $level);
			$stmt->bindParam(':semester' , $semester);
			$stmt->bindParam(':stdid' , $stdid);
			$stmt->execute();			 
			return $stmt;			
			 
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}

	public function failed_subjects($stdid)
	{
		try {
			$stmt = $this->conn->prepare("
				SELECT
					`prospectus`.`subject_id` as 'pid',
				    `grades`.`gwa`,
				    `subject`.`subject_title`,
				    `subject`.`subject_code`,
				    `subject`.`subject_desc`,
					`subject`.`units`, 
					`subject`.`prerequisite`,
					`prospectus`.`semester`  
				FROM
				    `grades`
				LEFT JOIN `student_subjects` ON `grades`.stud_subject_id = `student_subjects`.id
				LEFT JOIN `prospectus` ON `student_subjects`.subject_id = `prospectus`.id
				LEFT JOIN `subject` ON `prospectus`.subject_id = `subject`.id
				WHERE
				    `grades`.`gwa` < 75 AND
				    `grades`.`student_id` = :stdid
				");

			$stmt->bindParam(':stdid', $stdid);
			$stmt->execute();
			return $stmt;
		} catch (Exception $e) {
			return $e->get_message(); 
		}
	}

	public function finish_subjects($stdid)
	{
		try {
			$stmt = $this->conn->prepare("
				SELECT 
				    `student_subjects`.`subject_id` as 'pid',
				    `subject`.*
				FROM
				    `grades`
				LEFT JOIN `student_subjects` ON `grades`.stud_subject_id = `student_subjects`.id
				LEFT JOIN `prospectus` ON `student_subjects`.subject_id = `prospectus`.id
				LEFT JOIN `subject` ON `prospectus`.subject_id = `subject`.id
				WHERE
				    `grades`.`gwa` >= 75 AND
				    `grades`.`student_id` = :stdid
				");

			$stmt->bindParam(':stdid', $stdid);
			$stmt->execute();
			return $stmt;
		} catch (Exception $e) {
			return $e->get_message(); 
		}
	}

	public function grades_summary_per_student($std)
	{
		try {
			$stmt = $this->conn->prepare("SELECT `subject`.`subject_code`, `subject`.`subject_title`, `subject`.`subject_desc`, `subject`.`units`, `subject`.`prerequisite`, `student_subjects`.`semester`, `grades`.`gwa` FROM `grades` LEFT JOIN `student_subjects` ON `grades`.`stud_subject_id` = `student_subjects`.id LEFT JOIN `prospectus` ON `student_subjects`.`subject_id` = `prospectus`.id LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id` WHERE `grades`.`student_id` = :std");
			$stmt->bindParam(':std', $std);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			return $e->get_message();
		}
	}

}