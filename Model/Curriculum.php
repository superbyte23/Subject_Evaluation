<?php 

require_once '../config/connection.php'; 

class Curriculum extends Connection{  
	 
	public function list_curriculum()
	{  
		try {
			$stmt = $this->conn->prepare("
				SELECT `curriculum`.`id`, `curriculum`.`curriculum_title`, `course`.`course_title`, `academic_year`.`name`, `curriculum`.`status` 
				FROM `curriculum` 
				LEFT JOIN `course` ON `curriculum`.`course_id` = `course`.`id` 
				LEFT JOIN `academic_year` ON `curriculum`.`academicyear` = `academic_year`.`id`");
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}

	public function list_curriculum_per_course($id)
	{  
		try {
			$stmt = $this->conn->prepare("
				SELECT `curriculum`.*, `academic_year`.`name`, `course`.`course_title`
				FROM `curriculum` 
				LEFT JOIN `academic_year` ON `curriculum`.`academicyear` = `academic_year`.`id` 
				LEFT JOIN `course` ON `curriculum`.`course_id` = `course`.`id` 
				WHERE `curriculum`.`course_id` = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}

	public function curriculum_add($request)
	{
		 try {
		 	$stmt = $this->conn->prepare("INSERT INTO `curriculum`(`curriculum_title`, `course_id`, `academicyear`, `status`) VALUES (:title, :course, :academicyear, :status)");
			$stmt->bindParam(':title', $request['title']);
			$stmt->bindParam(':course', $request['course']);
			$stmt->bindParam(':academicyear', $request['academicyear']);
			$stmt->bindParam(':status', $request['status']);
			$result = $stmt->execute();
			$lastid = $this->conn->lastInsertId(); 
			if ($result == true) {
				return $this->auto_add_level_curriclum($lastid);
			}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
			die();
		 }

	}
	public function curriculum_info($id)
	{

		try {
			$stmt = $this->conn->prepare("SELECT * FROM `curriculum` WHERE `id` = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	public function curriculum_update($request)
	{
		 
		try { 
		 	$stmt = $this->conn->prepare("UPDATE `curriculum` SET `curriculum_title`=:title ,`course_id`=:course,`academicyear`=:academicyear,`status`= :status WHERE `id`= :id");
		 	$stmt->bindParam(':id', $request['id']);
			$stmt->bindParam(':title', $request['title']);
			$stmt->bindParam(':course', $request['course']);
			$stmt->bindParam(':academicyear', $request['academicyear']);
			$stmt->bindParam(':status', $request['status']);
			$result = $stmt->execute();
			if ($result == true) {
				return $result;
			}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
			die();
		 }
	}
	public function curriculum_delete($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM `curriculum` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		if ($stmt == true) {
			return $this->delete_cur_level($id);
		}
	}
	public function delete_cur_level($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM `curriculum_level` WHERE `curriculum_id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt;
	}
	public function delete_prospectus_per_curriculum()
	{
		
	}
	public function curriculum_prospectus($id)
	{
		try {
			$stmt = $this->conn->prepare("SELECT * FROM `curriculum_level` WHERE `curriculum_id` = :id ");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	public function auto_add_level_curriclum($curid){
		try {
			$stmt = $this->conn->prepare("INSERT INTO `curriculum_level`(`curriculum_id`, `year_level`) VALUES (:curid, '1'), (:curid, '2'), (:curid, '3'), (:curid, '4')");
			$stmt->bindParam(":curid", $curid);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			print("Error : ".$e->get_message());
		}
	}
	public function add_level_curriclum($id, $request)
	{
		try {
			$stmt = $this->conn->prepare("INSERT INTO `curriculum_level`(`curriculum_id`, `year_level`) VALUES (:id, :level)");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':level', $request['level']);
			$stmt->execute();
			return $stmt;
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	// get curicullum id per course and academic year
	public function curriculum_id($course_id)
	{

		try {
			$stmt = $this->conn->prepare("SELECT `id` FROM `curriculum` WHERE `course_id`= :course_id AND `academicyear` = :ay AND `status` = 1");
			$stmt->bindParam(':course_id', $course_id);
			$stmt->bindParam(':ay', $ay);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
			// elseif ($stmt->rowCount() <= 1) {
			// 	 return $stmt;
			// }
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
	// Get curriculum Level id per Curriculum Id and level
	public function curriculum_level($cur_id, $level)
	{

		try {
			$stmt = $this->conn->prepare("SELECT `id` FROM `curriculum_level` WHERE `curriculum_id` = :cur_id AND `year_level` = :level");
			$stmt->bindParam(':cur_id', $cur_id);
			$stmt->bindParam(':level', $level);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			}
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}

}



