<?php
require_once '../Library/Enrollment.php';
require_once '../Library/Settings.php';
$sem = $settings->get_active_semester();
require_once 'layout/main.php'; 

?>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">                                                                              
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="widget">
                            <div class="widget-header bg-pink text-white">
                                <h3 class="widget-title"><i class="ik ik-command"></i> View Evaluation Details</h3>
                                <div class="widget-tools pull-right">
                                    <button type="button" class="text-white btn btn-widget-tool minimize-widget ik ik-plus"></button>
                                </div>
                            </div>
                            <div class="widget-body" style="">
                                <div class="dt-responsive">
                                    <form method="post" action="test" id="target">
                                        <div class=" col-12 scrollable scrollable_x"> 
                                        <table id="multi-colum-dt" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="nosort" width="10"> 
                                                            <input type="checkbox" id="selectall" name="check[]">
                                                    </th> 
                                                    <th>Name</th> 
                                                    <th>Course</th>
                                                    <th>Level</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
    $student_list = $enrollment->search_all();
    foreach ($student_list as $student) {
?>
    <tr>
        
        <td> 
            <input type="checkbox" class="select_all_child" id="" name="check[]" value="<?php echo $student['id']; ?>"> 
        </td> 
        <td>
            <a href="evaluation_details.php?stdid=<?php echo $student['id']; ?>" target="_blank"><?php echo $student['last_name'].', '.$student['first_name'].' '.$student['middle_name']; ?></a>
        </td>

        <td><?php echo $student['course_title']; ?></td>
        <td><?php echo $student['level']; ?></td> 
        <td class="text-center">
          
            <a href="#" data-toggle="modal" onclick="showGrades('<?php echo $student["id"]; ?>','<?php echo $student["cid"]; ?>','<?php echo $student["courseid"]; ?>','<?php echo $student["level"]; ?>','<?php echo $sem['id']; ?>');" data-target="#evaluation_details" data-index="<?php echo $student['id']; ?>"  class="text-info evaluation_details"><i class="ik ik-eye"></i> View Current Subjects</a>
        </td>
    </tr>
<?php
    }
?>
                                            </tbody>
                                        </table>
                                        </div>                               
                                    </form>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        
<div class="modal fade edit-layout-modal" id="evaluation_details" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">                        
                <div class="card-header bg-dark ">
                    <h3 class="font-weight-bold text-white"><i class="fa fa-book-open"></i> Subject(s) Information</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-1">               
                    <div class="table-responsive">                         
                        <table class="table table-bordered table-striped table-sm" id="subjects_table">
                            <thead class="">
                                <th hidden="">#</th>
                                <th>Subject ID</th> 
                                <th class="w-25">Subject Code</th>
                                <th>Subject Name</th>  
                            </thead>
                            <tbody class="" id="subject_table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php include 'layout/menu_modal.php'; ?> 
        <?php require_once 'default_js_script.php'; ?>
        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script src="../js/datatables.js"></script>
        <script>
            function showGrades(studentid,cid,courseid,level,semester){
              
                $(document).ready(function() {
                    $("#subjects_table tbody tr").remove();                    
                    let bool = true; 
                    $.ajax({
                        type: 'POST',
                        url: 'backend_enrollment_details.php',
                        // dataType: 'json',
                        data: {showsubject:bool, id:studentid, courseid:courseid, cid:cid, level:level, semester:semester},
                        success:function(subjects){  
                          $('#subject_table').html(subjects);
                        }
                    });
                });
            }
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
            });
        </script>
        <script>
            <?php
                if (isset($_GET)) {
                    if ($_GET['evaluation'] == 'success') {
                        echo 'successAlert("Successfully Evaluated")';
                    }else{
                        echo 'dangerAlert("Error in Process. Please Try Again")';
                    }
                }
            ?>
        </script>
    </body>
</html>
