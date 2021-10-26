<?php

if (!empty($_POST)) {

  	switch ($_POST['model']) {
  		case 'student':
  			require_once '../Library/Student.php';
            try {
                $student_info = $students->student_details($_POST['id']);
                ?>
                <div class="modal-header rounded-0">
                    <h5 class="modal-titl" id="editLayoutItemLabel"><i class="ik ik-user"></i> Student Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-md-3 col-6"> <strong>Full Name</strong>
                            <br>
                            <p class=""><?php echo $student_info['first_name'].' '.$student_info['middle_name'][0].'. '.$student_info['last_name']; ?></p>
                        </div> 
                        <div class="col-md-3 col-6"> <strong>Email</strong>
                            <br>
                            <p class=""><?php echo $student_info['email']; ?></p>
                        </div>
                        
                    </div> 
                    <h3 class="pt-3">Primary Details</h3>
                    <hr>
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Address</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['address']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Mobile Number</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['mobile']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Date of Birth</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['dob']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Age</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['age']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Gender</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['gender']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Civil Status</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['civil_status']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for=""><strong>Religion</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['religion']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <label for=""><strong>Nationality</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['religion']; ?></p>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h3 class="pt-3">Secondary Details</h3>
                    <hr>
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Father</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['father']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Work</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['father_occuoation']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Mother</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['mother']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Work</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['mother_occupation']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Guardian</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['guardian']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><strong>Guardian_addreess</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['guardian_addreess']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                    <label for=""><strong>Other Person Supporting</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['other_person']; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  <div class="form-group">
                                    <label for=""><strong>Address</strong></label>
                                   <p class=" border-bottom"><?php echo $student_info['other_person_address']; ?></p>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div> 
                <?php
            } catch (PDOException $e) {
                die("Oh no! There's an error in the query!");
            } 
  			break;
  		case 'course':
            try {
                require_once '../Library/Course.php';
                $course_info = $course->course_show_info($_POST['id']);
                ?>
                 <div class="modal-header bg-info rounded-0">
                    <h5 class="modal-title text-white" id="editLayoutItemLabel">Course Information.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">   
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Course Code</strong></label>
                                    <div class="p-3 mb-2 bg-primary text-white"><?php echo $course_info['code']; ?></div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Course Title</strong></label>
                                   <div class="p-3 mb-2 bg-primary text-white"><?php echo $course_info['course_title']; ?></div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Description</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white"><?php echo $course_info['course_desc']; ?></div> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Department</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white"><?php echo $course_info['department_name']; ?> - <?php echo $course_info['description']; ?></div> 
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
                <?php
            } catch (PDOException $e) {
                die("Oh noes! There's an error in the query!");
            }
  			break;
        case 'department':
            try {
                require_once '../Library/Department.php';
                $department_info = $departments->department_info($_POST['id']);
                ?>
                 <div class="modal-header bg-info rounded-0">
                    <h5 class="modal-title text-white" id="editLayoutItemLabel">Department Information.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">   
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Department Name</strong></label>
                                    <div class="p-3 mb-2 bg-primary text-white"><?php echo $department_info['department_name']; ?></div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Department Head</strong></label>
                                   <div class="p-3 mb-2 bg-primary text-white"><?php echo $department_info['department_head']; ?></div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Description</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white"><?php echo $department_info['description']; ?></div> 
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
                <?php
            } catch (Exception $e) {
                die("Oh noes! There's an error in the query!");
            }
            break;
        case 'subject':
            try {
                require_once '../Library/Subject.php';
                $subject_info = $subjects->subject_info($_POST['id']);
                ?>
                 <div class="modal-header bg-info rounded-0">
                    <h5 class="modal-title text-white" id="editLayoutItemLabel">Subject Information.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">   
                    <form class="forms-sample">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Subject Code</strong></label>
                                   <div class="p-3 mb-2 bg-primary text-white"><?php echo $subject_info['subject_code']; ?></div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Subject Title</strong></label>
                                    <div class="p-3 mb-2 bg-primary text-white"><?php echo $subject_info['subject_title']; ?></div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Description</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white"><?php echo $subject_info['subject_desc']; ?></div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Units</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white"><?php echo $subject_info['units']; ?></div> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="text-uppercase "><strong>Prerequesite</strong></label>
                                    <div class="p-3 mb-2 bg-warning text-white">
                                        <?php 
                                        if ($subject_info['prerequisite'] == "") {
                                           echo "None";
                                        }else{
                                            echo $subject_info['prerequisite'];
                                        }
                                        ?>                                            
                                        </div> 
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
                <?php
            } catch (Exception $e) {
                die("Oh noes! There's an error in the query!");
            }
            break;
  		default:
  			# code...
  			break;
  	}
}