<?php 

require_once '../Library/Course.php';
require_once '../Library/Year_level.php';
require_once '../Library/NumtoWords.php';
require_once '../Library/AcademicYear.php';
require_once 'layout/main.php'; 
?> 
    <body>
        <div class="wrapper no-print">
           <?php require_once 'layout/header.php'; ?>
            <div class="page-wrap">
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-search bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Grades Submission Portal</h5>
                                            <span>Search portal Adding Grades</span>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs bg-white" id="myTab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="filter-tab" data-toggle="tab" href="#filter" role="tab" aria-controls="filter" aria-selected="true"><i class="ik ik-search"></i> Filter</a>
                                  </li>
                                  <!-- <li class="nav-item">
                                    <a class="nav-link" id="student-tab" data-toggle="tab" href="#student" role="tab" aria-controls="student" aria-selected="false"><i class="ik ik-user"></i> Student</a>
                                  </li> -->
                                  <!-- <li class="nav-item">
                                    <a class="nav-link" id="class-tab" data-toggle="tab" href="#class" role="tab" aria-controls="class" aria-selected="false"><i class="ik ik-command"></i> Class</a>
                                  </li> -->
                                </ul>
                                <div class="tab-content bg-white" id="myTabContent">
                                  <div class="tab-pane fade show active p-2" id="filter" role="tabpanel" aria-labelledby="filter-tab"> 
                                        <form class="forms-sample">
                                            <div class="row">                                           
                                               <div class="col-md-2 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="Course"><i class="fa fa-graduation-cap"></i> Course</label>
                                                       <select name="course" id="course" class="form-control select2">
                                                           <option value="" selected="">Select Course</option>
                                                           <?php 
                                                            foreach ($listOfCourses as $course) {
                                                                print('<option value="'.$course["id"].'">'.$course["course_title"].'</option>');
                                                            }
                                                           ?>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md-2 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="year"><i class="fa fa-graduation-cap"></i> Year Level</label>
                                                       <select name="year" id="year" class="form-control select2">
                                                           <option value="" selected="">Select Year</option>
                                                           <?php 
                                                            foreach ($yearlevel_list as $year) {
                                                                 print('<option value="'.$year["id"].'">'.ucfirst(numberTowords($year["level"])).' Year</option>');
                                                            }
                                                           ?>
                                                       </select>
                                                   </div>
                                               </div>
                                                <div class="col-md-2 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="semester"><i class="fa fa-graduation-cap"></i> Semester</label>
                                                       <select name="semester" id="semester" class="form-control select2">
                                                           <option value="" selected="">Select Semester</option>
                                                           <option value="1">First</option>
                                                           <option value="2">Second</option>
                                                            
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md-3 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="ay"><i class="fa fa-graduation-cap"></i> Academic Year</label>
                                                       <select name="ay" id="ay" class="form-control select2">
                                                           <option value="" selected="">Select Academic Year</option>
                                                           <?php 
                                                            foreach ($academic_list as $ay) {
                                                                print('<option value="'.$ay["id"].'">'.$ay["name"].'</option>');
                                                            }
                                                           ?>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-md-3 col-sm-6">
                                                   <div class="form-group">
                                                       <label for="Course"><i class="fa fa-search"></i> Search</label>
                                                       <button type="button" class="btn btn-info form-control bg-info" id="btnsearch"><i class="fa fa-search"></i>Load</button>
                                                   </div>
                                               </div>
                                            </div>
                                            <table id="table1" class="table table-hover">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Stuent Name</th>
                                                    <th>Course|Level</th>
                                                    <th class="w-25 text-center">Action</th>
                                                </thead>
                                                <tbody id="table-body">
                                                    <!-- <tr>
                                                      <td> </td>
                                                      <td> </td>
                                                      <td> </td>
                                                      <td class="text-center test">
                                                          <a href="JavaScript:Void(0);" class="view_subjects text-info" data-index="'+value.id+'" data-target="#show_subjects_modal" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="View Subjects"><i class="ik ik-eye"></i></a>
                                                          <a href="grade_input.php?enroll_id='+value.student_id+'" class="text-warning" data-toggle="tooltip" data-placement="top" title="Input Grades"><i class="ik ik-edit-2"></i></a>
                                                      </td>
                                                   </tr> -->
                                                </tbody>
                                            </table>  
                                            <div id="result2">
                                                <div class="main-loader">
                                                  <div class="loader"></div>
                                                </div>
                                            </div>                                        
                                        </form> 
                                  </div>
                                  <div class="tab-pane fade p-2" id="student" role="tabpanel" aria-labelledby="student-tab">
                                    <div class="dt-responsive">
                                        <table id="scr-vrt-dt"
                                               class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <th>ID</th>
                                                <th>Stuent Name</th>
                                                <th>Course|Level</th>
                                                <th class="w-25 text-center">Action</th>
                                            </thead>        
                                            <tbody>
                                                <tr class="h6">
                                                    <td>value.student_id</td>
                                                    <td>value.first_name+' '+value.last_name+'</td>
                                                    <td>'+value.course_title+'|'+value.level+'</td>
                                                    <td class="text-center test">
                                                        <a href="#"><i class="ik ik-eye"></i></a>
                                                        <a href="#"><i class="ik ik-inbox"></i></a>
                                                        <a href="#"><i class="ik ik-edit-2"></i></a>
                                                        <a href="#"><i class="ik ik-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody> 
                                        </table>
                                        </div>
                                  </div>
                                  <div class="tab-pane fade pt-3" id="class" role="tabpanel" aria-labelledby="class-tab">
                                  </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        <div class="modal fade" id="show_subjects_modal" tabindex="-1" role="dialog" aria-labelledby="show_subjects_modal_Label" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content"> 
                  <div class="modal-header">
                      <h5 class="modal-title" id="show_subjects_modal_Label">Student Grades</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="subjects_table">
                              <thead class="text-center">
                                  <th hidden="">#</th>
                                  <th>Subject ID</th> 
                                  <th class="w-25">Subject Code</th>
                                  <th>Subject Name</th> 
                                  <th>GWA</th>
                                  <th>Remarks</th>
                              </thead>
                              <tbody class="" id="subject_table">

                              </tbody>
                          </table>
                      </div>
                  </div> 
                  <div class="modal-footer no-print">
                      <!-- <button class="btn btn-info" id="print_grades"><i class="fa fa-print"></i> Print</button> -->
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> 
                  </div>
              </div>
          </div>
      </div>
        <!-- <div class="modal fade apps-modal" id="" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                     
                    <div class="modal-body d-flex align-items-center">
                       
                    </div>
                </div>
            </div>
        </div> -->
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script src="../js/datatables.js"></script>
        <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
        <script src="../plugins/select2/dist/js/select2.min.js"></script>

        <script src="../js/custom_alert.js"></script>
        <!-- <style type="text/css">
             #result{
                   width: 97%; 
                    z-index: 1000;  
                    margin: 0 auto;
                } 
        </style> -->
        <script>
           /* function showGrades(id){
                $(document).ready(function() {
                    $("#subjects_table tbody tr").remove();
                    let enrollmentid2 = id;
                    let bool = true;
                    $.ajax({
                        type: 'POST',
                        url: 'backend_enrollment_details.php',
                        dataType: 'json',
                        data: {showsubject:bool, enrollmentid2:enrollmentid2},
                        success:function(subjects){
                            console.table(subjects);
                            $.each(subjects, function(index,value) {
                                $('#subjects_table tbody').append('<tr valign="top"><td>'+value.id+'</td><td>'+value.subject_code+'</td><td>'+value.subject_title+'</td><td>'+value.units+'</td></tr>'); 
                            });
                        }
                    });
                });
            } */ 
            function showGrades(studentid,cid,courseid,level,semester){
              
                $(document).ready(function() {
                    $("#subjects_table tbody tr").remove();                    
                    let bool = true;
                    console.log(studentid);                   
                    console.log(cid);                   
                    console.log(courseid);                   
                    console.log(level);   
                    console.log(semester);   
                    $.ajax({
                        type: 'POST',
                        url: 'backend_enrollment_details.php',
                        // dataType: 'json',
                        data: {showgrades:bool, id:studentid, courseid:courseid, cid:cid, level:level, semester:semester},
                        success:function(subjects){ 
                            console.log(subjects);
                          $('#subject_table').html(subjects);
                        }
                    });
                });
            }
            $(document).ready(function(){

                $('.select2').select2(); 
                $('.main-loader').hide();
                $('#btnsearch').on('click', function(){
                    $("#table1 tbody tr").remove();
                    let course = $('#course').val();
                    let year = $('#year').val();
                    let semester = $('#semester').val();
                    let ay = $('#ay').val();
                    let filter = true;
                    if (!course || !year || !semester || !ay) {
                        dangerAlert("Selection is required");
                    }else{
                        $('.main-loader').show();                       
                        $.ajax({
                            type: 'POST',
                            url: 'backend_search_filtered.php',
                            dataType: 'json',
                            data: {filter:filter, course:course, year:year, ay:ay, semester:semester},
                            success:function(data){
                            console.table(data);  
                            $.each(data, function(index,value) {
                             
                              $('#table1 tbody').append('<tr class="h6">'+
                              '<td>'+value.id+'</td>'+
                              '<td>'+value.first_name+' '+value.last_name+'</td>'+
                              '<td>'+value.course_title+'-'+value.level+'</td>'+
                              '<td class="text-center test"> '+
                              ' <a href="JavaScript:Void(0);" class="view_subjects text-info" data-index="'+value.id+'" data-target="#show_subjects_modal" onclick="showGrades('+value.id+','+value.cid+','+course+','+year+','+semester+');" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="View Subjects"><i class="ik ik-eye"></i></a>'+ 
                              ' <a href="grades_input.php?id='+value.id+'&courseid='+value.courseid+'&cid='+value.cid+'&level='+value.level+'&semester='+semester+'" target="_blank"class="text-warning" data-toggle="tooltip" data-placement="top" title="Submit Grades"><i class="ik ik-edit-2"></i></a>'+ 
                              '</td>'+
                              '</tr>');
                            });                                   
                                $('.main-loader').hide();
                            },
                            error: function(data) { 
                                dangerAlert("No Data Found");
                                $('.main-loader').hide(); 
                            }     
                        });                        
                    }
                });
                
                $('#myTab a').click(function(e) {
                  e.preventDefault();
                  $(this).tab('show');
                });

                

                // store the currently selected tab in the hash value
                $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
                  var id = $(e.target).attr("href").substr(1);
                  window.location.hash = id;
                });

                // on load of the page: switch to the currently selected tab
                var hash = window.location.hash;
                $('#myTab a[href="' + hash + '"]').tab('show');   


            });
        </script>
        <style type="text/css">
             
            .test a {
                width: 30px;
                height: 30px;
                padding: 0;
                border-radius: 50%;
                text-align: center;
                line-height: 32px;
                color: #999;
                display: inline-block;
                font-size: 16px;
            }
            .test a:hover{
                background-color: #dee2e6;
                color: #333;
            }
        </style>
        <script type="text/javascript" src="test.js"></script>
         
    </body>
</html>
