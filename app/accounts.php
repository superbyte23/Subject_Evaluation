<?php 

require_once '../Library/User.php';
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
                                            <h5>Blank Table</h5>
                                            <span>List of blank table</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="create_user.php" class="btn btn-success"><i class="ik ik-plus"></i>Add New Account</a>
                                        <!-- <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Account(s)</button> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <table id="scr-vtr-dynamic"
                                                   class="table table-hover nowrap">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th>
                                                <!-- <th class="nosort">Avatar</th> -->
                                                <th>User Type</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach ($lists_users as $user) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value=""> 
                                                    </td>
                                                    <!-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> -->
                                                    <td><?php print(ucfirst($user['user_type'])); ?></td>
                                                    <td><?php print($user['user_name']); ?></td>
                                                    <td>
                                                        <?php if ($user['user_status'] == 'confirmed'): ?>
                                                            <a href="javascript:void(0)" class="btn btn-info">Active</a>
                                                        <?php else: ?>
                                                            <a href="confirm_user.php?id=<?php echo $user['user_id']; ?>" class="btn btn-warning">Confirm</a>
                                                        <?php endif ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <!-- <a href="#" data-toggle="modal" data-target="#student_info"  class="pl-2 text-info"><i class="ik ik-eye"></i></a> --> 
                                                        <a href="#" class="pl-2 text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="delete_account.php?id=<?php print($user['user_id']); ?>" class="pl-2 text-danger delete_account"><i class="ik ik-trash"></i></a>
                                                        
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
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../js/datatables.js"></script>
        <script>
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });

                $('.delete_account').click(function(){
                    return confirm('Are you sure?');
                });
            });
        </script>
    </body>
</html>
