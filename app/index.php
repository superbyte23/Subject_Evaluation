<?php require_once 'layout/main.php'; require_once 'counter.php';  ?>

    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid">                         
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget" onclick="window.location = 'departments.php';" style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Departments</h6>

                                            <h2><?php echo $listOfDepartments->rowCount(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-airplay"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total number of Departments</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget" onclick="window.location = 'students.php';"  style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Students</h6>

                                                <h2><?php echo $student_list->rowCount(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total number of Students</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget"  onclick="window.location = 'courses.php';"  style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Courses</h6>
                                                <h2><?php echo $listOfCourses->rowCount(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-package"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Course</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="widget"  onclick="window.location = 'curriculum.php';"  style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Curriculum</h6>
                                                <h2><?php echo $curriculum_list->rowCount(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-award"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Curriculum</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">

                            
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="widget"  onclick="window.location = 'subjects.php';"  style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Subjects</h6>
                                                <h2 id="countStudent"><?php echo $subject_list->rowCount(); ?></h2>
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-star"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total Subjects</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="widget"  style="cursor: pointer;">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state"> 
                                                <h3 id="countStudent">Summary Report</h3>
                                            </div>                                             
                                            <div class="icon">
                                                <i class="ik ik-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div id="c3-donut-chart"></div>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div> 
        <?php include 'layout/menu_modal.php'; ?>
        
        <script>
            let studentCount = <?php echo $student_list->rowCount(); ?>;
            let departmentCount = <?php echo $listOfDepartments->rowCount(); ?>;
            let courseCount = <?php echo $listOfCourses->rowCount(); ?>;
            let curriculumCount = <?php echo $curriculum_list->rowCount(); ?>;
            let subjectsCount = <?php echo $subject_list->rowCount(); ?>;
        </script>
        <?php require_once 'default_js_script.php'; ?>    

        <script src="../src/js/report.js"></script>

    </body>
</html>
