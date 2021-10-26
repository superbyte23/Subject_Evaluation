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

                        <div class="card">
                            <div class="card-header row">
                                <div class="col col-sm-3">
                                    <div class="card-options d-inline-block">
                                        <a href="#"><i class="ik ik-inbox"></i></a>
                                        <a href="#"><i class="ik ik-plus"></i></a>
                                        <a href="#"><i class="ik ik-rotate-cw"></i></a>
                                        <div class="dropdown d-inline-block">
                                            <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">More Action</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6">
                                    <div class="card-search with-adv-search dropdown">
                                        <form action="">
                                            <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required>
                                            <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                            <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Position" data-column="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Office" data-column="2">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Age" data-column="3">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Start date" data-column="4">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control column_filter" id="col5_filter" placeholder="Salary" data-column="5">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-theme">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col col-sm-3">
                                    <div class="card-options text-right">
                                        <span class="mr-5" id="top">1 - 50 of 2,500</span>
                                        <a href="#"><i class="ik ik-chevron-left"></i></a>
                                        <a href="#"><i class="ik ik-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="advanced_table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="nosort" width="10">
                                                <label class="custom-control custom-checkbox m-0">
                                                    <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </th>
                                            <th class="nosort">Avatar</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $student_list = $enrollment->search_all();
                                                foreach ($student_list as $student) {
                                            ?>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            <td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td> 
                                        </tr>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>
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
                        <table class="table table-bordered table-striped" id="subjects_table">
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
        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script src="../js/datatables.js"></script>
        <script>
            function showGrades(studentid,cid,courseid,level,semester){
              
                $(document).ready(function() {
                    $("#subjects_table tbody tr").remove();                    
                    let bool = true;
                    console.log(studentid);
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
