<?php 
	if (isset($_POST['enrollment_id'])) {
		require_once '../Library/Enrollment.php';
		$enrollment_details = $enrollment->enrollment_details($_POST['enrollment_id']); 
		print $enrollment_details; 
	}elseif (isset($_POST['showsubject'])) {
		 
		require_once '../Library/Subject.php'; 		
		 $subjects = $subjects->student_subjects($_POST['id'],$_POST['courseid'],$_POST['level'],$_POST['cid'], $_POST['semester']);
		    if ($subjects->rowCount() >= 1) {
		    	foreach ($subjects as $subj) { 
			       print('<tr>
			                <td class="pt-3-half">'.$subj['subject_id'].'</td>
			                <td class="pt-3-half">'.$subj['subject_code'].'</td>
			                <td class="pt-3-half">'.$subj['subject_title'].'</td>
			                </tr>');
			    }
		    }else{
		    	print('<tr>
		    		<td colspan="3"><div class="p-2 bg-pink text-white text-center"><i class="fa fa-book"></i> Approve Subjects First</div></td>
		    		</tr>');
		    }
 
	}elseif (isset($_POST['showgrades'])) {
		/**
		 * for Enrollment Only
		 *
		require_once '../Library/Subject.php'; 
		$student_subjects = $subjects->list_subject_curriculum_level($cid,$level,$semester);
		print $student_subjects; 
		 */
		require_once '../Library/Subject.php';  
		 $subjects = $subjects->student_subjects($_POST['id'],$_POST['courseid'],$_POST['level'],$_POST['cid'], $_POST['semester']);
		 try {
		 	if ($subjects->rowCount() > 0) {
			 	foreach ($subjects as $subj) { 
			    	if ($subj['gwa'] < 75) {
				   		$remarks = '<td class="pt-3-half bg-danger text-white text-center font-weight-bold">Failed</td>';
				   	}else{
				   		$remarks = '<td class="pt-3-half bg-success text-white text-center font-weight-bold">Passed</td>';
				   	} 
		       	print('<tr>
			                <td class="pt-3-half">'.$subj['id'].'</td>
			                <td class="pt-3-half">'.$subj['subject_code'].'</td>
			                <td class="pt-3-half">'.$subj['subject_title'].'</td>
			                <td class="pt-3-half grade" contenteditable="true" data-index="'.$subj['id'].'">'.$subj['gwa'].'</td>
			                '.$remarks.' 
			              </tr>');
			    }
			 	} 
		 } catch (Exception $e) {
		 		echo $e->get_message();
		 }
		 
	 }
?>