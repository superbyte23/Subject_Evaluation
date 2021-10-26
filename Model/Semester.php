<?php 

require_once '../config/connection.php'; 

class Semester extends Connection{  
	 
	public function semester_list(){ 
		$stmt = $this->conn->prepare("SELECT * FROM `semester`");	 
		$stmt->execute();
		return $stmt;
	} 
}

