<?php 

require_once '../config/connection.php'; 

class Course extends Connection{  
	 
	public function list_course(){ 
		$stmt = $this->conn->prepare("
			SELECT `course`.`id`, `course`.`department_id`, `course`.`code`, `course`.`course_title`, `course`.`course_desc`, `department`.`department_name` 
			FROM `course`
			LEFT JOIN `department` ON `course`.`department_id` = `department`.`id`");		 
		$stmt->execute();
		return $stmt;
	}

	public function course_add($request)
	{
		$stmt = $this->conn->prepare("INSERT  INTO `course`(`department_id`, `code`, `course_title`, `course_desc`) VALUES (:department, :code, :name, :description)");
		$stmt->bindParam(':name', $request['coursename']);
		$stmt->bindParam(':code', $request['code']);
		$stmt->bindParam(':description', $request['description']);
		$stmt->bindParam(':department', $request['department']);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function course_info($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM `course` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$course = $stmt->fetch(PDO::FETCH_ASSOC);
			return $course;
		}
	}
	public function course_update($request)
	{
		$stmt = $this->conn->prepare("UPDATE `course` SET `department_id`= :department,`code`=:code,`course_title`=:name,`course_desc`=:description WHERE `id` = :id");
		$stmt->bindParam(':id', $request['courseid']);
		$stmt->bindParam(':department', $request['department']);
		$stmt->bindParam(':code', $request['code']);
		$stmt->bindParam(':name', $request['coursename']);
		$stmt->bindParam('description', $request['description']);
		$stmt->execute();
		return $stmt;
	}
	// public function course_delete($id)
	// {
	// 	$stmt = $this->conn->prepare("DELETE FROM `course` WHERE `id` = :id");
	// 	$stmt->bindParam(':id', $id);
	// 	$stmt->execute();
	// 	return $stmt;
	// }

	public function course_show_info($id){
		$stmt = $this->conn->prepare("
			SELECT `course`.`id`, `course`.`department_id`, `course`.`code`, `course`.`course_title`, `course`.`course_desc`, `department`.`department_name`, `department`.`department_head`, `department`.`description` 
			FROM `course` 
			LEFT JOIN `department` ON `course`.`department_id` = `department`.`id` WHERE `course`.`id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$course = $stmt->fetch(PDO::FETCH_ASSOC);
			return $course;
		}
	}
	
}



