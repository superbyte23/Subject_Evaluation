<?php 
require_once '../Library/Curriculum.php';
require_once 'layout/main.php'; 

if (isset($_POST['save'])) {
    if ($curriculum->add_level_curriclum($_POST['curid'], $_POST)) {
        header('location: curriculum_prospectus.php?cpid='.$_POST['curid'].'&id='.$_POST['curid']);
    }
    
     
}
if (isset($_GET['cpid'])) {
    $details = $curriculum->curriculum_prospectus($_GET['id']);
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
                                            <h5>Prospectus</h5>
                                            <span>List of Prospectus Levels</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="#" data-toggle="modal" data-target="#add_level" class="btn btn-success"><i class="ik ik-plus"></i>Add Level</a>
                                        <button id="delete" type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Delete Item(s)</button>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <div class="dt-responsive">
                                <form method="post" action="test" id="target">
                                    <table id="table-style-hover"
                                           class="table">
                                        <thead>
                                            <tr>
                                                <th class="nosort" width="10"> 
                                                        <input type="checkbox" id="selectall" name="check[]"> 
                                                    </label>
                                                </th> 
                                                <th>Name</th> 
                                                <th>Prospectus</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                             <?php
                                                foreach ($details as $s) {
                                            ?>
                                                <tr>
                                                    
                                                    <td> 
                                                            <input type="checkbox" class="select_all_child" id="" name="check[]" > 
                                                    </td>
                                                   <td>Level <?php echo($s['year_level']); ?></td>                                                    
                                                    <td>
                                                        <a href="prospectus_add.php?id=<?php echo($s['id']).'&cid='.$_GET['id']; ?>" class="badge badge-info mb-1">Add Subjects</a> 
                                                    </td>
                                                    <!-- <td class="text-center">
                                                        <a href="#" data-toggle="modal" data-target="#student_info"  class="pl-2 text-info"><i class="ik ik-eye"></i></a>
                                                        <a href="student_edit.php?id=<?php echo $info['id'] ?>" class="pl-2 text-primary"><i class="ik ik-edit"></i></a>
                                                        <a href="student_delete.php?id=<?php echo $info['id'] ?>" class="pl-2 text-danger"><i class="ik ik-trash"></i></a>
                                                        
                                                    </td> -->
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
<div class="modal fade" id="add_level" tabindex="-1" role="dialog" aria-labelledby="add_level" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="POST">
                <input type="text" value="<?php echo $_GET['id']; ?>" name="curid" hidden=""> 
                <div class="modal-header">
                    <h5 class="modal-title" id="add_level_label">Add Year Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group"> 
                        <label for="level">Select Year Level</label>
                        <select id="level" class="form-control" name="level" required>
                            <option selected value="">Select Level</option>
                            <?php include '../Library/Year_level.php';
                                foreach ($yearlevel_list as $lvllist) {
                                    echo "<option>".$lvllist['level']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit"  name="save" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>
        <?php require 'info.php'; ?>
        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
        <script src="../js/datatables.js"></script>
        <script>
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
            });
        </script>
    </body>
</html>
