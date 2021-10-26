<?php

require_once '../config/connection.php';

class Enrollment extends Connection
{
	/**
	 * [list_enrolled description]
	 * @return [type] [description]
	 */
	public function list_enrolled()
	{
		try { 		
			$stmt = $this->conn->prepare("
				SELECT
				    `enrollment`.`id`,
				    `enrollment`.`student_id`,
				    CONCAT(
				        `students`.last_name,
				        ' ',
				        `students`.first_name,
				        ' ',
				        `students`.middle_name
				    ) AS 'Name',
				    `students`.id AS 'studentid',
				    `enrollment`.`course_id`,
				    `course`.`course_title`,
				    `enrollment`.`level_id`,
				    `year_level`.`level`,
				    `enrollment`.`semester`,
				    `enrollment`.`academic_year_id`,
				    `enrollment`.`status`
				FROM
				    `enrollment`
				LEFT JOIN `students` ON `enrollment`.`student_id` = `students`.`id`
				LEFT JOIN `course` ON `enrollment`.`course_id` = `course`.`id`
				LEFT JOIN `year_level` ON `enrollment`.`level_id` = `year_level`.`id` 
			");
			$stmt->execute();
			if ($stmt->rowCount() > 0) {				
				return $stmt;
			}else{
				return [];
			}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
			die();
		 }

	}

	public function list_enrolled_wildcard($wildcard)
	{
		try { 		
			$filter = "%".$wildcard."%";
			$stmt = $this->conn->prepare("
				SELECT
				    `enrollment`.`id`,
				    `enrollment`.`student_id`,
				    CONCAT(
				        `students`.last_name,
				        ' ',
				        `students`.first_name,
				        ' ',
				        `students`.middle_name
				    ) AS 'Name',
				    `students`.id AS 'studentid',
				    `enrollment`.`course_id`,
				    `course`.`course_title`,
				    `enrollment`.`level_id`,
				    `year_level`.`level`,
				    `enrollment`.`semester`,
				    `enrollment`.`academic_year_id`,
				    `enrollment`.`status`
				FROM
				    `enrollment`
				LEFT JOIN `students` ON `enrollment`.`student_id` = `students`.`id`
				LEFT JOIN `course` ON `enrollment`.`course_id` = `course`.`id`
				LEFT JOIN `year_level` ON `enrollment`.`level_id` = `year_level`.`id` 
				WHERE 'NAME' LIKE :wildcard OR `enrollment`.`id` LIKE :wildcard
			");
			$stmt->bindParam(':wildcard', $filter);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {				
				return $stmt;
			}else{
				return [];
			}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
			die();
		 }

	}

	/**
	 * [enroll_student description]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	public function enroll_student($request)
	{
		if ($this->validate_enrollment($request['student_id'], $request['ay'], $request['semester']) <= 0) {
			$subjectsID = json_decode($request["sendSubject"]);
			try {
				$status= 1;			
				$stmt = $this->conn->prepare("INSERT INTO `enrollment`(`student_id`,`curriculum_id`,`course_id`, `level_id`, `semester`, `academic_year_id`, `status`) VALUES (:student_id, :curriculum_id, :course_id, :level_id, :semester, :academic_year_id, :status)");
				$stmt->bindParam(':student_id', $request['student_id']);
				// $stmt->bindParam(':curriculum_id', $request['curriculum_id']);
				$stmt->bindParam(':course_id', $request['course']);
				$stmt->bindParam(':level_id', $request['yearlevel']);
				$stmt->bindParam(':semester', $request['semester']);
				$stmt->bindParam(':academic_year_id', $request['ay']);
				$stmt->bindParam(':curriculum_id', $request['cy']);
				$stmt->bindParam(':status', $status);
				$result = $stmt->execute();
				if ($result == true) {
					if ($test = $this->insert_student_subjects(array_filter($subjectsID), $request['student_id'], $this->conn->lastInsertid())) {
						$result = array('result' => 'success', 'msg' => 'Successfully Enrolled');
						return json_encode($result, JSON_PRETTY_PRINT);
					}
				}else{
					return false;
				}
			 } catch (PDOException $e) {
			 	return $e->get_message();
				die();
			 }
		}else{
			$result = array('result' => 'error', 'msg' => 'Student is Already Enrolled');
			return json_encode($result, JSON_PRETTY_PRINT);

		}
		

	}
 	/**
 	 * [validate_enrollment description]
 	 * @param  [type] $Student      [description]
 	 * @param  [type] $AcademicYear [description]
 	 * @return [type]               [description]
 	 */
	public function validate_enrollment($Student, $AcademicYear, $semester){
		try {
			$stmt = $this->conn->prepare("SELECT * FROM `enrollment` WHERE `student_id` = :student AND `semester` = :semester AND `academic_year_id` = :academicyear");
			$stmt->bindParam(':student', $Student);
			$stmt->bindParam(':academicyear', $AcademicYear);
			$stmt->bindParam(':semester', $semester);
			$result = $stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
			
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	/**
	 * [insert_student_subjects description]
	 * @param  [type] $subjectsID   [description]
	 * @param  [type] $studentid    [description]
	 * @param  [type] $lastInsertid [description]
	 * @return [type]               [description]
	 */
	public function insert_student_subjects($subjectsID, $studentid, $curriculum_id, $course_id, $year_level, $semester, $academic_year){

		foreach ($subjectsID as $id) {
			$data[] = '('.$studentid.','.$id.','.$curriculum_id.','.$course_id.','.$year_level.','.$semester.','.$academic_year.')';
		}
		 $sql = "INSERT INTO `student_subjects`(`student_id`, `subject_id`, `curriculum_id`, `course_id`, `year_level`,`semester`, `academic_year`) VALUES ".implode(',', $data);
		
		try {
			$stmt = $this->conn->prepare($sql);
			if ($stmt->execute()) {
				return "Success";
			}
			else{
				
				return "Error";
			}
		} catch (PDOException $e) {
			return $e->get_message();
			die();
		}
	}
	// public function insert_student_subjects($subjectsID, $studentid, $lastInsertid){

	// 	foreach ($subjectsID as $id) {
	// 		$data[] = '('.$studentid.','.$id.','.$lastInsertid.')';
	// 	}
	// 	 $sql = "INSERT INTO `student_subjects`(`student_id`, `subject_id`, `enrollment_id`) VALUES ".implode(',', $data);
		
	// 	try {
	// 		$stmt = $this->conn->prepare($sql);
	// 		if ($stmt->execute()) {
	// 			return $stmt;
	// 		}
	// 	} catch (PDOException $e) {
	// 		echo $e->get_message();
	// 		die();
	// 	}
	// }
	/**
	 * [enrollment_details description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function enrollment_details($id){
		try {
			$stmt = $this->conn->prepare("
				SELECT
				    `enrollment`.`id` AS 'enrollment_id',
				    `enrollment`.`student_id`,
				    `enrollment`.`course_id`,
				    `enrollment`.`curriculum_id`,
				    `enrollment`.`level_id`,
				    `enrollment`.`semester`,
				    `enrollment`.`academic_year_id`,
				    `enrollment`.`status`,
				    `course`.*,
				    `curriculum`.*,
				    `students`.*,
				    `academic_year`.*,
				    `year_level`.*,
				    `semester`.*
				    
				FROM
				    `enrollment`
				LEFT JOIN `course` ON `enrollment`.`course_id` = `course`.`id`
				LEFT JOIN `curriculum` ON `enrollment`.`curriculum_id` = `curriculum`.`id`
				LEFT JOIN `students` ON `enrollment`.`student_id` = `students`.`id`
				LEFT JOIN `academic_year` ON `enrollment`.`academic_year_id` = `academic_year`.`id` 
				LEFT JOIN `year_level` ON `enrollment`.`level_id` = `year_level`.`id`
				LEFT JOIN `semester` ON `enrollment`.`semester` = `semester`.`id`
				WHERE
				    `enrollment`.`id` = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();  
			if ($stmt->rowCount() > 0) {
				return json_encode($stmt->fetch(PDO::FETCH_ASSOC));
			}

		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	/**
	 * [delete_enrollment description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete_enrollment($id)
	{
		try {
			$stmt = $this->conn->prepare("DELETE FROM `enrollment` WHERE `id` = :id");
			$stmt->bindParam(':id', $id);
			$result = $stmt->execute();
			if ($result) {
				$del = $this->delete_student_subejcts($id);
				return $del;
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	/**
	 * [delete_student_subejcts description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete_student_subejcts($id)
	{
		try {
			$stmt = $this->conn->prepare("DELETE FROM `student_subjects` WHERE `enrollment_id` = :id");
			$stmt->bindParam(':id', $id);
			$result = $stmt->execute();
			return $result;
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}

	/**
	 * [student_subjects description]
	 * @return [type] [description]
	 */
	public function student_subjects($id){
		try {
			$stmt = $this->conn->prepare('
				SELECT
				    `student_subjects`.*,
				    `subject`.`subject_code`,
				    `subject`.`subject_title`,
				    `subject`.`subject_desc`,
				    `subject`.`units`,
				    `subject`.`prerequisite`
				FROM
				    `student_subjects`
				LEFT JOIN `prospectus` ON `student_subjects`.`subject_id` = `prospectus`.`id`
				LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
				WHERE
				    `student_subjects`.`enrollment_id` = :id');
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			if ($stmt->rowCount()>0) {
				return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
			}else{
				print('No Data');
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	/**
	 * [search Query for Enrollment]
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	/* 
	This is inteded for enrollment system search query
	public function search_class($request)
	{
		try {
			$stmt = $this->conn->prepare('
				SELECT `enrollment`.`id`, `enrollment`.`student_id`, `students`.first_name, `students`.last_name, `students`.middle_name, `course`.course_title, `year_level`.level FROM `enrollment` LEFT JOIN `students` ON `enrollment`.`student_id` = `students`.id LEFT JOIN `course` ON `enrollment`.`course_id` = `course`.id LEFT JOIN `year_level` ON `enrollment`.`level_id` = `year_level`.id WHERE (`course_id` = :course) 
				AND (`level_id` = :level) 
				AND (`semester` = :semester) 
				AND (`academic_year_id` = :academic_year_id)');
			$stmt->bindParam(':course', $request['course']);
			$stmt->bindParam(':level', $request['year']);
			$stmt->bindParam(':semester', $request['semester']);
			$stmt->bindParam(':academic_year_id', $request['ay']);
			$stmt->execute();
			if ($stmt->rowCount()>0) {
				return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
			}else{
				print('No Data');
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	} */
	/**
	 * Search Query for Student Evaluatin
	 * @param  [type] $request [description]
	 * @return [type]          [description]
	 */
	public function search_class($request)
	{
		try {
			$stmt = $this->conn->prepare('
				SELECT
				    `students`.`id`,
				    `students`.`first_name`,
				    `students`.`last_name`,
				    `students`.`middle_name`,
				    `course`.`id` AS `courseid`,
				    `course`.`course_title`,
				    `year_level`.`level`,
				    `curriculum`.`id` as `cid`
				FROM
				    `students`
				LEFT JOIN `course` ON `students`.course = `course`.id
				LEFT JOIN `year_level` ON `students`.year = `year_level`.`id` 
				LEFT JOIN `curriculum` ON `course`.`id` = `curriculum`.`course_id`
WHERE `students`.`course` = :course AND `students`.`year` = :level
			');
			$stmt->bindParam(':course', $request['course']);
			$stmt->bindParam(':level', $request['year']);
			// $stmt->bindParam(':semester', $request['semester']);
			// $stmt->bindParam(':academic_year_id', $request['ay']);
			$stmt->execute();
			if ($stmt->rowCount()>0) {
				return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
			}else{
				print('No Data');
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}


	public function search_all()
	{
		try {
			$stmt = $this->conn->prepare('
				SELECT
				    `students`.`id`,
				    `students`.`first_name`,
				    `students`.`last_name`,
				    `students`.`middle_name`,
				    `course`.`id` AS `courseid`,
				    `course`.`course_title`,
				    `year_level`.`level`,
				    `curriculum`.`id` as `cid`
				FROM
				    `students`
				LEFT JOIN `course` ON `students`.course = `course`.id
				LEFT JOIN `year_level` ON `students`.year = `year_level`.`id` 
				LEFT JOIN `curriculum` ON `course`.`id` = `curriculum`.`course_id`
				-- WHERE `students`.`course` = :course AND `students`.`year` = :level
			');
			// $stmt->bindParam(':course', $request['course']);
			// $stmt->bindParam(':level', $request['year']);
			// $stmt->bindParam(':semester', $request['semester']);
			// $stmt->bindParam(':academic_year_id', $request['ay']);
			$stmt->execute();
			if ($stmt->rowCount()>0) {
				// return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
				return $stmt;
			}else{
				print('No Data');
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}


}