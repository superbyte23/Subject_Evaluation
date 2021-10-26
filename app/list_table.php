<?php
	if (isset($_GET['id'])) {
		foreach ($prospectus_list as $row) {
			print '<tr>
				 	<td>'.$row["subject_code"].'</td>
				 	<td>'.$row["subject_title"].'</td>
				 	<td>

				 	<a href="backend_remove_subject_prospectus.php?pid='.$row["pid"].'&id='.$_GET['id'].'" data-index="'.$row["pid"].'" class="sub_delete pointer"><i class="ik ik-trash"></i></a></td>	 	
				 </tr>';
		}
	}elseif(isset($_POST['clevel'])){
		foreach ($prospectus_list as $row) {
		print '<tr>
			 	<td>'.$row["subject_code"].'</td>
			 	<td>'.$row["subject_title"].'</td>
			 	<td>

			 	<a href="backend_remove_subject_prospectus.php?pid='.$row["pid"].'&id='.$_POST['clevel'].'" data-index="'.$row["pid"].'" class="sub_delete pointer"><i class="ik ik-trash"></i></a></td>	 	
			 </tr>';
	}
	}
?> 

 