<?php 
if (isset($_POST['subject'])) {

    require_once '../Library/Curriculum.php';
    $course_id = $_POST['course'];
    $year_level = $_POST['year'];
    $cid = $_POST['cy'];
    // $ay = $_POST['ay'];
    $semester = $_POST['semester'];
    // $curriculum_id = $curriculum->curriculum_id($course_id, $cy);
    $curriculum_level_id = $curriculum->curriculum_level($cid, $year_level); 

    require_once '../Library/Prospectus.php';  
        $listofsubjects = $prospectus->prospectus_per_semester($curriculum_level_id['id'], $semester);
           if ($listofsubjects->rowCount() > 0) {
            
                $n = 0;

                foreach ($listofsubjects as $ls) { 
                    $n++;
                    print '<tr valign="top" id="'.$n.'">
                            <td hidden>'.$n.'</td>
                            <td class="subject'.$n.'">'.$ls["pid"].'</td>
                            <td>'.$ls["subject_code"].'</td>
                            <td  class="name'.$n.'">'.$ls["subject_title"].'</td>
                            <td>'.$ls["units"].'</td> 
                            <td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td>
                        </tr>';

                    
                }

            }else{
                print('<td colspan="5" class="text-center">No Subjects Available</td>');
            }      

}elseif (isset($_POST['add_subject'])) {

    require_once '../Library/Prospectus.php';

    $subject = $prospectus->prospectus_info($_POST['id']);
    
    print $subject;

}elseif (isset($_POST['loadcursujetcs'])){
    
    $cid = $_POST['cy'];
    $course_id = $_POST['course'];
    require_once '../Library/Curriculum.php';
    // $curriculum_id = $curriculum->curriculum_id($course_id, $cy);

    require_once '../Library/Prospectus.php';  
        $listofsubjects = $prospectus->prospectus_per_curriculum($cid);
           if ($listofsubjects) {
            $n = 0;
                foreach ($listofsubjects as $ls) { 
                    $n++;
                    print '<tr valign="top" id="'.$n.'">
                            <td hidden>'.$n.'</td>
                            <td class="subject'.$n.'">'.$ls["pid"].'</td>
                            <td>'.$ls["subject_code"].'</td>
                            <td  class="name'.$n.'">'.$ls["subject_title"].'</td>
                            <td>'.$ls["units"].'</td> 
                            <td class="text-center"><a href="#" class="add-subject bg-info" style="border-radius: 50px; padding: 8px 10px 7px 10px;,"><i class="ik ik-plus"></i></a></td>
                        </tr>';
                }
                ?>
                    <script>
                        $(".add-subject").click(function() {
                            let row = $(this).closest("tr");    // Find the row
                            let id = row.find("[class^=subject]").text(); // Find the text  
                            let add_subject = true;  // post validator
                             $.ajax({
                                type: 'POST',
                                url: 'backend_require_subjects.php',
                                data: {id:id, add_subject:add_subject},
                                dataType: 'json',
                                success:function(phpdata){
                                    let lastRowId = $('#table1 tr:last').attr("id"); /* finds id of the last row inside table */
                                    let lastid = parseInt(lastRowId) + 1;
                                    console.log(lastid);

                                    $('#student_subject_table tr:last').after('<tr valign="top" id="'+lastid+'"><td>'+phpdata.pid+'</td><td>'+phpdata.subject_code+'</td><td>'+phpdata.subject_title+'</td><td>'+phpdata.units+'</td><td width="100px"><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
                                }
                            });  
                            
                        });
                    </script>  
                <?php
            }else{
                print('<td colspan="5" class="text-center">No Subjects Available</td>');
            }
} 
?>

