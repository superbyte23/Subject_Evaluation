<?php
if (isset($_POST)) {
	if (!empty(isset($_POST['add']))) {
		require_once '../Library/Subject.php';
		$add = $subjects->add_student_subject($_POST['std_id'], $_POST['sub_id'], $_POST['curlvl_id']);
		if ($add == true) {
			$listofsubjects = $subjects->student_subject_lists($_POST['std_id'], $_POST['curlvl_id']);
			if ($listofsubjects->rowCount() > 0) {
				foreach ($listofsubjects as $ls) {
					echo '<tr>
							<td hidden>'.$ls["student_id"].'</td>
							<td hidden>'.$ls["curlvl_id"].'</td> 
							<td>'.$ls["subject_code"].'</td>
							<td>'.$ls["subject_title"].'</td>
							<td>'.$ls["units"].'</td>
							<td><a href="javascript:void(0)" class="delete_me" data-index="'.$ls["stsubid"].'"><i class="ik ik-trash"></i></a></td>
						</tr>';
				}
			}
		}	 
	}elseif (!empty(isset($_POST['destroy']))) {
		require_once '../Library/Subject.php';
		$destroy = $subjects->delete_student_subject($_POST['id']);

		if ($destroy == true) {
			$listofsubjects = $subjects->student_subject_lists($_POST['stdid'], $_POST['curlvlid']);
			if ($listofsubjects->rowCount() > 0) {
				foreach ($listofsubjects as $ls) {
					echo '<tr>
							<td hidden>'.$ls["student_id"].'</td>
							<td hidden>'.$ls["curlvl_id"].'</td> 
							<td>'.$ls["subject_code"].'</td>
							<td>'.$ls["subject_title"].'</td>
							<td>'.$ls["units"].'</td>
							<td><a href="javascript:void(0)" class="delete_me" data-index="'.$ls["stsubid"].'"><i class="ik ik-trash"></i></a></td>
						</tr>';
				}
			}
		}
	}
}
?>
<script type="text/javascript" src="test.js"></script>
