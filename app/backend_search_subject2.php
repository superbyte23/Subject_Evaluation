<?php 

require_once '../Library/Subject.php'; 

if (isset($_POST['code'])) {
	 $results =  $subjects->search_subject($_POST['code']);
	 if ($results->rowCount() > 0) {
	 	foreach ($results as $row) {
		 	echo('<div class="list-item" id="testers">
		                <div class="item-inner"> 
		                    <div class="list-title">
		                    <a class="text-purple" href="javascript:void(0)">'.$row["subject_code"].' - <span class="text-primary">'.$row["subject_title"].'</span></a>
		                    </div>
		                    <div class="list-actions">
		                        <a class="click_add pointer text-danger" data-index="'.$row["id"].'")><i class="ik ik-plus"></i></a> 
		                    </div>
		                </div> 
		            </div>  ');
		 }
	 }else{
	 	echo '<p>No result(s) found</p>';
	 } 
}

?>
<script type="text/javascript" src="test.js"></script>
 