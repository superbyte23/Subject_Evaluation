<tr>
                                                <?php 
                                                $list = $curriculum->curriculum_prospectus($_GET['id']);

                                                   foreach ($list as $level) {

                                                    // Get list Per Level
                                                    ${'file' . $level['id']} = $prospectus->prospectus_per_level($_GET['id'],$level['id']);                                                       

                                                    echo '<tr>
                                                            <td colspan="5" class="font-weight-bold text-center">'.str_replace('Level',"",$level["year_level"]).' Semester </td>
                                                        </tr>';

                                                        foreach (${'file' . $level['id']} as $p) {

                                                            // GEt List Per Level Semester

                                                             ${'sem' . $level['id']} = $prospectus->prospectus_per_semester($_GET['id'],$p['semester']); 

                                                             print_r(${'sem' . $level['id']});

                                                            echo '<tr class="text-center">
                                                                    <td>'.$p["prerequisite"].'</td>
                                                                    <td>'.$p["subject_code"].'</td>
                                                                    <td>'.$p["subject_title"].'</td>
                                                                    <td>'.$p["units"].'</td>
                                                                     <td>'.$p["semester"].'</td>
                                                            </tr>';
                                                        
                                                            ${'total' . $p['id']} = $prospectus->prospectus_total_per_level($p['curriculum_level_id']);
                                                        }
                                                        foreach (${'total' . $p['id']} as $total) {
                                                           echo '<tr>
                                                                    <td colspan="3" class="font-weight-bold text-right pr-3">Total</td>
                                                                    <td class="text-center">'.$total['total'].'</td>
                                                                </tr>';
                                                        }
                                                        
                                                         

                                                   }    

                                                ?>