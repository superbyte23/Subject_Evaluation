<?php 

require_once '../config/connection.php'; 

class Department extends Connection{  
	 
	public function list_department(){ 
		$stmt = $this->conn->prepare("SELECT * FROM `department`");		 
		$stmt->execute();
		return $stmt;
	}
	public function department_add($request)
	{
		$stmt = $this->conn->prepare("INSERT INTO `department`(`department_name`, `department_head`, `description`) VALUES (:name, :head, :description)");
		$stmt->bindParam(':name', $request['departmentname']);
		$stmt->bindParam(':head', $request['departmenthead']);
		$stmt->bindParam(':description', $request['description']); 
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	public function department_info($id)
	{
		$stmt = $this->conn->prepare("SELECT * FROM `department` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$course = $stmt->fetch(PDO::FETCH_ASSOC);
			return $course;
		}
	}
	public function department_update($request)
	{
		$stmt = $this->conn->prepare("UPDATE `department` SET `department_name`= :name,`department_head`= :head,`description`= :description WHERE `id` = :id");
		$stmt->bindParam(':id', $request['departmentid']);
		$stmt->bindParam(':name', $request['departmentname']);
		$stmt->bindParam(':head', $request['departmenthead']);
		$stmt->bindParam(':description', $request['description']);
		$stmt->execute();
		return $stmt;
	}
	public function department_delete($id)
	{
		$stmt = $this->conn->prepare("DELETE FROM `department` WHERE `id` = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt;
	} 
}



