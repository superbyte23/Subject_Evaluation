<?php require_once 'layout/main.php'; require_once '../Library/Student.php'; 
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
                                        <i class="fa fa-users bg-blue"></i>
                                        <div class="d-inline">
                                            <h5>Student Tables</h5>
                                            <span>List of Students</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="student_add.php" class="btn btn-success"><i class="ik ik-plus"></i>Add Student</a>
                                       <!--  <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Student(s)</button> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <form action="" method="GET" class="card-header"> 
                                <div class="input-group" style="margin-bottom: 0;">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Course / Level</span>
                                  </div>
                                  <select type="text" class="form-control" name="course" required="">
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
                                  <button type="submit" class="btn-info ml-2">Search</button>
                                  <a href="students.php" class="btn-success ml-2 border-0" style="height: inherit; padding: 10px;">Clear Search</a>
                                </div>
                            </form>
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <div class=" col-12 scrollable scrollable_x">
                                    <!-- id="scr-vtr-dynamic" -->
                                    <table 

                                                   class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th>
                                                <th class="text-center">Image</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Course</th>
                                                <th>Level</th>
                                                <th>Subjects</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                                foreach ($student_list as $student) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value="<?php echo $student['id']; ?>"> 
                                                    </td>
                                                    <?php
                                                    if ($student['gender'] == 'Male') {
                                                        echo '<td class="text-center"><img src="../img/male.png" class=" table-user-thumb" alt=""></td>';
                                                    }else{
                                                        echo '<td class="text-center"><img src="../img/female.png" class=" table-user-thumb" alt=""></td>';
                                                    }
                                                ?>
                                                    <td><?php echo $student['last_name'].', '.$student['first_name'].' '.$student['middle_name']; ?></td>

                                                    <td><?php echo $student['address']; ?></td>
                                                    <td><?php echo $student['course_title']; ?></td>
                                                    <td><?php echo $student['year']; ?></td>
                                                    <td>
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#student_info">View Subjects</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#student_info" data-index="<?php echo $student['id']; ?>"  class="text-info student_info"><i class="ik ik-eye"></i></a>
                                                        <a href="student_edit.php?id=<?php echo $student['id'] ?>" class="text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="student_delete.php?id=<?php echo $student['id'] ?>" class="text-danger"><i class="ik ik-trash"></i></a>
                                                        
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
        <div class="modal fade edit-layout-modal" id="student_info" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="result">
                        
                    </div>
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
                $('.student_info').on('click', function(){
                    let id = $(this).data('index');
                    let model = "student";
                    $.ajax({
                        type: 'POST',
                        data: {id:id, model:model},
                        url:'backend_info.php',
                        success:function(html){
                            $('#result').html(html);
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
