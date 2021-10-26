<?php

session_start();

class app_session{

	public function session_check(){

		if (!isset($_SESSION['user_id'])) {		
			 return false;
		}else{
			return true;
		}
	}

	public function destroy_session(){		
		session_destroy();
		session_unset();
		return true;
	}
 

}
?>