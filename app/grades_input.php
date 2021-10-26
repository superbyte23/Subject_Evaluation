<?php 

require_once '../Library/Subject.php';
// require_once '../Library/Enrollment.php';
require_once '../Library/Student.php';
require_once 'layout/main.php'; 
?>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">                                                                              
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <!-- Editable table -->
                        <!-- <div class="card">
                          <div class="card-body"> -->
                            <h5><i class="ik ik-user"></i> <?php echo $student_info['last_name'].', '.$student_info['first_name'].' '.$student_info['middle_name']; ?></h5>
                            <h6><i class="ik ik-package"></i> <?php print($student_info['course_title'].' '.$student_info['year']); ?></h6>
                            <div id="table" class="table-editable"> 
                              <table class="table table-bordered table-responsive-md text-center table-hover bg-light"> 
                                <thead>
                                  <tr>
                                    <th class="text-center" hidden="">#</th>
                                    <th class="text-center w-10">ID</th> 
                                    <th class="text-center w-25">Subject Code</th>
                                    <th class="text-center">Subject Name</th> 
                                    <th class="text-center w-10">GWA <i class="ik ik-percent"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
<?php 
    // fOR ENROLLMENT mODULE oNLY
   $subjects = $subjects->student_subjects($_GET['id'],$_GET['courseid'],$_GET['level'],$_GET['cid'],$_GET['semester']);
    foreach ($subjects as $subj) {
       print('<tr>
                <td class="pt-3-half">'.$subj['id'].'</td>
                <td class="pt-3-half">'.$subj['subject_code'].'</td>
                <td class="pt-3-half">'.$subj['subject_title'].'</td>
                <td class="pt-3-half grade" contenteditable="true" data-index="'.$subj['id'].'">'.$subj['gwa'].'</td> 
              </tr>');
    }
?>
<?php
// require_once '../Library/Grades.php'; 
// // $subjects = $subjects->list_subject_curriculum_level($_GET['cid'], $_GET['level'], $_GET['semester']);
// $submitted_grades = $grade->submitted_grades($_GET['id'], $_GET['cid'], $_GET['courseid'], $_GET['level'], $_GET['semester']);
// if ($submitted_grades->rowCount() > 0) { 
//     $t = null;
//    foreach ($submitted_grades as $sg) {

//        print('<tr>
//             <td class="pt-3-half">'.$sg['id'].'</td>
//             <td class="pt-3-half">'.$sg['subject_code'].'</td>
//             <td class="pt-3-half">'.$sg['subject_title'].'</td>
//             <td class="pt-3-half grade" onkeypress="return isNumberKey(event)" contenteditable="true" data-index="'.$sg['stud_subject_id'].'">'.$sg['gwa'].'</td> 
//           </tr>');   

//        $t .= ",".$sg['stud_subject_id'];
//     } 
// $std_grades = $grade->for_submit($_GET['id'],$_GET['cid'], $_GET['level'], $_GET['semester'], $t);
// }else{

// $std_grades = $grade->fresh_grades($_GET['id'],$_GET['cid'], $_GET['level'], $_GET['semester']);    
// }
// foreach ($std_grades as $subj) {
// print('<tr>
//         <td class="pt-3-half">'.$subj['id'].'</td>
//         <td class="pt-3-half">'.$subj['subject_code'].'</td>
//         <td class="pt-3-half">'.$subj['subject_title'].'</td>
//         <td class="pt-3-half grade" onkeypress="return isNumberKey(event)" contenteditable="true" data-index="'.$subj['pid'].'">'.$subj['gwa'].'</td> 
//       </tr>');
// }
?>
                                  
                                  <!-- This is our clonable table line --> 
                                </tbody>
                              </table>
                            </div>
                            <!-- <div class="float-right">
                                <button class="btn btn-success"><i class="ik ik-check"></i> Submit Grades</button>
                                <button class="btn btn-danger"><i class="ik ik-cancel"></i> Cancel</button>
                            </div> -->
                          <!-- </div>
                        </div>  -->
                        <!-- Editable table -->
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?> 
        <?php require_once 'default_js_script.php'; ?>
        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script src="../js/datatables.js"></script>
        <link rel="stylesheet" href="../plugins/select2/dist/css/select2.min.css">
        <script src="../plugins/select2/dist/js/select2.min.js"></script>

        <script src="../js/custom_alert.js"></script>

        <script>
            function isNumberKey(evt)
               {
                  var charCode = (evt.which) ? evt.which : evt.keyCode;
                  if (charCode != 46 && charCode > 31 
                    && (charCode < 48 || charCode > 57))
                     return false;

                  return true;
               }
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
                $('#table td:last-child').each(function () {
                    if (Number($(this).text()) <= '74') {
                        $(this).css('backgroundColor', '#F50057');
                    }else{
                        $(this).css({"background-color": "#4CAF50", "color": "#ffffff"});
                    }
                });

                $('.grade').on('click', function(){
                    $(this).css({"background-color": "#F50057", "color": "#ffffff"});
                });
                $('.grade').keypress(function (e) {

                 var key = e.which; 
                 if(key == 13)  // the enter key code
                  {
                    let id = $(this).data('index');
                    let string_grade = $(this).html();
                    let student_id = <?php print $_GET['id']; ?>;
                    let cid =  <?php print $_GET['cid']; ?>;
                    let courseid = <?php print $_GET['courseid']; ?>;
                    let semester = <?php print $_GET['semester']; ?>;
                    let level = <?php print $_GET['level']; ?>;
                    // var grade_num =string_grade.replace(/\D/g,'');
                    let grade_num = parseFloat(string_grade);
                    let grade = Number(grade_num);
                    console.log(grade);

                    if (grade > 100 || grade < 0 || !grade) {
                        dangerAlert("Invalid Grade");
                        $(this).html("");
                    }else{
                       
                        // console.log(id +':'+grade); 
                        $.ajax({
                            type: 'POST',
                            url: 'backend_submit_grade.php',
                            data:{grade:grade, id:id, student_id:student_id, cid:cid, courseid:courseid, semester:semester, level:level, submit:true},
                            success:function(result){
                                console.log(result);
                                successAlert(result);                                
                            }
                        });
                        $(this).css({"background-color": "#4CAF50", "color": "#ffffff"});
                    }
                    return false;
                  }
                }); 
                
                // $('.grade').focusout(function () {
                    
                //     if (grade) {
                //         warningAlert("Please Press Enter");
                //         $(this).focus();
                //         return false;
                //     }
                    
                // }); 
            });
        </script>
    </body>
</html>
