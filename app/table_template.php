<?php
require_once '../Library/Enrollment.php';
require_once '../Library/Settings.php';
$sem = $settings->get_active_semester();
require_once 'layout/main.php'; 

?>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">                                                                              
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="widget bg-purple">
                            <div class="widget-header">
                                <h3 class="widget-title"><i class="ik ik-command"></i> View Evaluation Details</h3>
                                <div class="widget-tools pull-right">
                                    <button type="button" class="btn btn-widget-tool minimize-widget ik ik-plus"></button>
                                </div>
                            </div>
                            <div class="widget-body" style="">
                                The body of the widget
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-purple ">
                                <h3 class="text-white"></h3>
                            </div>
                            <div class="card-body">
                                <div class="dt-responsive">
                                    <form method="post" action="test" id="target">
                                        <div class=" col-12 scrollable scrollable_x"> 
                                        <table id="multi-colum-dt" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="nosort" width="10"> 
                                                            <input type="checkbox" id="selectall" name="check[]">
                                                    </th> 
                                                    <th>Name</th> 
                                                    <th>Course</th>
                                                    <th>Level</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $student_list = $enrollment->search_all();
                                                    foreach ($student_list as $student) {
                                                ?>
                                                    <tr>
                                                        
                                                        <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" value="<?php echo $student['id']; ?>"> 
                                                        </td> 
                                                        <td>
                                                            <a href="evaluation_details.php?stdid=<?php echo $student['id']; ?>" target="_blank"><?php echo $student['last_name'].', '.$student['first_name'].' '.$student['middle_name']; ?></a>
                                                        </td>
     
                                                        <td><?php echo $student['course_title']; ?></td>
                                                        <td><?php echo $student['level']; ?></td> 
                                                        <td class="text-center">
                                                          
                                                            <a href="#" data-toggle="modal" onclick="showGrades('<?php echo $student["id"]; ?>','<?php echo $student["cid"]; ?>','<?php echo $student["courseid"]; ?>','<?php echo $student["level"]; ?>','<?php echo $sem['id']; ?>');" data-target="#evaluation_details" data-index="<?php echo $student['id']; ?>"  class="text-info evaluation_details"><i class="ik ik-eye"></i> View Current Subjects</a>
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

        <?php include 'layout/menu_modal.php'; ?> 
        <?php require_once 'default_js_script.php'; ?> 
    </body>
</html>
