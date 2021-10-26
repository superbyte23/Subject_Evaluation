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
                        <div class="card">
                            <div class="card-header bg-purple ">
                                <h3 class="text-white">View Evaluation Details</h3>
                            </div>
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <div class=" col-12 scrollable scrollable_x">
                                    <!-- id="scr-vtr-dynamic" -->
                                    <table 

                                                   class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th>
                                                <!-- <th class="nosort">Avatar</th> -->
                                                <th>Name</th> 
                                                <th>Course</th>
                                                <th>Level</th> 
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                    <div class="table-responsive">                         
                        <table class="table table-bordered" id="subjects_table">
                            <thead class="text-center">
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


        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
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
                            console.log(semester);
                            console.table(subjects);
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
    </body>
</html>
