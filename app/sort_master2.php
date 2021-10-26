<?php 
    foreach ($listofsubjects as $ls) {
        if ($ls['semester'] == $cursem) {
            $n++;
            $string .= ",".$ls['pid'];
            print '<tr valign="top" id="'.$n.'">
                <td hidden>'.$n.'</td>
                <td style="width: 20px;" class="subject'.$n.'"><input type="text" name="subjectsID[]" class="form-control d-block bg-white text-center border-0" readonly="" value="'.$ls["pid"].'" /></td>
                <td>'.$ls["subject_code"].'</td>
                <td  class="name'.$n.'">'.$ls["subject_title"].'</td>
                <td  class="name'.$n.'">'.$ls["prerequisite"].'</td> 
                <td  class="name'.$n.'">'.$ls["units"].'</td> 
                <td width="100px"><a href="javascript:void(0);" class="remCF btn btn-danger text-center">Remove <i class="fa fa-trash"></i></a></td>
            </tr>';    
        }// end if statemt            
         
    } //end foreach listofsubjects 
?>