<?php 

require_once '../Library/Student.php';
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
                                            <h5>Student Grade Search Portal</h5>
                                            <span>Print Student Grades Records</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="dt-responsive">
                            <form method="post" action="index.php" id="target"> 
                                <table id="scr-vtr-dynamic" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr> 
                                            <th style="width: 10px;">Image</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th style="width: 10px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
<?php
foreach ($student_list as $student) {
?>
<tr>
<?php
if ($student['gender'] == 'Male') {
echo '<td class="text-center"><img src="../img/male.png" class=" table-user-thumb" alt=""></td>';
}else{
echo '<td class="text-center"><img src="../img/female.png" class=" table-user-thumb" alt=""></td>';
}
?>
<td><?php echo $student['last_name'].', '.$student['first_name'].' '.$student['middle_name']; ?></td> 
<td>
<?php echo $student['email']; ?>
</td>
<td class="text-center">
<a href="#" class="btn btn-info stdrecord" data-toggle="modal" data-target="#grades_records" data-index="<?php echo $student['id']; ?>"><i class="ik ik-eye"></i> View Grade Records</a>

</td>
</tr>
<?php
}
?>
                                    </tbody>
                                </table>                                    
                                </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        <div class="modal fade full-window-modal" id="grades_records" tabindex="-1" role="dialog" aria-labelledby="fullwindowModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="record">
                     
                    
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
                $('.stdrecord').unbind().bind('click', function(){
                    let stdid = $(this).data('index'); 
                    $.ajax({
                        type: 'POST',
                        url: 'backend_student_grades_summary.php',
                        // dataType: 'json',
                        data:  {stdid:stdid},
                        success:function(data){
                            $('#record').html(data);
                        }
                    });

                });
            });
        </script>
    </body>
</html>
