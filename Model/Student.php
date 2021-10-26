<?php 

require_once '../config/connection.php'; 

class Students extends Connection{  
	 
	public function list_students(){ 
		$stmt = $this->conn->prepare("SELECT s.*, c.`course_title` FROM `students` as s LEFT JOIN course as c ON s.`course` = c.id");	 
		$stmt->execute();
		return $stmt;
	}
	
	public function student_add($request)
	{   
		 // `course`, `year` // :course,:year

		// print_r($request);
		// die();

		$stmt = $this->conn->prepare("INSERT INTO `students`(`first_name`, `last_name`, `middle_name`,`address`, `gender`, `dob`, `age`, `birth_place`, `religion`, `civil_status`, `nationality`, `mobile`, `email`,  `course`, `year`) 
			VALUES (:fname, :lname, :mname, :address, :gender, :bdate,  :age, :bplace, :religion, :civilstatus, :nationality, :mobile, :email, :course,:year)");
		$stmt->bindParam(':fname', $request['firstname']);	 
		$stmt->bindParam(':mname', $request['middlename']);	 
		$stmt->bindParam(':lname', $request['lastname']);			 
		$stmt->bindParam(':address', $request['address']); 
		$stmt->bindParam(':gender', $request['gender']); 
		$stmt->bindParam(':bdate', $request['bdate']);
		$stmt->bindParam(':age', $request['age']); 
		$stmt->bindParam(':bplace', $request['bplace']); 
		$stmt->bindParam(':religion', $request['religion']); 
		$stmt->bindParam(':civilstatus', $request['civilstatus']); 
		$stmt->bindParam(':nationality', $request['nationality']); 
		$stmt->bindParam(':mobile', $request['mobile']);
		$stmt->bindParam(':email', $request['email']);
		$stmt->bindParam(':course', $request['course']);
		$stmt->bindParam(':year', $request['year']);
		$stmt->execute();
		
		$lastid = $this->conn->lastInsertId(); 
		$result = $this->insert_student_details($lastid, $request);
		// $this->insert_student_requirements($lastid, $request);
		if ($result == 1) {
			return 1;
		}else{
			return 0;
		}	
			
	}

	public function student_info($id)
	{
		$stmt = $this->conn->prepare("
			SELECT `students`.*, `course`.`course_title` 
			FROM `students` 
			LEFT JOIN `course` ON `students`.`course` = `course`.`id` 
			WHERE `students`.`id` = $id");
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$student = $stmt->fetch(PDO::FETCH_ASSOC);
			return $student;
		}

	}

	public function student_update($request)
	{
		$stmt = $this->conn->prepare("UPDATE `students` SET `first_name`= :fname,`last_name`= :lname,`middle_name`=:mname,`address`=:address,`mobile`=:mobile,`email`=:email,`course`=:course,`year`=:year WHERE `id` = :id");
		$stmt->bindParam(':id', $request['studentid']);
		$stmt->bindParam(':fname', $request['firstname']);	 
		$stmt->bindParam(':mname', $request['middlename']);	 
		$stmt->bindParam(':lname', $request['lastname']);	 
		$stmt->bindParam(':address', $request['address']);	 
		$stmt->bindParam(':mobile', $request['mobile']);
		$stmt->bindParam(':email', $request['email']);
		$stmt->bindParam(':course', $request['course']);
		$stmt->bindParam(':year', $request['year']);
		$stmt->execute();
		return $stmt;
	}
	public function student_delete($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM `students` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		
		if ($stmt->execute()) {
			$this->student_delete_details("DELETE FROM `student_requirements` WHERE `student_id` = $id");
			$this->student_delete_details("DELETE FROM `student_details` WHERE `student_id` = $id");
		}
		return $stmt;
	}

	public function student_delete_details($sql)
	{
		$stmt = $this->conn->prepare($sql); 
		$stmt->execute();
		return $stmt;
	}
	// Insert Other Details
	public function insert_student_details($id, $request){
		// print_r($request);
		// die();
		$stmt = $this->conn->prepare("INSERT INTO `student_details`(`student_id`, `father`, `father_occuoation`, `mother`, `mother_occupation`, `guardian`, `guardian_addreess`, `other_person`, `other_person_address`) VALUES (:id, :father, :focc, :mother, :mocc, :guardian, :g_address, :other, :other_address)");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':father', $request['father']);
		$stmt->bindParam(':focc', $request['fatheroccupation']);
		$stmt->bindParam(':mother', $request['mother']);
		$stmt->bindParam(':mocc', $request['motheroccupation']);
		$stmt->bindParam(':guardian', $request['guardian']);
		$stmt->bindParam(':g_address', $request['guardianaddress']);
		$stmt->bindParam(':other', $request['other']);
		$stmt->bindParam(':other_address', $request['otherguardianaddress']);
		if ($stmt->execute()) {
			return 1;
		}else{
			return 0;
		} 

	}

