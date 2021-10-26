<?php 
require_once '../Library/Student.php'; 
if (isset($_POST['filter'])) {
     $results =  $students->search_student($_POST['filter']);
     if ($results->rowCount() > 0) {
        foreach ($results as $row) {
            echo('<a href="javascript:void(0)" class="list-group-item list-group-item-action rounded-0 student" id="student" data-index="'.$row['id'].'" style="position: relative;">'.$row["last_name"].', '.$row['first_name'].' '.$row['middle_name'].'</a>  ');

            // echo('<a href="evaluation_details.php?studentid='.$row['id'].'" target="_blank" class="list-group-item list-group-item-action rounded-0">'.$row["last_name"].', '.$row['first_name'].' '.$row['middle_name'].'</a>  ');

         }
     }else{
        echo '<p>No result(s) found</p>';
     }
}elseif (isset($_POST['id'])) {
    
    require_once '../Library/Settings.php';

    require_once '../Library/NumtoWords.php';



    $counter = 0; // use to count number of failed subjects
    $units = 0; 
    $string = ""; // use to filter current subjects
    $filter = ""; // use to filter finished subjects
    $filter_failed = ""; // use to filter failed subjects
    $n = 0; // use for increment for table tr
    $semester = $settings->get_active_semester(); 
    $cursem = $semester['id'];
    $results =  $students->student_curriculum_details($_POST['id']);
    require_once '../Library/Prospectus.php';
    if ($results->rowCount() > 0) {
    foreach ($results as $row) {
    $id = $row['id']; 
    $course = $row['course_title'];
    $courseid = $row['courseid'];
    $yearlevel = $row['year'];
    $academic_year_id = $row['academic_year_id'];
    $ay = $row['AY'];
    $curlvl_id = $row['curlvl_id']; 
    $cid = $row['cid'];

   
}

$button = '<a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" id="showprospectusID" data-target="#ShowProspectus"><i class="fa fa-eye"></i> Show Prospectus</a>
<a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#ReviewFailedSubjects"><i class="fa fa-times"></i> Review Failed Subjects</a>
<a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#add_custom_subjects"><i class="fa fa-plus"></i> Add Subjects</a>
<button type="submit" name="enroll" data-toggle="modal" id="enroll" data-target="#confirmation" class="btn btn-success"><i class="fa fa-check"></i> Approve Subjects</button>';
                          

            ?>
                <div class="main-loader" style="display: none;">
                  <div class="loader"></div>
                </div>
                <div class="row">

                    <div class="col-12">
                    <!-- form start    -->
                    <!-- <form action="perform_enrollment.php" method="POST"> -->
                    <form action="perform_enrollment.php" method="POST" id="perform_enrollment">
                        <!-- START ROW -->
                        <div class="row">
                            <div class="form-group col">
                                <label>Student ID</label>
                                <input type="text" name="student_id" class="form-control rounded-0" readonly="" id="studentid" value="<?php echo $id; ?>"> 
                            </div>
                             <!-- For testing hide this as default -->
                            <div class="form-group col" hidden="">
                                <label>Academic Year</label>
                                <input type="text" class="form-control rounded-0" name="academic_year_id" id="academic_year_id" value="<?php echo $academic_year_id; ?>" />
                            </div>

                            <div class="form-group col" hidden="">
                                <label>curriculum ID</label>
                                <input type="text" class="form-control rounded-0" name="cid" id="cid" value="<?php echo $cid; ?>">
                            </div>
                            <div class="form-group col" hidden="">
                                <label>Course ID</label>
                                <input type="text" class="form-control rounded-0" name="courseid" id="courseid" value="<?php echo $courseid; ?>">
                            </div>
                            <div class="form-group col"  hidden="">
                                <label>Current Sem</label>
                                <input type="text" class="form-control rounded-0" name="semester" id="semester" value="<?php echo $cursem; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Year Level</label>
                                <input type="text" class="form-control rounded-0" readonly="" name="yearlevel" id="yearlevel" value="<?php echo $yearlevel; ?>"> 
                            </div> 
                            <div class="form-group col" hidden="">
                                <label>Curriculum Level ID</label>
                                <input type="text" class="form-control rounded-0" name="curlvl_id" id="curlvl_id" value="<?php echo $curlvl_id; ?>">
                            </div>

                            <!-- End For testing hide this as default -->
                            <div class="form-group col">
                                <label>Course</label>
                                <input type="text" name="" class="form-control rounded-0" readonly="" value="<?php echo $course; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Curriculum</label>
                                <input type="text" name="" class="form-control rounded-0" readonly="" value="<?php echo $ay; ?>">
                            </div>
                        </div>
                        <!-- END ROW -->
                        <h4>Review of list of Subjects</h4>
                        <nav class="nav nav-tabs" id="myTab" role="tablist">
                          <a class="nav-item nav-link active bg-dark text-white btn-block" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo ucfirst(numberTowords($cursem)); ?> Semester (Current)</a>                         
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                <table class="table table-bordered table-hover table-sm mb-0" border="1" id="table1">
                                    <thead class="text-left">
                                        <th style="width: 20px;">Subject ID</th>
                                        <th class="w-25">Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Prerequisite</th>
                                        <th>Units</th>  
                                        <th width="100px">Action</th>
                                    </thead>
                                    <tbody class="text-left" id="student_subject_table" >
    <?php  
        require_once '../Library/Subject.php';

        $subjects = $subjects->student_subjects($id,$courseid,$yearlevel,$cid,$cursem);

        if ($subjects->rowCount() > 0) { // list of approved subjects in current semester

            /**
             * Approved Table
             */

            $button = '<a href="javascript:void(0)" class="btn btn-block btn-danger" id="approved"><i class="fa fa-check"></i> Approved</a>';
            $n = 0;
              foreach ($subjects as $subj) {
                $units += $subj['units'];
                $n++;
                print '<tr valign="top" id="'.$n.'">
                    <td hidden>'.$n.'</td>
                    <td class="subject'.$n.'">'.$subj["id"].'</td>
                    <td>'.$subj["subject_code"].'</td>
                    <td class="name'.$n.'">'.$subj["subject_title"].'</td>
                    <td class="name'.$n.'">'.$subj["prerequisite"].'</td>
                    <td  class="name'.$n.'">'.$subj["units"].'</td> 
                    <td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center disabled">Remove <i class="fa fa-trash"></i></a></td>
                </tr>';
            }
        } // end if statemant                            

        else // perform approve form
        {
            /**
             * For Approval Table
             */
        require_once '../Library/Prospectus.php';
        require_once '../Library/Grades.php'; 

        $failed_subjects = $grade->failed_subjects($id);

        $counter = $failed_subjects->rowCount();   
       
        foreach ($failed_subjects as $failed) {
            $filter_failed .= "|".$failed['subject_code'];
        }

        if ($counter > 0) {
            $listofsubjects = $prospectus->prospectus_per_course_flteredByFailedSubjects($id,$curlvl_id,$filter_failed);  
            foreach ($listofsubjects as $ls) {
                 if ($ls['semester'] == $cursem) {
                    $units += $ls['units'];
                    $n++;
                    $string .= ",".$ls['pid'];
                    print '<tr valign="top" id="'.$n.'" class="to_be">
                        <td hidden>'.$n.'</td>
                        <td style="width: 20px;" class="subject'.$n.'"><input type="text" name="subjectsID[]" class="subjectId form-control d-block bg-white text-center border-0" readonly="" value="'.$ls["pid"].'" /></td>
                        <td>'.$ls["subject_code"].'</td>
                        <td  class="name'.$n.'">'.$ls["subject_title"].'</td>
                        <td  class="name'.$n.'">'.$ls["prerequisite"].'</td> 
                        <td  class="name'.$n.'">'.$ls["units"].'</td> 
                        <td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center">Remove <i class="fa fa-trash"></i></a></td>
                    </tr>';    
                }// end if statemt      
            } 
        }else{
            $listofsubjects = $prospectus->prospectus_per_course($id,$curlvl_id);  
            foreach ($listofsubjects as $ls) {
                 if ($ls['semester'] == $cursem) {
                    $units += $ls['units'];

                    $n++;
                    $string .= ",".$ls['pid'];
                    print '<tr valign="top" id="'.$n.'" class="to_be">
                        <td hidden>'.$n.'</td>
                        <td style="width: 20px;" class="subject'.$n.'"><input type="text" name="subjectsID[]" class="subjectId form-control d-block bg-white text-center border-0" readonly="" value="'.$ls["pid"].'" /></td>
                        <td>'.$ls["subject_code"].'</td>
                        <td  class="name'.$n.'">'.$ls["subject_title"].'</td>
                        <td  class="name'.$n.'">'.$ls["prerequisite"].'</td> 
                        <td  class="name'.$n.'">'.$ls["units"].'</td> 
                        <td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center">Remove <i class="fa fa-trash"></i></a></td>
                    </tr>';    
                }// end if statemt      
            } 
        }
    } 
?>
                                    </tbody> 
                                </table> 

                                    <div class="row py-2" style="font-size: 15px;" >
                                        <div class="col text-left">Total number of failed subjects : <span class="text-danger font-weight-bold"><?php echo $counter; ?></span></div>
                                        <div class="col text-right">Total Units : <span class="text-danger font-weight-bold" id="units_count"><?php echo $units; ?></span></div>                                       
                                    </div> 
                            <?php echo $button; ?>
                            </div> 
                        </div>


                    </form>
                <!-- end form -->

                   </div>
               </div>

<!-- Modal Add Custom Subjects -->
<div class="modal fade" id="add_custom_subjects" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content  rounded-0"> 
            <div class="card rounded-0">
                <div class="card-header bg-dark rounded-0">
                    <h3 class="text-white"><i class="fa fa-search"></i> Search Subjects</h3>
                </div>
                <div class="card-body table-responsive ">           
                    <!-- <input type="text" name="" id="search_for_subjects" class="form-control rounded-0" placeholder="Search Subjects"> 
                    <div id="tree" style="max-height: 300px; overflow-x: hidden;">
                        
                    </div>  -->

                    <input type="text" name="filters" id="filters" class="form-control  rounded-0" placeholder="search curriculum subjects" />
                    <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap table-sm">
                        <br>
                        <thead class="text-left">
                            <th>Subject ID</th>
                            <th class="w-25">Subject Code</th>
                            <th class="w-75">Subject Name</th>
                            <th>Units</th>
                            <th>Prerequisite</th>
                            <th class="w-25">Action</th>
                        </thead>
                        <tbody id="table_cur_subjects">
                            <?php
                                
                                if ($subjects->rowCount() > 0) {
                                   $filter = "";                                
                                    $finish_subjects = $grade->finish_subjects($id);
                                    foreach ($finish_subjects as $fs) {
                                        // filter subjects already taken
                                        $filter .= ",".$fs['pid'];                                   
                                    }

                                    // var string is current subjects
                                    // var filter is finsihed subjects
                                    // pass this two variable as parameters to retrieve subject that can be added to the student subjects module.

                                    $prospectus_per_curriculum = $prospectus->prospectus_per_curriculum_for_add($cid, $string, $filter);
                                    foreach ($prospectus_per_curriculum as $ppc) {
                                       if ($ppc['semester'] == $cursem) {
                                            print('<tr class="">
                                                <td>'.$ppc['pid'].'</td>
                                                <td>'.$ppc['subject_code'].'</td>
                                                <td>'.$ppc['subject_desc'].'</td>
                                                <td>'.$ppc['units'].'</td>
                                                <td>'.$ppc['prerequisite'].'</td>
                                                <td>
                                                <a href="javascript:void(0)" data-index="'.$ppc['pid'].'" class="btn btn-success add_this">Add <i class="ik ik-plus"></i></a></td>
                                              </tr>');
                                       }
                                    }
                                }else{
                                    $prospectus_per_curriculum = $prospectus->prospectus_per_curriculum_filtered($cid, $string);
                                    foreach ($prospectus_per_curriculum as $ppc) {
                                       if ($ppc['semester'] == $cursem) {
                                            print('<tr class="">
                                                <td>'.$ppc['pid'].'</td>
                                                <td>'.$ppc['subject_code'].'</td>
                                                <td>'.$ppc['subject_desc'].'</td>
                                                <td>'.$ppc['units'].'</td>
                                                <td>'.$ppc['prerequisite'].'</td>
                                                <td>
                                                <a href="javascript:void(0)" data-index="'.$ppc['pid'].'" class="btn btn-success add_this">Add <i class="ik ik-plus"></i></a></td>
                                              </tr>');
                                       }
                                    }
                                }
                                
                            ?>
                        </tbody>
                    </table>
                   
                </div> 
                <!-- end Card Body -->
            </div>
            <!--/.Card--> 
        </div>
    </div>
</div>
<!-- Modal Review Failed Subjects -->
<div class="modal fade" id="ReviewFailedSubjects" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content  rounded-0"> 
            <div class="card rounded-0">
                <div class="card-header bg-dark rounded-0">
                    <h3 class="text-white"><i class="fa fa-search"></i> Failed Subjects</h3>
                </div>
                <div class="card-body table-responsive "> 
                    <table id="failed_subjects_table1" class="table table-striped table-bordered nowrap table-sm">          
                        <thead class="text-left">
                            <th>Subject ID</th>
                            <th class="w-25">Subject Code</th>
                            <th class="w-75">Subject Name</th>
                            <th>Units</th>
                            <th>Prerequisite</th>
                            <th class="w-25">Action</th>
                        </thead>
                        <tbody id="failed_subjects_table" class="text-danger">
                            <?php
                             $failedSubjects = $grade->failed_subjects($id);
                             foreach ($failedSubjects as $fl) {
                                print('<tr class="text-danger">
                                        <td>'.$fl['pid'].'</td>
                                        <td>'.$fl['subject_code'].'</td>
                                        <td>'.$fl['subject_desc'].'</td>
                                        <td>'.$fl['units'].'</td>
                                        <td>'.$fl['prerequisite'].'</td>
                                        <td>
                                        <a href="javascript:void(0)" data-index="'.$fl['pid'].'" class="btn btn-success add_this">Add <i class="ik ik-plus"></i></a></td>
                                        </td>
                                      </tr>');
                            } ?>
                        </tbody>
                    </table>
                   
                </div> 
                <!-- end Card Body -->
            </div>
            <!--/.Card--> 
        </div>
    </div>
</div>
 
   <div class="modal fade" id="confirmation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content  rounded-0"> 
                <div class="card rounded-0">
                    <div class="card-header bg-dark rounded-0">
                        <h3 class="text-white"><i class="ik ik-alert-triangle"></i> Confirm User Authentication</h3>
                    </div>
                    <div class="card-body">
                    <div class="form-group">                        
                        <label for="passwordConfirmation">Enter Administrator Password</label>

                        <div class="input-group">
                            <input type="password" id="passwordConfirmation" class="form-control text-center" placeholder="Enter User Password">
                            <span class="input-group-append">
                                <button type="button" id="toggle_eye" class="input-group-text bg-light"><i class="ik ik-eye"></i></button>
                            </span>
                        </div>
                    </div>                    
                    </div>  
                </div> 
            </div>
        </div>
    </div>
<?php
    } 
}
// elseif (isset($_POST['subid'])) { 
// }
?>
<script>
    $(document).ready(function(){
        // Add Subjects for Evaluation
        $("#table_cur_subjects").on('click', '.add_this', function() {
            // Get Subject Information for Append
            let subId = $(this).parents("tr").children("td").eq(0).text();
            let subCode = $(this).parents("tr").children("td").eq(1).text();
            let subName = $(this).parents("tr").children("td").eq(2).text();
            let subUnits = parseInt($(this).parents("tr").children("td").eq(3).text());            
            let subPre = $(this).parents("tr").children("td").eq(4).text();
            // Get the last Id of row of Evaluation Subjects
            let lastRowId = $('#table1 tr:last').attr("id"); /* finds id of the last row inside table */

            let lastid = 0;
                        // Last ID increment with 1
            if (lastRowId >= 1 || lastRowId != null) {
                lastid = parseInt(lastRowId) + 1;
            }else{
                lastid = 1;
            }

            // Append to Subjects for Evaluation
            $('#table1 tbody').append('<tr valign="top" id="'+lastid+'" class="to_be"><td hidden>'+lastid+'</td><td style="width: 20px;" class="subject'+lastid+'"><input type="text" name="subjectsID[]" class="subjectId form-control d-block bg-white text-center border-0" readonly="" value="'+subId+'" /></td><td>'+subCode+'</td><td>'+subName+'</td><td>'+subPre+'</td><td>'+subUnits+'</td><td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center">Remove <i class="fa fa-trash"></i></a></td></tr>');

            let total_unit = parseInt($('#units_count').html());

            $('#units_count').html(total_unit+subUnits);

            // alert(subId+','+subCode+','+subName+','+subUnits);
            $(this).parents("tr").remove();            
        });
        // Add Failed Subjects for Evaluation
        $("#failed_subjects_table").on('click', '.add_this', function() {
            // Get Subject Information for Append
            let subId = $(this).parents("tr").children("td").eq(0).text();
            let subCode = $(this).parents("tr").children("td").eq(1).text();
            let subName = $(this).parents("tr").children("td").eq(2).text();
            let subUnits = parseInt($(this).parents("tr").children("td").eq(3).text());            
            let subPre = $(this).parents("tr").children("td").eq(4).text();
            // Get the last Id of row of Evaluation Subjects
            let lastRowId = $('#table1 tr:last').attr("id"); /* finds id of the last row inside table */

            let lastid = 0;
                        // Last ID increment with 1
            if (lastRowId >= 1 || lastRowId != null) {
                lastid = parseInt(lastRowId) + 1;
            }else{
                lastid = 1;
            }

            // Append to Subjects for Evaluation
            $('#table1 tbody').append('<tr valign="top" id="'+lastid+'" class="sub_failed"><td hidden>'+lastid+'</td><td style="width: 20px;" class="subject'+lastid+'"><input type="text" name="subjectsID[]" class="subjectId form-control d-block bg-white text-center border-0" readonly="" value="'+subId+'" /></td><td>'+subCode+'</td><td>'+subName+'</td><td>'+subPre+'</td><td>'+subUnits+'</td><td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center">Remove <i class="fa fa-trash"></i></a></td></tr>');

            let total_unit = parseInt($('#units_count').html());

            $('#units_count').html(total_unit+subUnits);

            // alert(subId+','+subCode+','+subName+','+subUnits);
            $(this).parents("tr").remove();            
        });

        $('.student').on('click', function(){
            $('#student_result').hide();
            $('#search').val($(this).html());

            let id = $(this).data('index'); 
            $.ajax({
                type: 'POST',
                url: 'backend_search_student.php',
                data: {id:id}, 
                success:function(data){
                   $('.main-loader').show();        
                    setTimeout(function(){
                        $('.main-loader').hide();
                        $('#result2').html(data);
                    }, 1000); 
                    
                }
            });
        }); 

        $('#filters').keyup(function() {
            var value = $(this).val().toLowerCase();
            $("#table_cur_subjects tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }); 

        $("#student_subject_table").on('click', '.remCF', function() {
            // alert($(this).parents("tr").children("td").eq(1).text());
            let tr_class = $(this).closest("tr").attr("class"); 
            let subID = $(this).closest("tr").find('td:eq(1) .subjectId').val();
            let sub_Codes = $(this).closest("tr").find('td:eq(2)').text();
            let sub_name = $(this).closest("tr").find('td:eq(3)').text();
            let sub_prereq = $(this).closest("tr").find('td:eq(4)').text();
            let sub_units = parseInt($(this).closest("tr").find('td:eq(5)').text());

            
            let markup = '<tr class=""><td>'+ subID +'</td><td>'+ sub_Codes +'</td><td>'+ sub_name +'</td><td>'+sub_units+'</td><td>'+sub_prereq+'</td> <td> <a href="javascript:void(0)" data-index="'+subID+'" class="btn btn-success add_this">Add <i class="ik ik-plus"></i></a></td> </tr>'; 
            // Append to Subjects for Evaluation
            if (tr_class == 'to_be') {
                 $('#scr-vtr-dynamic tbody').append(markup);
             }else{
                 $('#failed_subjects_table1 tbody').append(markup);
             }

            let total_unit = parseInt($('#units_count').html());

            $('#units_count').html(total_unit-sub_units);

            $(this).parent().parent().remove(); 
        });


        $('#showprospectusID').unbind().bind('click', function () {

            let cid = $('#cid').val();
            let clid = $('#curlvl_id').val();
            let show = true;
            $.ajax({
                type: 'POST',
                url: 'backend_prospectus_details.php',
                dataType: 'json',
                data: {show:show,cid:cid,clid:clid},
                success:function(subjects){
                    $('#prospectus_table1 tbody').empty();
                    $('#prospectus_table2 tbody').empty();
                    $.each(subjects, function(index,value) {
                        if (value.semester == 1) {

                            $('#prospectus_table1 tbody').append('<tr valign="top"><td>'+value.subject_id+'</td><td>'+value.subject_code+'</td><td>'+value.subject_title+'</td><td>'+value.prerequisite+'</td><td>'+value.units+'</td></tr>');
                        }else{
                            $('#prospectus_table2 tbody').append('<tr valign="top"><td>'+value.subject_id+'</td><td>'+value.subject_code+'</td><td>'+value.subject_title+'</td><td>'+value.prerequisite+'</td><td>'+value.units+'</td></tr>');
                        }
                    });
                }
            }); 
        });

        $('#toggle_eye').on('click', function(){
            $('.ik-eye').toggleClass('ik-eye-off');
            let eye = $("#passwordConfirmation").attr("type");
            if (eye == 'password') {
                $("#passwordConfirmation").attr({'type':'text'});
            }else{
                $("#passwordConfirmation").attr({'type':'password'});
            }
        });
 
        $('#perform_enrollment').submit(function (e) {
            e.preventDefault(); 

            var form = this;
           $('#passwordConfirmation').keypress(function(event){           

            var keycode = (event.keyCode ? event.keyCode : event.which);
            let adminPassword = $(this).val();
                if(keycode == '13'){ 
                    $.ajax({
                        type: 'POST',
                        url: 'confirm_user.php',
                        data: {adminPassword: adminPassword},
                        cache: false
                    }).done(function(result) {

                        if (result == 1) { 
                            form.submit();
                        }else{

                            alert("Invalid Password");
                        }
                    }).fail(function(){
                        alert("Error in Database. Contact System Administrator.");
                    });
                }
            });
        }); 
    }); 
</script>
<script type="text/javascript" src="test.js"></script>