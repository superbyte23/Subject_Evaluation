<?php
require_once '../Library/Department.php';
require_once '../Library/Course.php';

if (isset($_SERVER['PHP_SELF'])) {
    if (isset($_POST['update'])) {
       if ($course->course_update($_POST)) { 
           header('location: courses.php');
       }else{
            $message = 'Theres a problem updating course. Please try again';
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
                                            <h5>Update Course </h5>
                                            <span>update course form</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a  href="courses.php" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="text" name="courseid" value="<?php echo $course_info['id']; ?>" hidden>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Course Code</label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="code" placeholder="Course Code" name="code" required="" value="<?php echo $course_info['code']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="coursename">Course Name</label> <span class="text-danger">*</span>
                                                <input type="text" class="form-control" id="coursename" placeholder="Course Name" name="coursename"required="" value="<?php echo $course_info['course_title']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department">Department</label> <span class="text-danger">*</span>
                                                <select name="department" id="department" class="form-control" required="">
                                                    <option selected value="">Select Department</option>
                            <?php
                                foreach ($listOfDepartments as $department) {
                                    if ($department['id'] == $course_info['department_id']){
                                        echo '<option value="'.$department['id'].'" selected>'.$department['department_name'].'</option>'; 
                                    }else{
                                        echo '<option value="'.$department['id'].'">'.$department['department_name'].'</option>'; 
                                    }
                                }
                            ?>                  <option value="none">None</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Course Description</label> <span class="text-danger">*</span>
                                        <textarea class="form-control" id="description" rows="3" placeholder="Course Description" name="description" required=""><?php echo $course_info['course_desc']; ?></textarea>
                                    </div>
                                    <button name="update" class="btn btn-success float-right" type="submit"><i class="ik ik-save"></i>Update</button>
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