	// Insert student requirements
	public function insert_student_requirements($id, $request){

		// required variable
		$form138 = empty($request['form138']) ? 0 : $request['form138'];
		$nso = empty($request['nso']) ? 0 : $request['nso']; 
		$baptismal = empty($request['baptismal']) ? 0 : $request['baptismal'];
		$tor = empty($request['cgc']) ? 0 : $request['cgc'];
		$entranceexam = empty($request['entranceexam']) ? 0 : $request['entranceexam']; 
		$marriagecontract = empty($request['marriagecontract']) ? 0 : $request['marriagecontract'];
		$tor = empty($request['tor']) ? 0 : $request['tor'];


		$stmt = $this->conn->prepare("INSERT INTO `student_requirements`(`student_id`, `form138`, `nso`, `baptismal`,`cgc`, `entrance_exam_result`, `marriage_certificate`, `transfer_of_records`) VALUES (:id, :form138, :nso, :baptismal, :cgc, :entranceexam, :marriagecontract, :tor)");
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':form138', $form138);
		$stmt->bindParam(':nso', $nso);
		$stmt->bindParam(':baptismal', $baptismal);
		$stmt->bindParam(':cgc', $request['cgc']);	
		$stmt->bindParam(':entranceexam', $entranceexam);
		$stmt->bindParam(':marriagecontract',$marriagecontract); 
		$stmt->bindParam(':tor', $tor);
		$stmt->execute();

		return $stmt;
		 
	}
	// tester function call function iside a function
	public function test(){
		$stmt = $this->conn->prepare("INSERT INTO `students` (`first_name`) VALUES ('TST')");
		$stmt->execute();

		$lastid = $this->conn->lastInsertId();

		$this->test2($lastid);
	}

	public function test2($id){
		$stmt = $this->conn->prepare("INSERT INTO `student_details`(`student_id`) VALUES ($id)");
		$stmt->execute(); 
	}

	

	public function student_details($id)
	{
		$stmt = $this->conn->prepare("
			SELECT 
				`students`.*, `student_details`.`student_id`, 
				`student_details`.`father`, 
				`student_details`.`father_occuoation`, 
				`student_details`.`mother`, 
				`student_details`.`mother_occupation`, 
				`student_details`.`guardian`, 
				`student_details`.`guardian_addreess`, 
				`student_details`.`other_person`, 
				`student_details`.`other_person_address` 
			FROM `students`
			LEFT JOIN `student_details` ON `students`.`id` = `student_details`.`student_id` 
			WHERE `students`.`id` = $id");
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$student = $stmt->fetch(PDO::FETCH_ASSOC);
			return $student;
		}
	}

	public function search_student($filter){
		$keyword = "%".$filter."%";
		$stmt = $this->conn->prepare("
			SELECT 
				`students`.`id`,
				`students`.`first_name`, 
				`students`.`last_name`, 
				`students`.`middle_name`, 
				`course`.`course_desc` as 'course_title', 
				`academic_year`.`name` as 'AY' 
			FROM `students`
			LEFT JOIN `course`
			ON `students`.`course` = `course`.id 
			LEFT JOIN `curriculum` ON `course`.id = `curriculum`.`course_id`
			LEFT JOIN `academic_year` ON `curriculum`.`academicyear` = `academic_year`.`id` 
			WHERE CONCAT(`students`.`first_name`, `students`.`last_name`, `students`.`middle_name`) 
			LIKE :filter OR `students`.`id` = :filterid");
		$stmt->bindParam(':filter', $keyword);
		$stmt->bindParam(':filterid', $filter);
		$stmt->execute();
		return $stmt;
	}

	public function search_student_course_level($course, $level){ 
		$stmt = $this->conn->prepare("SELECT s.*, c.`course_title` FROM `students` as s LEFT JOIN course as c ON s.`course` = c.id WHERE `course` = :course AND `year` = :level");
		$stmt->bindParam(':course', $course);
		$stmt->bindParam(':level', $level);
		if ($stmt->execute()) {
			return $stmt;
		}
	}
	public function student_curriculum_details($id){ 
		$stmt = $this->conn->prepare("
			SELECT 
				`students`.`id`, 
				`students`.`first_name`, 
				`students`.`last_name`, 
				`students`.`middle_name`, 
				`students`.`year`, 
				`course`.`course_desc` AS 'course_title', 
				`course`.`id` AS 'courseid', 
				`academic_year`.`name` AS 'AY',
				`academic_year`.`id` AS `academic_year_id`,
				`curriculum`.`id` AS 'cid',
				`curriculum_level`.`id` as 'curlvl_id'
			FROM `students`
			LEFT JOIN `course` ON `students`.`course` = `course`.`id`
			LEFT JOIN `curriculum` ON `course`.`id` = `curriculum`.`course_id` 
			LEFT JOIN `academic_year` ON `curriculum`.`academicyear` = `academic_year`.`id` 
			LEFT JOIN `curriculum_level` ON `curriculum`.`id` = `curriculum_level`.`curriculum_id`
			WHERE `curriculum_level`.`year_level` = `students`.year 
				AND `students`.`id` = :id"); 
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt;
	}

}


