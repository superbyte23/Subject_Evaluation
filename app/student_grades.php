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
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="ik ik-credit-card bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Academic Year Tables</h5>
                                            <span>List of Academic Year</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="academicyear_add.php" class="btn btn-success"><i class="ik ik-plus"></i>Add Student</a>
                                        <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Student(s)</button>
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
                                                <!-- <th class="nosort">Avatar</th> -->
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                // foreach ($academic_list as $academic) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value=""> 
                                                    </td>
                                                    <!-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> -->
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#student_info"  class="pl-2 text-info"><i class="ik ik-eye"></i></a>
                                                        <a href="#" class="pl-2 text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="#" class="pl-2 text-danger"><i class="ik ik-trash"></i></a>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                                // }
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
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../js/datatables.js"></script>
        <script>
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
            });
        </script>
    </body>
</html>
