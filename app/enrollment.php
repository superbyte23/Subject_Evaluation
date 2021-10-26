<?php 

require_once '../Library/Enrollment.php';
require_once 'layout/main.php'; 
?>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">                                                                              
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>List of Enrolled Student</h5>
                                            <span>Enrollment table</span>
                                        </div>
                                         
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb"> 
                                        <a href="#" id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Data(s)</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <table id="scr-vtr-dynamic"
                                                   class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Enrollment Id</th>
                                                <th>Course</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach ($enrolled as $e) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child check" id="check" name="check[]" value="<?php print $e['id']; ?>"> 
                                                    </td>
                                                    <td> <?php print $e['studentid']; ?></td>        
                                                    <td> <?php print $e['Name']; ?></td>
                                                    <td> <?php print $e['id']; ?></td>
                                                    <td> <?php print $e['course_title'].' '.$e['level']; ?></td>
                                                    <td> <?php print($e['status'] == 1) ? 'Enrolled' : 'Close';?></td>                                       
                                                    <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#fullwindowModal" data-index="<?php print $e['id']; ?>"  class="pl-2 text-info enroll_id"><i class="ik ik-eye"></i> Details</a>
                                                         | <a href="#" data-index="<?php print $e['id']; ?>"  class="pl-2 text-danger delete_enroll"><i class="ik ik-trash"></i> Delete</a>
                                                        <!-- <a href="#" class="pl-2 text-primary"><i class="ik ik-edit"></i></a> -->
                                                        <!-- <a href="#" class="pl-2 text-danger"><i class="ik ik-trash"></i></a> -->
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>                                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        <div class="modal fade full-window-modal" id="fullwindowModal" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                     
                    <div class="modal-body bg-info" id="enrollment_details">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center"> 
                                            <img src="../img/user.jpg" class="rounded-circle" width="150">
                                            <h4 class="card-title mt-10" id="studentname">Name</h4>
                                            <p class="card-subtitle">Enrollment ID: <span id="enrollmentid">ID</span></p> 
                                            <p class="card-subtitle">Student ID: <span id="studentid">ID</span></p>
                                        </div>
                                    </div>
                                    <hr class="mb-0"> 
                                    <div class="card-body"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-muted d-block">Course & Level</small>
                                                <h6 id="course_level" class="border-bottom">Course & Level</h6> 
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted d-block">Semester</small>
                                                <h6 id="semester" class="border-bottom">Sem</h6> 
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted d-block">Academic Year</small>
                                                <h6 id="academicyear" class="border-bottom">AY</h6> 
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted d-block">Curriculum</small>
                                                <h6 id="curriculum" class="border-bottom">Cur</h6> 
                                            </div>
                                            <div class="col-md-12">
                                                <small class="text-muted d-block pt-10">Address</small>
                                                <h6 id="address" class="border-bottom"></h6>
                                            </div>
                                        </div>
                                        
                                         
                                        <small class="text-muted d-block pt-30">Social Profile</small>
                                        <br>
                                        <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                                        <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                                        <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="card table-card">
                                    <div class="card-header">
                                        <h3>Subject Details</h3>
                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                                <li><i class="ik ik-minus minimize-card"></i></li>
                                                <li><i class="ik ik-x close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table1">
                                                <thead class="text-center">
                                                    <th hidden="">#</th>
                                                    <th>Subject ID</th> 
                                                    <th class="w-25">Subject Code</th>
                                                    <th>Subject Name</th> 
                                                    <th>Unit</th> 
                                                    <th>Action</th> 
                                                </thead>
                                                <tbody class="" id="student_subject_table">  

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
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../js/datatables.js"></script>
        <script>
            $(document).ready(function(){
                var enrollid = 0;

                // $('#delete').click(function(){
                //     $('input[name^="check"]:checked').each(function() {
                //       let var1[] = $(this).val();
                //       console.log(var1);
                //     });
                    
                //     if (confirm('You are about to delete a multiple enrollment data. Confirm Deleting this Data?')) {
                //         $(this).attr("href", "enrollment_delete.php?ACTION=multiple&ID="+$(this).data('index'));
                //     } else {
                //        return false;
                //     }                                      
                // });
                $('.delete_enroll').click(function(){
                    if (confirm('You are about to delete an enrollment data. Confirm Deleting this Data?')) {
                        $(this).attr("href", "enrollment_delete.php?ACTION=single&ID="+$(this).data('index'));
                    } else {
                       return false;
                    }                            
                });
                $('.enroll_id').on('click', function(){
                    enrollid = $(this).data('index');
                    let enrollment_id = enrollid;
                    $.ajax({
                        type: 'POST',
                        url: 'backend_enrollment_details.php',
                        dataType: 'json',
                        data: {enrollment_id:enrollment_id},
                        success:function(data){
                            console.table(data);
                            $('#studentname').html(data.first_name+ ' '+data.last_name+ ' '+data.middle_name);
                            $('#studentid').html(data.student_id);
                            $('#enrollmentid').html(data.enrollment_id);
                            $('#course_level').html(data.course_title+' '+data.level);
                            $('#address').html(data.address);
                            $('#semester').html(data.semester_name);
                            $('#academicyear').html(data.name);
                            $('#curriculum').html(data.curriculum_title);
                            
                        }
                    });
                })
                $('#fullwindowModal').on('shown.bs.modal', function () {
                    let enrollmentid2 = enrollid;
                    let bool = true;
                    $.ajax({
                        type: 'POST',
                        url: 'backend_enrollment_details.php',
                        dataType: 'json',
                        data: {showsubject:bool, enrollmentid2:enrollmentid2},
                        success:function(subjects){
                            // console.table(subjects);
                            $.each(subjects, function(index,value) {
                                $('#table1 tbody').append('<tr valign="top"><td>'+value.subject_id+'</td><td>'+value.subject_code+'</td><td>'+value.subject_title+'</td><td>'+value.units+'</td><td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
                                // console.log($('#student_subject_table tr:last').after('<tr valign="top"><td>'+value.pid+'</td><td>'+value.subject_code+'</td><td>'+value.subject_title+'</td><td>'+value.units+'</td><td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>'));
                            });
                        }
                    });
                });

                $("#fullwindowModal").on('hide.bs.modal', function(){
                  $("#table1 tbody tr").remove();
                });
            });
        </script>
    </body>
</html> 