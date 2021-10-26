<?php
require_once '../Library/AcademicYear.php'; 

if (isset($_SERVER['PHP_SELF'])) {
    if (isset($_POST['save'])) {
       if ($academicyear->academicyear_add($_POST) == 1) {
           header('location: academicyear.php');
       }else{
            $message = 'Theres a problem adding new academic year. Please try again';
       }
    }
}else{
    unset($message);
}
require_once 'layout/main.php';  ?>

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
                                            <h5>Add Academic Year </h5>
                                            <span>Add new academic year form</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a  href="academicyear.php" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="name" placeholder="year-year" name="name" required="">
                                            </div>
                                        </div>                                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">Status</label> <span class="text-danger">*</span>
                                                <select id="status" name="status" class="form-control" required="">
                                                    <option selected="" value="">Select Status</option>
                                                    <option value="1">Open</option>
                                                    <option value="0">Close</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div> 
                                    <button name="save" class="btn btn-success float-right" type="submit"><i class="ik ik-save"></i>Save</button>
                                    
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

        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script>    
            <?php
                if (isset($message)) {
                    print('dangerAlert("'.$message.'");');                       
                }
            ?>
        </script> 
    </body>
</html>
