 <?php
	try {
	 	if (isset($_POST['search']))
	 	{
	 		switch ($_POST['search']) {
	 			case 'list_enrolled': 
					require_once '../Library/Enrollment.php';
			 
					$results =  $enrollment->list_enrolled_wildcard($_POST['filter']);
					if ($results) {
					 	foreach ($results as $row) {
						 	echo('<a href="javascript:void(0)" class="list-group-item list-group-item-action rounded-0 student" id="student" data-value="'.$row["Name"].'" data-index="'.$row['id'].'" style="position: relative;">'.$row["Name"].' | Enrollment Id: '.$row["id"].'</a>');
						}
					}else
					{
					 	echo '<p>No result(s) found</p>';
					} 
					?>
					<script type="text/javascript">
						$(function(){
							$('a.student').on('click', function(){
								var enrollid = $(this).data('index');
								var student_name = $(this).data('value');
								$('#student_id').val(enrollid);
								$('#search').val(student_name);
								$('#student_result').hide();
								$('.main-loader').show(); 

								$.ajax({

									type: 'POST',
									url: 'backend_student_enrollment_details.php',
									data:{enrollid:enrollid},
									success:function(data){
										console.log(data);
										$('.main-loader').hide();
									}

								});
								
							});
						});
					</script> 
					<?php 
	 				break;
	 			
	 			default:
	 				print("Try Again next time");
	 				break;
	 		}
	 	}
		
	} catch (PDOException $e) {
	 	echo $e->get_message();
	}