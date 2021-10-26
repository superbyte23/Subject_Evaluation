<?php require_once 'layout/main.php'; require_once '../Library/Department.php';?>

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
                                            <h5>Departments Tables</h5>
                                            <span>List of Departments</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="department_add.php" class="btn btn-success"><i class="ik ik-plus"></i>Add Department</a>
                                        <!-- <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Department(s)</button> -->
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
                                                <th>Department Name</th>
                                                <th>Dept Head</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach ($listOfDepartments as $department) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value="<?php echo $department['id']; ?>"> 
                                                    </td>
                                                    <!-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> -->
                                                    <td><?php echo $department['department_name']; ?></td>
                                                    <td><?php echo $department['department_head']; ?></td>
                                                    <td><?php echo $department['description']; ?></td>
                                                    
                                                    <td class="text-center">
                                                        <a href="#"  class="text-info department_info" data-index="<?php echo $department['id']; ?>" data-toggle="modal" data-target="#department_info"><i class="ik ik-eye"></i></a>
                                                        <a href="department_edit.php?id=<?php echo $department['id'] ?>" class="text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="department_delete.php?id=<?php echo $department['id'] ?>" class="text-danger"><i class="ik ik-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
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
        <div class="modal fade edit-layout-modal" id="department_info" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="result"></div>
                </div>
            </div>
        </div>
        <?php include 'layout/menu_modal.php'; ?>        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../js/datatables.js"></script>
        <script>
            $(document).ready(function(){
                $('.department_info').on('click', function(){
                    let id = $(this).data('index');
                    let model = "department";
                    $.ajax({
                        type: 'POST',
                        url: 'backend_info.php',
                        data: {id:id, model:model},
                        success:function(html){
                            $('#result').html(html);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
