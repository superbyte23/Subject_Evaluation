<?php
require_once '../config/connection.php';

class Year_level extends Connection{

	public function __construct(connection $conn) {
		$this->conn = $conn->conn;
	}

	public function list_Level()
	{
		try {
			$stmt = $this->conn->prepare("SELECT * FROM `year_level`");
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				return $stmt;
			} 
		} catch (PDOException $e) {
			echo $e->get_message();
			die();
		}
	}
}