<?php
require_once '../config/connection.php';

class User extends Connection{
	
	public function __construct(connection $conn) {
        $this->conn = $conn->conn;
    }

    public function lists_users()
    {
    	try {
    		$stmt = $this->conn->prepare("SELECT * FROM `users`");
    		$stmt->execute();
    		if($stmt->rowCount() > 0)
    		{
    			return $stmt->fetchALL(PDO::FETCH_ASSOC);
    		}
    	} catch (PDOException $e) {
    		print($E->get_message());
    	}
    }

	public function login_user($user_name, $password){
		$hash = sha1($password);
		$stmt = $this->conn->prepare("SELECT * FROM `users` WHERE `user_name` = :username AND `user_password` = :password");
		$stmt->bindParam(':username', $user_name);
		$stmt->bindParam(':password', $hash);
		$stmt->execute();

		$result = $stmt->rowCount();
		if($result > 0){ 
			$user = $stmt->fetch(PDO::FETCH_ASSOC);
			require_once '../config/session.php';
			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['user_type'] = $user['user_type'];
			$_SESSION['user_status'] = $user['user_status'];

			if ($_SESSION['user_status'] == 'waiting') {
				header('location: waiting_confirmation.php');
			}else{
				return true;
			}
		}else{
			return false;
		}

	}

	public function get_user($id){
		$sql = "SELECT * FROM `users` WHERE `user_id` = :id";
		$q = $this->conn->prepare($sql);
		$q->bindParam(':id', $id);
		$q->execute();

		$user = $q->fetch(PDO::FETCH_ASSOC);
		return $user;
	}

	public function create_user($request){
		try {


			$hash = sha1($request['userpass']); //Ecrypted Data


			$stmt = $this->conn->prepare("INSERT INTO `users`(`user_name`, `user_password`, `full_name`, `user_type`, `user_status`) VALUES (:username, :password, :fullname, :usertype, 'waiting')");
			$stmt->bindParam(':username', $request['user_name']);
			$stmt->bindParam(':password', $hash);
			$stmt->bindParam(':fullname', $request['name']);
			$stmt->bindParam(':usertype', $request['user_type']);
			return $stmt->execute();
		} catch (Exception $e) {
			echo $e->get_message();
		}
	}

	public function destroy_user($id)
	{
		try {

			$stmt = $this->conn->prepare("DELETE FROM `users` WHERE `user_id` = :id");
			$stmt->bindParam(':id', $id); 
			if ($stmt->execute()) {
				return true;
			}
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}

	public function user_confirmation($id)
	{
		try {

			$stmt = $this->conn->prepare("UPDATE `users` SET `user_status`= 'confirmed' WHERE `user_id` = :id");
			$stmt->bindParam(':id', $id); 
			if ($stmt->execute()) {
				return true;
			}
		} catch (PDOException $e) {
			echo $e->get_message();
		}
	}

	public function admin_authentication($password){
		try {
			$hash = sha1($password);
			$stmt = $this->conn->prepare("SELECT * FROM `users` WHERE `user_password` = :hash AND `user_type` = 'administrator'");
			$stmt->bindParam(':hash', $hash); 
 			$stmt->execute();

 			$result = $stmt->rowCount();
 			if ($result > 0) {
 				
 				return true;
 			}else{
 				return false;
 			}		
		} catch (PDOException $e) {
			echo $e->get_message();			
		}
	}
}