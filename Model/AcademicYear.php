<?php 

require_once '../config/connection.php'; 

class AcademicYear extends Connection{  
	 
	public function list_academicyear()
	{ 
		try {
		 	$stmt  = $this->conn->prepare("SELECT * FROM `academic_year` ORDER BY `name` desc");
		 	if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}

	public function academicyear_add($request)
	{
		 try {
		 	$stmt  = $this->conn->prepare("INSERT INTO `academic_year`(`name`, `status`) VALUES (:name, :status)");
		 	$stmt->bindParam(':name', $request['name']);
		 	$stmt->bindParam(':status', $request['status']);
		 	if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function academicyear_info($id)
	{
		 try {
		 	$stmt = $this->conn->prepare("SELECT * FROM `academic_year` WHERE `id` = :id");
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				$academic_info = $stmt->fetch(PDO::FETCH_ASSOC);
				return $academic_info;
			}
		 } catch (Exception $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function academicyear_update($request)
	{
		 try {
		 	$stmt  = $this->conn->prepare("UPDATE `academic_year` SET `name`= :name,`status`= :status WHERE `id` = :id");
		 	$stmt->bindParam(':id', $request['id']);
		 	$stmt->bindParam(':name', $request['name']);
		 	$stmt->bindParam(':status', $request['status']);
		 	if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function academicyear_delete($id)
	{
		  try {
		 	$stmt  = $this->conn->prepare("DELETE FROM `academic_year` WHERE `id` = $id");
		 	 if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
}



