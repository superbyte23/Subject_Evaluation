<?php 

require_once '../Library/Settings.php';
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
                                            <h5>School Settings</h5> 
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4>Semester</h4>
                                <div class="form-group">
                                    <label for="semester">Set Active Semester</label>
                                        <select name="semester" id="semester" class="form-control">
                                    <?php 
                                        foreach ($semesters as $semester) {
                                           if ($semester['status'] == 1) {
                                            print('<option value="'.$semester["id"].'" selected>'.$semester["semester_name"].'</option>'); 
                                           }else{
                                            print('<option value="'.$semester["id"].'">'.$semester["semester_name"].'</option>'); 
                                           }
                                        }  
                                    ?> 
                                    </select>
                                </div>                                
                            </div>
                        </div>
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
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
                $('#semester').on('change', function(){
                    let semester = $('#semester').val();
                    $.ajax({
                        type : 'POST',
                        url: 'backend_settings.php',
                        data: {semester:semester},
                        success:function(data){ 
                            if (data == 0){
                                dangerAlert("Error! Contact Administrator");  
                            }else{
                                successAlert(data);
                            }
                        } 
                    });
                });
            });
        </script>
    </body>
</html>
