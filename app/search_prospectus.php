<?php 

require_once '../Library/Prospectus.php';

$prospectus_per_curriculum = $prospectus->prospectus_per_curriculum($_POST['cid']);

foreach ($prospectus_per_curriculum as $p) {
	echo '<tr>
			<td>'.$p['pid'].'</td>
			<td>'.$p['subject_code'].'</td>
			<td>'.$p['subject_desc'].'</td>
			<td>
<a href="javascript:void(0)"><i class="ik ik-plus"></i> Add</a></td>
		</tr>';
}
?>
