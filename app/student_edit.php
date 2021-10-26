<?php
require_once '../Library/Student.php'; // for add user
require_once '../Library/Course.php'; // for populate course

require_once 'layout/main.php';

if (isset($_SERVER['PHP_SELF'])) {
    if (isset($_POST['update'])) {
       if ($students->student_update($_POST)) { 
           echo "<script>window.location = 'students.php';</script>";
       }else{
            $_SESSION['msg'] = 'Theres a problem updating student. Please try again';
       }
    }
}else{
    unset($_SESSION['msg']);
}

if (isset($_GET['view'])) {
    if ($_GET['view'] == true) {
        print('<style>
                #update { display: none; }
            </style>');
    }
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
                                            <h5>Add Student </h5>
                                            <span>Add new student form</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <!-- <button type="button" class="btn btn-success"><i class="ik ik-plus"></i>Add Student</button> -->
                                        <a  href="students.php" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="text" name="studentid" value="<?php echo $student_info['id']; ?>" required="" hidden>
                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lastname">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" value="<?php echo $student_info['last_name']; ?>" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="firstname">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="firstname" placeholder="First Name" value="<?php echo $student_info['first_name']; ?>" name="firstname" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middlename">Middle Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="middlename" placeholder="Middle Name" value="<?php echo $student_info['middle_name']; ?>" name="middlename" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="address" rows="3" placeholder="Street, Barangay, Municipality / City, Zip Code " name="address" required=""><?php echo $student_info['address']; ?></textarea>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" placeholder="Email address" value="<?php echo $student_info['email']; ?>" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="mobile" placeholder="Mobile #" value="<?php echo $student_info['mobile']; ?>" name="mobile" required="">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="course">Course <span class="text-danger">*</span></label>
                                                <select name="course" id="course" class="form-control" required="">
                                                    <option selected value="">Select Course</option>
                                                    <?php 

                                                    foreach ($listOfCourses as $course) {
                                                        if ($course['id'] == $student_info['course']) {
                                                           echo '<option selected value="'.$course['id'].'">'.$course['course_desc'].' - '.$course['course_title'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$course['id'].'">'.$course['course_desc'].' - '.$course['course_title'].'</option>';                                            
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year">Year <span class="text-danger">*</span></label>
                                                <select name="year" id="year" class="form-control" required="">
                                                    <option selected value="">Select Year</option> 
                                                   <?php include '../Library/Year_level.php';
                                                        foreach ($yearlevel_list as $lvllist) {
                                                            if ($student_info['year'] == $lvllist['level']) {
                                                                echo '<option selected value="'.$student_info['year'].'">Level '.$student_info['year'].'</option>';
                                                            }else{

                                                            echo "<option value='".$lvllist['level']."'>Level ".$lvllist['level']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button class="btn btn-success float-right" id="update" type="submit" name="update"><i class="ik ik-save"></i>Update</button>
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
