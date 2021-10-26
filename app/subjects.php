<?php 

require_once '../Library/Subject.php';
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
                                            <h5>Subjects Tables</h5>
                                            <span>List of Subjects</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="subject_add.php" class="btn btn-success"><i class="ik ik-plus"></i>Add Subject</a><!-- 
                                        <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Subject(s)</button> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <form action="" method="GET" class="card-header"> 
                                <input type="text" name="search" value="1" hidden="">
                                <div class="input-group" style="margin-bottom: 0;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Filter</span>
                                  </div>
                                  <select type="text" class="form-control" name="course" required="" id="course">
                                      <option value=""> Select Course</option>
                                      <?php require_once '../Library/Course.php';
                                            foreach ($listOfCourses as $course) {
                                                if ($course['id'] == $_GET['course']) {
                                                     echo '<option  value="'.$course["id"].'" selected>'.$course["course_title"].'</option>'; 
                                                }else{

                                                echo '<option value="'.$course["id"].'">'.$course["course_title"].'</option>'; 
                                                }
                                            }

                                        ?>
                                  </select>
                                  <select type="text" class="form-control" name="level" required="">
                                      <option value=""> Select Year Level</option>
                                      <?php require_once '../Library/Year_level.php';
                                            foreach ($yearlevel_list as $level) {
                                                if ($level['id'] == $_GET['level']) {
                                                    echo '<option value="'.$level["id"].'" selected>'.$level["level"].'</option>';
                                                }else{
                                                    echo '<option value="'.$level["id"].'">'.$level["level"].'</option>';
                                                }
                                                
                                            }
                                        ?>
                                  </select>
                                  <select type="text" class="form-control" name="curriculum" required="" id="curriculum">
                                      <option value=""> Select Curriculum Year</option>
                                        
                                   <?php 
                                   if (isset($_GET['curriculum'])) {
                                        require_once '../Library/Curriculum.php';
                                        foreach ($curriculum_list as $list) {
                                            if ($list['id'] == $_GET['curriculum']) {
                                                echo '<option value="'.$list["id"].'" selected>'.$list["curriculum_title"].'</option>';
                                            }else{
                                                echo '<option value="'.$list["id"].'">'.$list["curriculum_title"].'</option>';
                                            }
                                            
                                        }
                                   }
                                  
                                        ?> 
                                  </select>
                                  <select type="text" class="form-control" name="semester" required="" id="semester">
                                      <option value=""> Select Semester</option>
                                        
                                        <?php require_once '../Library/Semester.php';
                                            foreach ($semester_list as $sem) {
                                                if (isset($_GET['semester'])) {
                                                    if ($sem['id'] == $_GET['semester']) {
                                                        echo '<option value="'.$sem["id"].'" selected>'.$sem["semester_name"].'</option>';
                                                    }else{
                                                     echo '<option value="'.$sem["id"].'">'.$sem["semester_name"].'</option>';
                                                }
                                                }else{
                                                     echo '<option value="'.$sem["id"].'">'.$sem["semester_name"].'</option>';
                                                }
                                            }
                                        ?>
                                  </select>
                                  <button type="submit" class="btn-info ml-2" style="height: 35px;">Search</button>
                                  <button  onclick="window.location = 'subjects.php'" type="button" class="btn-success ml-2 border-0" style="height: 35px;">Clear Search</button>
                                </div>
                            </form>
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <div class=" col-12 scrollable scrollable_x">
                                    <!--  --> 
                                    <table id="scr-vtr-dynamic"
                                           class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th>
                                                <!-- <th class="nosort">Avatar</th> -->
                                                <th>Code</th>
                                                <th>Subject Title</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach ($subject_list as $subject) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value=""> 
                                                    </td>
                                                    <!-- <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td> -->
                                                    <td><?php echo $subject['subject_code'];?></td>
                                                    <td><?php echo $subject['subject_title'];?></td>
                                                    <td><?php echo $subject['units'];?></td>
                                                    <td><?php echo $subject['prerequisite'];?></td>
                                                    <td class="text-center">
                                                        <a href="#" class="text-info subject_info" data-index="<?php echo $subject['id']; ?>" data-toggle="modal" data-target="#subject_info"><i class="ik ik-eye"></i></a>
                                                        <a href="subject_edit.php?id=<?php echo $subject['id'];?>" class="text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="subject_delete.php?id=<?php echo $subject['id'];?>" class="text-danger"><i class="ik ik-trash"></i></a>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>   
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
        <div class="modal fade edit-layout-modal" id="subject_info" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
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

                $('#delete').click(function(){
                     $("#target").submit();                                      
                }); 
            });
            $(document).ready(function(){
                $('.subject_info').on('click', function(){
                    let id = $(this).data('index'); 
                    let model = "subject";
                    $.ajax({
                        type: 'POST',
                        url: 'backend_info.php',
                        data: {id:id, model:model},
                        success:function(html){
                            $('#result').html(html);
                        }
                    });
                });
                $('#course').on('change',function(){
                    let courseid = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: 'backend_curriculum.php',
                        data: {courseid:courseid},
                        success:function(data){
                            $('#curriculum').html(data);
                        }
                    });
                });
            });
        </script>
        <style>
            .scrollable {
            overflow:scroll;
            height:500px;
            }
            .scrollable_x{
                width: 1175px;
                overflow-x: auto;
                white-space: nowrap;
            }
        </style>
    </body>
</html>
