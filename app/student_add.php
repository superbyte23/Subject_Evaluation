<?php
require_once '../Library/Student.php'; // for add user
require_once '../Library/Course.php'; // for populate course

require_once 'layout/main.php';

if (isset($_SERVER['PHP_SELF'])) {
    if (isset($_POST['save'])) {
       if ($students->student_add($_POST) == 1) {
           echo "<script>window.location = 'students.php';</script>";
       }else{
            $message = 'Theres a problem adding new student. Please try again';
       }
    }

}else{
    unset($message);
}
?>

    <body>
        <style type="text/css">
            .form-control{
                border-color: #8F9193;
            }
            label{
                font-size: 15px;
                font-weight: bolder;
            }   
        </style>
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
                                            <h5>Student Information Sheet (SIS)</h5>
                                            <span>Add new student form</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb"> 
                                        <a  href="students.php" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form_add">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Primary Details </h5>
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                                    <div class="row">                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lastname">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="firstname">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="firstname" placeholder="First Name"  name="firstname" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middlename">Middle Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="middlename" placeholder="Middle Name" name="middlename" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="year">Curriculum Year <span class="text-danger">*</span></label>
                                                <select name="curriculum" id="curriculum" class="form-control" required="">
                                                    <option selected value="">Select Year</option> 
                                                   <?php include '../Library/Curriculum.php';
                                                        foreach ($curriculum_list as $curriculum) {
                                                            
                                                            echo "<option value='".$curriculum['id']."'>".$curriculum['curriculum_title']."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Others -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gender">Gender <span class="text-danger">*</span></label>
                                                <select name="gender" class="form-control select2">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="dateofbirth">Birth Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="dateofbirth" name="bdate">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="age">Age <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Age">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="birthplace">Birth Place <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="birthplace" name="bplace" placeholder="Birth Place">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="address" rows="3" placeholder="Street, Barangay, Municipality / City, Zip Code " name="address" required=""></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="religion">Religion <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion">
                                            </div> 
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="civilstatus" name="civilstatus" placeholder="Civil Status">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" placeholder="Email address" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="mobile" placeholder="Mobile #" name="mobile" required="">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div> <!-- end card -->
                            <div class="card">
                                <div class="card-body">
                                    <h5>Secondary Details</h5>
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="father">Father's Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="father" placeholder="Father's Name" name="father" required="">
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fatheroccupation">Occupation <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="fatheroccupation" placeholder="Occupation" name="fatheroccupation" required="">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mother">Mother's Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="mother" placeholder="Mother's Name" name="mother" required="">
                                            </div>
                                        </div>                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="motheroccupation">Occupation <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="motheroccupation" placeholder="Occupation" name="motheroccupation" required="">
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="guardian">Guardian <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="guardian" placeholder="Guardian" name="guardian" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="guardianaddress">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="guardianaddress" placeholder="Address" name="guardianaddress" required="">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">                                                                                
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="other">Other person supporting <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="other" placeholder="Other person supporting" name="other" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="otherguardianaddress">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="otherguardianaddress" placeholder="Address" name="otherguardianaddress" required="">
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!-- <div class="card">
                                <div class="card-body">
                                    <h5>Other Details</h5>
                                    <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                                    <div class="form-group">
                                        <div class="border-checkbox-section">
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="nso" value="1" name="nso">
                                                <label class="border-checkbox-label" for="nso">NSO</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="form138" value="1" name="form138">
                                                <label class="border-checkbox-label" for="form138">Form 138</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="baptismal" value="1" name="baptismal">
                                                <label class="border-checkbox-label" for="baptismal">Baptismal</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="cgc" value="1" name="cgc">
                                                <label class="border-checkbox-label" for="cgc">Certificate of Good Moral Character</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="entranceexam" value="1" name="entranceexam">
                                                <label class="border-checkbox-label" for="entranceexam">Entrance Test Result</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="marriagecontract" value="1" name="marriagecontract"> 
                                                <label class="border-checkbox-label" for="marriagecontract">Marriage Contract</label>
                                            </div>
                                            <div class="border-checkbox-group border-checkbox-group-success">
                                                <input class="border-checkbox" type="checkbox" id="tor" value="1" name="tor">
                                                <label class="border-checkbox-label" for="tor">Transfer of Records</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-footer">
                                    <div class="float-right">
                                        <a href="#" onclick="history.back()" class="btn btn-danger"><i class="ik ik-trash"></i> Cancel</a>
                                        <button class="btn btn-success" type="submit" name="save"><i class="ik ik-save"></i>Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
