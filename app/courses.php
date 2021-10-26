<?php require_once 'layout/main.php'; require_once '../Library/Course.php'; ?>
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
                                            <h5>Course Tables</h5>
                                            <span>List of Courses</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="course_add.php" class="btn btn-success"><i class="ik ik-plus"></i>Add Course</a><!-- 
                                        <button type="button" class="btn btn-danger" id="delete_check_course"><i class="ik ik-trash"></i>Delete Course(s)</button> -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <div class="dt-responsive">

                                <div class="">  <!-- <div class="col-12 scrollable scrollable_x"> -->               
                                    <table id="scr-vtr-dynamic"
                                                   class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10">
                                                    <input type="checkbox" id="selectall">
                                                </th>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Description</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($listOfCourses as $course) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="select_all_child" name="checkbox[]" class="checkbox" value="<?php echo $course['id']; ?>">
                                                    </td>
                                                    <td><?php echo $course['code']; ?></td> 
                                                    <td><?php echo $course['course_title']; ?></td>
                                                    <td><?php echo $course['course_desc']; ?></td> 
                                                    <?php if ($course['department_id'] == 'none'): ?>
                                                        <td>NONE</td>
                                                    <?php else: ?>
                                                    <td><?php echo $course['department_name']; ?></td>
                                                     <?php endif ?>
                                                    <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#course_info" data-index="<?php echo $course['id']; ?>"  class="text-info course_info" ><i class="ik ik-eye"></i></a>
                                                        <a href="course_edit.php?id=<?php echo $course['id']; ?>" class="text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="course_delete.php?id=<?php echo $course['id'];?>" class="text-danger"><i class="ik ik-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once 'layout/footer.php'; ?> 

            </div>
        </div>
        <div class="modal fade edit-layout-modal" id="course_info" tabindex="-1" role="dialog" aria-labelledby="editLayoutItemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content overflow-auto">
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
                $('#delete_check_course').click(function(){
                    $("input[name^='checkbox']").each(function(){
                        if($(this). prop("checked") == true){
                            console.log($(this).val());
                        }
                    });
                });
            });

            $(document).ready(function(){
                $('.course_info').on('click', function(){
                    let id = $(this).data('index');
                    let model = "course";
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
