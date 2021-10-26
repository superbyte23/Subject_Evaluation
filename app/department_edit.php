<?php
require_once '../Library/Department.php';
require_once 'layout/main.php';

if (isset($_SERVER['PHP_SELF'])) {
    if (isset($_POST['update'])) {
       if ($departments->department_update($_POST)) {
           header('location: departments.php');
       }else{
            $message = 'Theres a problem adding new student. Please try again';
       }
    }
}else{
    unset($message);
}
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
                                            <h5>Add Department </h5>
                                            <span>Add new department form</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a  href="departments.php" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="text" name="departmentid" value="<?php echo $department_info['id']; ?>" hidden>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="departmentname">Department Name</label>
                                                <input type="text" class="form-control" id="departmentname" placeholder="Department Name" name="departmentname" value="<?php echo $department_info['department_name'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="departmenthead">Department Head</label>
                                                <input type="text" class="form-control" id="departmenthead" placeholder="Department Head" name="departmenthead" value="<?php echo $department_info['department_head'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" rows="3" placeholder="Description" name="description" required=""><?php echo $department_info['description'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <button class="btn btn-success float-right" name="update" type="submit"><i class="ik ik-save"></i>Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once 'layout/footer.php'; ?>                
            </div>
        </div>

        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
    </body>
</html>
