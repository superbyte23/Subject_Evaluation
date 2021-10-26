<?php 

require_once '../Library/Curriculum.php'; 
require_once '../Library/Prospectus.php'; 
require_once 'layout/main.php'; 
?> 
<style type="text/css">
    #table-prospectus{

    }
     #table-prospectus thead th{
        padding:  10px;
    }
    #table-prospectus tbody td{
        padding-left: 10px;
    }
    /* override styles when printing */
    @media print {
    .myDivToPrint {
        background-color: white;
        height: 100%;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        margin: 0;
        padding: 15px;
        font-size: 14px;
        line-height: 18px;
    }
    .no-print{
        display: none;
    }
}
</style>
    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">
                <?php require_once 'layout/sidebar.php'; ?>
                <div class="main-content">
                    <div class="container-fluid"> 
                        <div class="card myDivToPrint" >
                            <div class="card-header text-center d-block">
                                <h3 class="w-100 text-uppercase">SouthLand College of Kabankalan City</h3> 
                                Don Emillo Village, City of Kabankalan, Negros Occidental
                                <div class="h3"><?php echo $curriculum_info['curriculum_title']; ?></div>
                            </div>
                            <div class="card-body">  
                                <div class="table-responsive">
<?php
// get all level
$list = $curriculum->curriculum_prospectus($_GET['id']);

if ($list->rowCount() > 0) {
    foreach ($list as $level) {
       ?>                                        
            <h6 class="text-center font-weight-bold pt-2">Level <?php echo $level['year_level'];?></h6>
            <table border="1" class="w-100" id="table-prospectus">
                <thead>
                    <tr class="text-center p-0 m-0" >
                        <th>Prerequisites</th>
                        <th>Course Code</th>
                        <th>Nomenclature</th>
                        <th>Units</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    // get all level semester
        $pros_per_level = $prospectus->prospectus_per_level($level['id']);
        if ($pros_per_level->rowCount() > 0) {
           foreach ($pros_per_level as $ppl) {
               ?>
                <tr>
                    <td class="font-weight-bold"><?php echo ($ppl['semester'] < 2 ?  '1st Semester':'2nd Semester');?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                // get subjetcs per semester
                $pros_per_sem = $prospectus->prospectus_per_semester($ppl['curriculum_level_id'], $ppl['semester']);
                if ($pros_per_sem->rowCount() > 0) {
                   foreach ($pros_per_sem as $pps) {
                       ?>
                        <tr>
                            <td><?php echo $pps['prerequisite']; ?></td>
                            <td><?php echo $pps['subject_code']; ?></td>
                            <td><?php echo $pps['subject_title']; ?></td>
                            <td class="text-center"><?php echo $pps['units']; ?></td>
                        </tr>
                       <?php
                   }
                }



                    $prospectus_total_per_semester = $prospectus->prospectus_total_per_semester($pps['curriculum_level_id'], $pps['semester']);

                    foreach ($prospectus_total_per_semester as $ptps) {
                       ?>
                        <tr class="font-weight-bold">
                            <td></td>
                            <td></td>
                            <td class="pr-3 text-right">Total Units</td>
                            <td class="text-center"><?php echo $ptps['total']; ?></td>
                        </tr>
                       <?php
                    }
           }
        }
    ?> 
                </tbody>
            </table>
       <?php
    }
   
}



                                    ?>
                                </div> 
                            </div>
                            <div class="card-footer">
                                <button onclick="print_prospectus();" class="btn btn-warning float-right no-print" target="_blank">Print Prospectus</button>
                            </div>
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
            function print_prospectus() {
                document.title = "Southland College"; window.print();
            }
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
            });
        </script>
    </body>
</html>
