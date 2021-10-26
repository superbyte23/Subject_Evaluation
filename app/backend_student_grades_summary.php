<?php 
if (isset($_POST['stdid'])) {
	require_once '../Library/NumtoWords.php';
require_once '../Library/Student.php';
$student_info = $students->student_info($_POST['stdid']);
require_once '../Library/Grades.php';
$summary = $grade->grades_summary_per_student($_POST['stdid'])->fetchAll(PDO::FETCH_ASSOC);
 
?>
<div class="modal-body bg-info" id="enrollment_details">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="profile-pic">
                                           	<?php if ($student_info['gender'] == 'Male') {
                                           		echo ' <img src="../img/male.png" width="150" class="rounded-circle" alt="user">';
                                           	}else{
                                           		echo ' <img src="../img/female.png" width="150" class="rounded-circle" alt="user">';
                                           	}
                                           	?>
                                            <h4 class="mt-20 mb-0"><?php echo $student_info['first_name'].' '.$student_info['last_name']; ?></h4>
                                            
                                        	<div class="badge badge-pill badge-dark mt-1"><?php echo $student_info['email']; ?></div>
                                        </div>  
                                    </div>
                                    <div class="card-body pb-0 pt-0">	                                    	
                                        	<p class="p-0 m-0"><i class="ik ik-info"></i> Address: <span><?php echo $student_info['address'] ?></span></p>
                                        	<p class="p-0 m-0"><i class="ik ik-info"></i> Contact #: <span><?php echo $student_info['mobile'] ?></span></p>
                                        	<p class="p-0 m-0"><i class="ik ik-info"></i> Gender : <span><?php echo $student_info['gender'] ?></span></p>

                                    </div>
                                    <div class="p-4 border-top">
                                        <div class="row text-center">
                                            <div class="col-6 border-right">
                                                <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-life-buoy f-20 mr-5"></i><?php echo $student_info['course_title']." - ".$student_info['year']; ?></a>
                                            </div>
                                            <div class="col-6">
                                                <a href="student_edit.php?id=<?php echo $student_info['id']; ?>&view=true" class="link d-flex align-items-center justify-content-center"><i class="ik ik-link f-20 mr-5"></i>View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="widget">
                                    <div class="widget-header bg-pink text-white">
                                        <h3 class="widget-title"><i class="ik ik-command"></i> View Evaluation Details</h3>
                                        <div class="widget-tools pull-right">
                                            <button type="button" class="text-white btn btn-widget-tool minimize-widget ik ik-plus"></button>
                                        </div>
                                    </div>
                                    <div class="widget-body" style="">
                                         <div class="dt-responsive">
											<table id="order-table" class="table table-hover table-bordered table-sm summary_table">
											    <thead class="text-center"> 
											        <th class="w-25">Subject Code</th>
											        <th>Subject Name</th> 
											        <th>Unit</th>
											        <th>Grades</th>
											    </thead>
											    <tbody>  
													
													<?php
														foreach ($summary as $value) {
															if ($value['gwa'] < 75) {
																print("<tr>
											                    <td>".$value['subject_code']."</td>
											                    <td>".$value['subject_title']."</td>
											                    <td>".$value['units']."</td>                            
											                    <td class='text-white bg-danger'>".$value['gwa']."</td>
											                    </tr>");
															}else{
																print("<tr>
											                    <td>".$value['subject_code']."</td>
											                    <td>".$value['subject_title']."</td>
											                    <td>".$value['units']."</td>                            
											                    <td>".$value['gwa']."</td>
											                    </tr>");
															}
														}
													?>
											    </tbody>
											</table> 
										</div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                    </div>

<?php

}

?>