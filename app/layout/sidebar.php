                <?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
                <div class="app-sidebar colored no-print">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.php">
                            <div class="logo-img">
                                <img src="../src/32x32.png" class="header-brand-img" alt="SCSES">   
                             </div>
                            <span class="text">&nbspSCSES</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel"><i class="ik ik-home"></i> Main</div>
                                <div class="nav-item">
                                    <a href="index.php"><i class="ik ik-home"></i><span>Dashboard</span></a>
                                </div>
                                <?php 
                                //     if (strpos($url,'enroll') !== false) {
                                //         echo '<div class="nav-item has-sub open">
                                //     <a href="#"><i class="ik ik-codepen"></i><span>Enrollment</span></a>
                                //     <div class="submenu-content">
                                //         <a href="enrollment.php" class="menu-item">Enrollment Dashboard</a>
                                //         <a href="enroll_student.php" class="menu-item">Enroll New Student</a> 
                                //         <a href="enroll_old_student.php" class="menu-item">Enroll Old Student</a> 
                                //     </div>
                                // </div>';
                                //     } else {
                                //         echo '<div class="nav-item has-sub">
                                //     <a href="#"><i class="ik ik-codepen"></i><span>Enrollment</span></a>
                                //     <div class="submenu-content">
                                //         <a href="enrollment.php" class="menu-item">Enrollment Dashboard</a>
                                //         <a href="enroll_student.php" class="menu-item">Enroll New Student</a> 
                                //         <a href="enroll_old_student.php" class="menu-item">Enroll Old Student</a> 
                                //     </div>
                                // </div>';
                                //     }
                                ?>
                                <?php if ($_SESSION['user_type'] == "administrator" or $_SESSION['user_type'] == 'secretary'): ?>
                                     
                                    <div class="nav-item has-sub <?php if (strpos($url,'evaluation') !== false){ echo "open"; } ?>">
                                        <a href="javascript:void(0)"><i class="ik ik-codepen"></i><span>Evaluation</span></a>
                                        <div class="submenu-content">
                                           <a href="evaluation_dashboard.php" class="menu-item">Evaluation Dashboard</a>
                                           <a href="evaluation.php" class="menu-item">Approve Student Subjects</a> 
                                           <!-- <a href="enroll_old_student.php" class="menu-item">Enroll Old Student</a>  -->
                                        </div>
                                    </div>                       
                                <?php endif ?>

                                
                            <?php if ($_SESSION['user_type'] != "secretary"): ?>
                                <div class="nav-item has-sub <?php if (strpos($url,'grades') !== false){ echo "open"; } ?>">
                                    <a href="javascript:void(0)"><i class="ik ik-percent"></i><span>Grades</span></a>
                                    <div class="submenu-content">
                                       <a href="grades_student.php" class="menu-item">Submit Grades</a>
                                       <a href="grades_student_records.php" class="menu-item">Student Grades Records</a> 
                                       <!-- <a href="enroll_old_student.php" class="menu-item">Enroll Old Student</a>  -->
                                    </div>
                                </div> 
                                <div class="nav-lavel"><i class="ik ik-monitor"></i> Management</div>
                                <div class="nav-item">
                                    <a href="students.php"><i class="ik ik-users"></i><span>Students</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="courses.php"><i class="ik ik-package"></i><span>Course</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="subjects.php"><i class="ik ik-star-on"></i><span>Subject</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="departments.php"><i class="ik ik-airplay"></i><span>Department</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="curriculum.php"><i class="ik ik-award"></i><span>Curriculum</span></a>
                                </div>
                                <div class="nav-item">
                                    <a href="academicyear.php"><i class="ik ik-calendar"></i><span>Acamenic Year</span></a>
                                </div>
                                <div class="nav-lavel"><i class="ik ik-settings"></i> Settings</div>
                                <?php if ($_SESSION['user_type'] == "administrator"): ?>                                     
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                    <div class="submenu-content">
                                        <a href="accounts.php" class="menu-item">Accounts</a>
                                        <a href="settings.php" class="menu-item">Management</a>
                                        <!-- <a href="export_db.php" class="menu-item">Database</a> -->
                                    </div>
                                </div>
                                <?php endif ?>                                    
                            <?php endif ?>                                
                            </nav>
                        </div>
                    </div>
                </div>