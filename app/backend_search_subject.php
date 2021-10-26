<?php 

require_once '../Library/Subject.php'; 

if (isset($_POST['code'])) {
	 $results =  $subjects->search_subject($_POST['code']);
	 if ($results->rowCount() > 0) {
	 	foreach ($results as $row) {
		 	echo('	<div class="list-item">
		                <div class="item-inner"> 
		                    <div class="list-title"><a href="javascript:void(0)">'.$row["subject_code"].'</a></div>
		                    <div class="list-actions">
		                        <a class="sub_id1 pointer" data-index="'.$row["id"].'")><i class="ik ik-plus"></i></a> 
		                    </div>
		                </div>
		                <div class="qickview-wrap">
	                        <div class="desc">
	                            <p>'.$row["subject_title"].'</p>
	                        </div>
	                    </div> 
		            </div>  ');
		 }
	 }else{
	 	echo '<p>No result(s) found</p>';
	 }
}elseif (isset($_POST['secode'])) {
	$results =  $subjects->search_subject($_POST['secode']);
	 if ($results->rowCount() > 0) {
	 	foreach ($results as $row) {
		 	echo('	<div class="list-item">
		                <div class="item-inner"> 
		                    <div class="list-title"><a href="javascript:void(0)">'.$row["subject_code"].'</a></div>
		                    <div class="list-actions">
		                        <a class="sub_id2 pointer" data-index="'.$row["id"].'")><i class="ik ik-plus"></i></a> 
		                    </div>
		                </div>
		                <div class="qickview-wrap">
	                        <div class="desc">
	                            <p>'.$row["subject_title"].'</p>
	                        </div>
	                    </div> 
		            </div>  ');
		 }
	 }else{
	 	echo '<p>No result(s) found</p>';
	 }
}
require_once 'default_js_script.php';

?>

<script>
	$(document).ready(function(){
		$('.sub_id1').unbind().bind('click', function(){
			let sub_id1 = $(this).data('index');
			$.ajax({
				type:'POST',
				url:'backend_add_subject_prospectus.php',
				data:{sub_id1:sub_id1, clevel:<?php echo $_POST['clevel']; ?>, cid:<?php echo $_POST['cid']; ?>},
				success:function(html){ 
                    $('#list_table').html(html);
                }
			});
		});

		$('.sub_id2').unbind().bind('click', function(){
			let sub_id2 = $(this).data('index');
			$.ajax({
				type:'POST',
				url:'backend_add_subject_prospectus.php',
				data:{sub_id2:sub_id2, clevel:<?php echo $_POST['clevel']; ?>, cid:<?php echo $_POST['cid']; ?>},
				success:function(html){ 
                    $('#list_table2').html(html);
                }
			});
		});
	});
	
</script>