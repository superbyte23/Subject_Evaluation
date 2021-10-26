<?php 

require_once '../Library/Course.php';
require_once '../Library/Year_level.php';
require_once '../Library/AcademicYear.php';
require_once '../Library/Curriculum.php';
require_once 'layout/main.php'; 
?>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>
            <div class="page-wrap">
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="card">
                            <div id="evaluation">
                                <div class="card-header bg-info"><h3 class=" text-white"><i class="ik ik-user"></i> Old Student Enrollment Form</h3></div>
                                <div class="card-body">
                                    <form id="enrollmentForm" method="POST" action="">
                                        <div class="row">                                           
                                             <div class="col-md-6"> 
                                                <h5 class="text-center">Student Information</h5>
                                                <div class="row">          
                                                        <div class="form-group col-12">

                                                        <label>Search Student : Id/Name <span class="text-danger">*</span></label>      
                                                               <div class="input-group mb-0">
                                                                   <input type="text" name="" class="form-control rounded-0" id="search" placeholder="Enter Student" autocomplete="off"> 
                                                        <span class="input-group-append" id="basic-addon3">
                                                            <label class="input-group-text clear-text">x</label>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="student_id" id="student_id" hidden="" value="">
                                                <div id="student_result" class="list-group" style="display: none;">
                                                    
                                                </div> 
                                                        </div>
                                                        <div class="form-group col-12">
                                                        <label>Add Subject Course</label>
                                                            <button type="button" data-toggle="modal" data-target="#add_subject" class="btn btn-block btn-info form-"><i class="fa fa-plus-square"></i> Add Subject</button>
                                                        </div>
                                                    </div>
                                                </div>  
                                            <div class="col-md-6"> 
                                                <h5 class="text-center">Course Information</h5>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label>Course <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="course" name="course" required="">
                                                            <option value="" selected>Select Course</option>
                                                            <?php
                                                                foreach ($listOfCourses as $course) {
                                                                    echo "<option value=".$course['id'].">".$course['course_title']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group col-6">
                                                        <label>Academic Year <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="ay" name="ay" required="">
                                                            <option value="" selected>Select Academic Year</option>
                                                            <?php
                                                                foreach ($academic_list as $ay) {
                                                                   if ($ay['status'] == '1') {
                                                                      echo "<option selected value=".$ay['id'].">".$ay['name']."</option>";
                                                                   }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div> 
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label>Curriculum Year <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="cy" name="cy" required="">
                                                            <option value="" selected>Select Curriculum Year</option>  
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label>Year <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="yearlevel" name="yearlevel" required="">
                                                            <option value="" selected>Select Year Level</option>
                                                            <?php
                                                                foreach ($yearlevel_list as $year) {
                                                                    echo "<option value=".$year['id'].">".$year['level']."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label>Semester <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="semester" name="semester" required="">
                                                            <option value="" selected>Select Semester</option>
                                                            <option value="1">First</option>
                                                            <option value="2">Second</option>
                                                        </select>
                                                    </div> 
                                                </div>  
                                            </div>
                                        </div>
                                         
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
                                            </table>  <br>

                                            <button type="button" name="enroll" class="btn btn-success rounded-0 btn-lg btn-block" id="enroll"><i class="fa fa-save"></i> Enroll Now</button>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>

<div class="modal fade" id="add_subject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content  rounded-0">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Custom Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-10">
               <input type="text" name="coursename" class="form-control" id="coursename" placeholder="Select Course" readonly="">
               <input type="text" name="courseid" class="form-control" id="courseid" placeholder="Select Course" hidden="">
            </div>
          </div>
           <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Curriculum Year</label>
            <div class="col-sm-10">
               <input type="text" name="cyname" class="form-control" id="cyname" placeholder="Select CY" readonly="">
               <input type="text" name="cyid" class="form-control" id="cyid" placeholder="Select CY" hidden="">
            </div>
          </div>
          <input type="text" name="searchsub" class="form-control mb-2" id="searchsub" placeholder="Search Subject">
            <table id="scr-vrt-dt_wrapper" class="table table-bordered">
               <thead class="text-center">
                    <th hidden="">#</th>
                    <th>Subject ID</th> 
                    <th class="w-25">Subject Code</th>
                    <th>Subject Name</th> 
                    <th>Unit</th> 
                    <th>Action</th> 
                </thead>
                <tbody id="cursubjects">
                    
                </tbody>
           </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  id="add_to_list" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
        <script src="../plugins/select2/dist/js/select2.min.js"></script>
        <!-- Modal -->
        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script src="../js/datatables.js"></script>  
        <script>
            

            $(document).ready(function(){
                $('.js-example-basic-single').select2();
                 $('#add_subject').on('shown.bs.modal', function () {
                    let coursename = $("#course option:selected").text();
                    let cyname = $("#cy option:selected").text();


                    let course = $("#course option:selected").val();
                    let cy = $("#cy option:selected").val();

                    $('#courseid').val(course);
                    $('#cyid').val(cy);
                    $('#coursename').val(coursename);
                    $('#cyname').val(cyname);

                    if ((!course) || (!cy)) {
                        $("#cursubjects").attr('disabled','disabled');
                    }else{
                        $('#cursubjects').removeAttr('disabled');
                    }
                    let loadcursujetcs = true;
                    // load subjects of curriculum id
                    $.ajax({
                        type: 'POST',
                        url: 'backend_require_subjects.php',
                        data: {course:course, cy:cy, loadcursujetcs:loadcursujetcs},
                        success:function(subjcets){
                            $('#cursubjects').html(subjcets);
                        }
                    });
                 });
                 
                /*
                Table Filter
                 */
                $('#searchsub').keyup(function() {
                    var value = $(this).val().toLowerCase();
                    $("#cursubjects tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                }); 
                // Remove Row
                $("#student_subject_table").on('click', '.remCF', function() {
                    $(this).parent().parent().remove();
                });

                $('#delete').click(function(){
                     $("#target").submit();                                      
                });

                $('.main-loader').hide();


                $('#search').on('keyup', function(){
                    let filter = $(this).val(); 
                    if (!filter) {
                        $('#student_result').hide();
                    }else{                        
                        $.ajax({
                            type: 'POST',
                            url: 'search_student.php',
                            data: {filter:filter},
                            success:function(html){
                                $('#student_result').show();
                                $('#student_result').html(html);
                            }
                        });
                    }
                }); 

                $
                $('#yearlevel, #course, #semester, #cy').on('change', function(){
                    let course = $('#course').val();
                    let year = $('#yearlevel').val();
                    let semester = $('#semester').val();
                    let cy = $('#cy').val();
                    // let ay = $('#ay').val();
                    console.log('course = '+course+ '\n' +
                      'year = '+year+ '\n' +
                      'semester = '+semester+ '\n' +
                      'cy = '+cy);
                    let subject = true;  // post validator
                        $.ajax({
                        type: 'POST',
                        url: 'backend_require_subjects.php',
                        data: {course:course, year:year, semester:semester, cy:cy,subject:subject},
                        success:function(html){
                            $('#result2').show();
                            $('#student_subject_table').html(html);                        
                        } 
                    }); 
                });
                // Clear Data
                $('.clear-text').on('click', function(){
                    $('#search').val("");
                    $('#student_id').val("");
                    $('#student_result').hide();
                });

                // submit form
                
                $('#enroll').on('click', function(){
                    // Form Data
                    let student_id = $('#student_id').val();
                    let course = $('#course').val();
                    let yearlevel = $('#yearlevel').val();
                    let semester = $('#semester').val();
                    let cy = $('#cy').val(); 
                    let ay = $('#ay').val();
                    let enroll = true;

                    // html table data               
                    let lastRowId = $('#table1 tr:last').attr("id"); /* finds id of the last row inside table */


                    let subject= new Array(); 
                    let name= new Array(); 
                    for ( let i = 1; i <= lastRowId; i++) {
                        subject.push($("#"+i+" .subject"+i).html()); 
                        name.push($("#"+i+" .name"+i).html()); 

                    }
                    let sendSubject = JSON.stringify(subject); //Array of prospectus ID
                    let sendName = JSON.stringify(name);  
                    if (!student_id || !course || !yearlevel || !semester || !cy) {                        
                       alert("Please Fill Required Inputs");
                    }else{
                         $.ajax({
                            type: 'POST',
                            url: 'perform_enrollment.php',
                            dataType: 'json',
                            data: { enroll:enroll, student_id:student_id, course:course,  yearlevel:yearlevel, semester:semester, cy:cy, ay:ay,  sendSubject:sendSubject }, 
                            success:function(data){  
                                if (data.result == 'error') {
                                    alert(data.msg);
                                    window.location = 'enrollment.php';                                    
                                }else{
                                    alert(data.msg);
                                    window.location = 'enrollment.php';
                                }
                            }
                        });
                    }
                });

                $('#course').on('change', function(){
                    let courseid = $('#course').val();
                    let cur_per_course = true;                   
                    $.ajax({
                        type : 'POST',
                        url: 'backend_curriculum.php',
                        data: {courseid:courseid},
                        success:function(data){
                            console.log(data);
                            $('#cy').html(data);
                        }
                    });
                });
            });
        </script>
        <style type="text/css">
            
        </style>
        <script type="text/javascript" src="test.js"></script>
         
    </body>
</html>
