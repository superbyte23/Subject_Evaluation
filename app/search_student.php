 <?php
	require_once '../Library/Student.php'; 

if (isset($_POST['filter'])) {
	 $results =  $students->search_student($_POST['filter']);
	 if ($results->rowCount() > 0) {
	 	foreach ($results as $row) {
		 	echo('
		    <a href="javascript:void(0)" class="list-group-item list-group-item-action rounded-0 student" id="student" data-value="'.$row["last_name"].', '.$row['first_name'].' '.$row['middle_name'].'" data-index="'.$row['id'].'" style="position: relative;">'.$row["last_name"].', '.$row['first_name'].' '.$row['middle_name'].'</a>  ');
		 }
	 }else{
	 	echo '<p>No result(s) found</p>';
	 }
}
?>
<script type="text/javascript">
	$(function(){
		$('a.student').on('click', function(){
			var id = $(this).data('index');
			var student_name = $(this).data('value');
			$('#student_id').val(id);
			$('#search').val(student_name);
			console.log(student_name);
			console.log(id);
			$('#student_result').hide();
		})
	})
</script> 