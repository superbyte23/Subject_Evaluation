<?php 
	if (isset($_POST['semester'])) {
		require_once '../Library/Settings.php';
		if($update = $settings->set_active_semester($_POST['semester']))
		{
			echo "Successfully Updated.";
		}else{

			 return 0;
		}
	}
?>