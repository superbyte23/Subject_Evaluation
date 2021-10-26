<?php
class Connection
{
	
	private $host="localhost";
	private $user="root";
	private $db="subject_evaluation";
	private $pass="";
	protected $conn; 
    /**
     * [__construct description]
     */
	public function __construct(){
	 	$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
	 	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	/**
	 * [authenticate_page authinticate/validate current page]
	 * @param  [type] $stmt [statemrnt]
	 * @return [type]       [header Location]
	 */
	public function authenticate_page($stmt){
		if (!$stmt) {
			header('location: 404.php');
		}
	}
}

?>