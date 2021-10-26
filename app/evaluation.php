<?php 

// require_once '../Library/AcademicYear.php';
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
                                <div class="card-header bg-purple"><h3 class=" text-white"><i class="ik ik-user"></i> Student Evaluation Form</h3></div>
                                <div class="card-body">
                                    <form class="forms-sample">
                                        <div class="row">                                           
                                            <div class="form-group col-md-12">
                                                <h5>Search Student : Student ID / Name</h5>
                                                <input type="text" name="" class="form-control form-control-lg rounded-0" id="search" placeholder="Search Student" autocomplete="off" style="font-size: 1.2rem;">
                                                <input type="text" name="student_id" id="student_id" hidden="">
                                                <div id="student_result" class="list-group " >
                                                    
                                                </div>
                                            </div>                                           
                                        </div>
                                        <div id="result2">
                                            <div class="main-loader">
                                              <div class="loader"></div>
                                            </div>
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
        
<!-- Prospectus Review -->
<div class="modal fade edit-layout-modal" id="ShowProspectus" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-header bg-dark ">
                    <h3 class="font-weight-bold text-white"><i class="fa fa-book-open"></i> Prospectus Information</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-1">
                    <div class="p-2 bg-info text-white text-center"><i class="fa fa-clipboard-list"></i> First semester</div>
                    <table id="prospectus_table1" class="table table-striped table-bordered w-100">
                        <thead>
                            <th>Id</th>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Prerequisite</th>
                            <th>Units</th>
                        </thead>
                        <tbody id="first">
                            
                        </tbody> 
                    </table>

                    <div class="p-2 bg-info text-white text-center"><i class="fa fa-clipboard-list"></i> Second semester</div>
                    <table id="prospectus_table2" class="table table-striped table-bordered w-100">
                        <thead>
                            <th>Id</th>
                            <th>Subject Code</th>
                            <th>Subject Title</th>
                            <th>Prerequisite</th>
                            <th>Units</th>
                        </thead>
                        <tbody id="first">
                            
                        </tbody> 
                    </table>
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
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                   
                });
                $('.main-loader').hide();
                $('#search').on('keyup', function(){
                    let filter = $(this).val();
                    let search = "list_enrolled";
                    if (!filter) {
                        $('#student_result').hide();
                    }else{
                        $.ajax({
                            type: 'POST',
                            url: 'backend_search_student.php',
                            data: {filter:filter, search:search},
                            success:function(html){
                                $('#student_result').show();
                                $('#student_result').html(html);
                            }
                        });
                    }
                }); 
            });
        </script> 
        <script type="text/javascript" src="test.js"></script>         
    </body>
</html>
