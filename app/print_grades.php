<?php 

require_once '../Library/Subject.php'; 
		
$subjects = $subjects->student_subjects($_POST['id'],$_POST['courseid'],$_POST['level'],$_POST['cid'], $_POST['semester']);

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

?>