<?php 

require_once '../config/connection.php'; 

class Settings extends Connection{  
	 
	public function show_semester()
	{ 
		try {
		 	$stmt  = $this->conn->prepare("SELECT * FROM `semester` ");
		 	if($stmt->execute()){
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function get_active_semester()
	{ 
		try {
		 	$stmt  = $this->conn->prepare("SELECT `id` FROM `semester` WHERE `status` = 1"); 
		 	$stmt->execute();
		 	if ($stmt->rowCount() > 0) {
				return $stmt->fetch(PDO::FETCH_ASSOC); 
			}
			else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}
	public function set_active_semester($id)
	{ 
		try {
		 	$stmt  = $this->conn->prepare("UPDATE `semester` SET `status`= 1 WHERE `id` = :id");
		 	$stmt->bindParam(':id', $id);
		 	if($stmt->execute()){
		 		$this->set_inactive_semester($id);
		 		return $stmt;
		 	}else{
		 		return false;
		 	}
		 } catch (PDOException $e) {
		 	echo $e->get_message();
		 }	 
	}

	public function set_inactive_semester($id)
	{ 
		try {
		 	$stmt  = $this->conn->prepare("UPDATE `semester` SET `status`= 0 WHERE `id` <> :id");
		 	$stmt->bindParam(':id', $id);
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



