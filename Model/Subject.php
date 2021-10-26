<?php 

require_once '../config/connection.php'; 

class Subject extends Connection{  
	 
	public function list_subject()
	{ 
		$stmt = $this->conn->prepare("SELECT * FROM `subject`");		
		if ($stmt->execute()) {
		 	return $stmt;
		}else{
			return false;
		}
	}

	// SELECT `prospectus`.`id` as 'pid', `subject`.*, grades.gwa FROM prospectus LEFT JOIN curriculum_level ON prospectus.curriculum_level_id = curriculum_level.id LEFT JOIN curriculum ON curriculum_level.curriculum_id = curriculum.id LEFT JOIN grades ON prospectus.id = grades.stud_subject_id LEFT JOIN subject ON prospectus.subject_id = subject.id WHERE `curriculum`.`id` = 7 AND `curriculum_level`.`year_level` = 1 AND `prospectus`.`semester` = 1

	// Query fpor grades later
	public function list_subject_curriculum_level($cid,$level,$semester)
	{
		try {
			$stmt = $this->conn->prepare("
				SELECT
					`prospectus`.`id` as 'pid',
				    `subject`.*
				FROM
				    `subject`
				LEFT JOIN `prospectus` ON
				    `subject`.`id` = `prospectus`.`subject_id`
				LEFT JOIN `curriculum_level` ON `prospectus`.`curriculum_level_id` = `curriculum_level`.`id`
				LEFT JOIN `curriculum` ON `curriculum_level`.`curriculum_id` = `curriculum`.`id`
				WHERE `curriculum`.`id` = :cid AND `curriculum_level`.`year_level` = :level AND `prospectus`.`semester` = :semester
				"); 
			$stmt->bindParam(':cid' , $cid);
			$stmt->bindParam(':level' , $level);
			$stmt->bindParam(':semester' , $semester);
			$stmt->execute();			 
			return $stmt;			
			 
		} catch (PDOException $e) {
			
		}
	} 


	public function subject_add($request)
	{
		  try {
		  	 $data = json_decode($this->verify_code($request['code']));
		  	if ($data->status == 'error') {		  		
				return $data;
				die();
		  	}else{
		  		$stmt  = $this->conn->prepare("INSERT INTO `subject`(`subject_code`, `subject_title`, `subject_desc`, `units`, `prerequisite`) VALUES (:code, :subjectname, :description, :units, :prerequisite)");
			 	$stmt->bindParam(':code', $request['code']);
			 	$stmt->bindParam(':subjectname', $request['subjectname']);
			 	$stmt->bindParam(':description', $request['description']);
			 	$stmt->bindParam(':units', $request['units']);
			 	$stmt->bindParam(':prerequisite', $request['prerequisite']);
			 	if($stmt->execute()){
			 		return $stmt;
			 	}else{
			 		return false;
			 	}
		  	}
		 	
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function subject_info($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM `subject` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);	
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$subject = $stmt->fetch(PDO::FETCH_ASSOC);
			return $subject;
		}

	}
	public function subject_update($request)
	{

		 try {		  	  
	  		$stmt  = $this->conn->prepare("UPDATE `subject` SET `subject_code`=:code,`subject_title`= :subjectname,`subject_desc`=:description,`units`=:units,`prerequisite`=:prerequisite WHERE `id` = :id");
  			$stmt->bindParam(':id', $request['id']);
		 	$stmt->bindParam(':code', $request['code']);
		 	$stmt->bindParam(':subjectname', $request['subjectname']);
		 	$stmt->bindParam(':description', $request['description']);
		 	$stmt->bindParam(':units', $request['units']);
		 	$stmt->bindParam(':prerequisite', $request['prerequisite']);
		 	if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	} 
		 	
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function subject_delete($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM `subject` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt;
	}

	public function verify_code($code)
	{
		$stmt = $this->conn->prepare("SELECT * FROM `subject` WHERE `subject_code` LIKE '%$code%'"); 
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$data = '{
				"msg": "Theres a problem adding new subject. Course code already exist. Please try again",
				"status": "error"
			}';
			return $data;
		}else{
			return false;
		}
	}

	public function search_subject($code)
	{
		$filter = '%'.$code.'%';
		if ($code !== "") {
			$stmt = $this->conn->prepare("SELECT * FROM `subject` WHERE `subject_code` LIKE :filter"); 
			$stmt->bindParam(':filter', $filter);
			if ($stmt->execute()) {
			 	return $stmt;
			}else{
				return false;
			}
		}
	}
	public function validate_student_subject(){

	}
	public function add_student_subject($stid, $subid, $curlvl_id){
		try {
			$stmt = $this->conn->prepare("INSERT INTO `student_subjects`(`student_id`, `subject_id`, `curlvl_id`) VALUES (:stid, :subid, :curlvl_id)");
			$stmt->bindParam(':stid', $stid);
			$stmt->bindParam(':subid', $subid);
			$stmt->bindParam(':curlvl_id', $curlvl_id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			return false;
		}
	}

	// public function student_subject_lists($stid, $clvlid){
	// 	$stmt = $this->conn->prepare("SELECT ss.`id` as stsubid, ss.`student_id`, ss.`subject_id`, ss.`curlvl_id`, s.* FROM `student_subjects` ss LEFT JOIN `subject` s ON ss.`subject_id` = s.`id` WHERE ss.`student_id` = :stid AND ss.`curlvl_id` = :clvlid");
	// 	$stmt->bindParam(':stid', $stid);
	// 	$stmt->bindParam(':clvlid', $clvlid);
	// 	$stmt->execute();
	// 	return $stmt;
	// }
	

	// public function student_subjects($enrollid){
	
	// }
	public function student_subjects($student_id, $course_id, $level, $curriculum_id, $semester){

		$stmt = $this->conn->prepare("
			SELECT
			    `student_subjects`.`id`,
			    `student_subjects`.`subject_id`,
			    `subject`.`subject_code`,
			    `subject`.`prerequisite`,
			    `subject`.`subject_title`,
			    `subject`.`units`,
			    `grades`.`gwa`
			FROM
			    `student_subjects`
			LEFT JOIN `prospectus` ON `student_subjects`.`subject_id` = `prospectus`.`id`
			LEFT JOIN `subject` ON `prospectus`.`subject_id` = `subject`.`id`
			LEFT JOIN `grades` ON `student_subjects`.`id` = `grades`.`stud_subject_id`
			WHERE   `student_subjects`.`student_id` = :student_id
			AND `student_subjects`.`course_id` = :courseid
			AND  `student_subjects`.`year_level` =  :level
			AND  `student_subjects`.`semester` =  :semester
			AND  `student_subjects`.`curriculum_id` = :curriculum_id"); 
			$stmt->bindParam(':student_id', $student_id);
			$stmt->bindParam(':courseid', $course_id);
			$stmt->bindParam(':level', $level);
			$stmt->bindParam(':semester', $semester);
			$stmt->bindParam(':curriculum_id', $curriculum_id);
			$stmt->execute();
			return $stmt;
	}
	public function delete_student_subject($id){
		$stmt = $this->conn->prepare("DELETE FROM `student_subjects` WHERE `id` = :id");
		$stmt->bindParam(':id', $id); 
		$stmt->execute();
		return $stmt;
	}
}



