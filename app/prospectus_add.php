<?php
require_once '../Library/curriculum.php'; 
require_once '../Library/prospectus.php'; 
 
require_once 'layout/main.php';  ?>

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
                                            <h5>Prospectus List per Level </h5> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a  href="#" onclick="history.back();" class="btn btn-info"><i class="ik ik-corner-up-left"></i>Back to Lists</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>First Semester</h3> 

                                                <label for="code">Search Subject</label> <span class="text-danger">*</span>
                                            <div class="form-group">
                                                <input type="search" class="text-dark form-control  clearable" id="code" placeholder="Subject Code" name="code" required="" autocomplete="off" /> 
                                                <div class="list-item-wrap">
                                                    <div id="result" style="max-height: 300px; overflow-x: hidden;">
                                                        
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h3 class="text-center">First Semester</h3> 
                                            <table class="w-100" border="1">
                                                <thead class="text-center">
                                                    <th class="w-25">Code</th>
                                                    <th>Subject</th>
                                                    <th class="w-25">Remove</th>
                                                </thead>
                                                <tbody class="text-center" id="list_table">
                                                    <?php  
                                                        foreach ($prospectus_list as $row) {
                                                            print '<tr>
                                                                    <td>'.$row["subject_code"].'</td>
                                                                    <td>'.$row["subject_title"].'</td>
                                                                    <td>

                                                                    <a href="backend_remove_subject_prospectus.php?pid='.$row["pid"].'&id='.$_GET['id'].'&cid='.$_GET["cid"].'" data-index="'.$row["pid"].'" class="sub_delete pointer"><i class="ik ik-trash"></i></a></td>     
                                                                 </tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>                                    
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Second Semester</h3>

                                                <label for="code">Search Subject</label> <span class="text-danger">*</span>
                                            <div class="form-group">
                                                <input type="search" class="text-dark form-control clearable" id="secode" placeholder="Subject Code" name="code" required="" autocomplete="off" />
                                                <div class="list-item-wrap">
                                                    <div id="result2" style="max-height: 300px; overflow-x: hidden;">
                                                        
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-md-6">                                           
                                            <table class="w-100" border="1">
                                                <h3  class="text-center">Second Semester</h3> 
                                                <thead class="text-center">
                                                    <th class="w-25">Code</th>
                                                    <th>Subject</th>
                                                    <th class="w-25">Remove</th>
                                                </thead>
                                                <tbody class="text-center" id="list_table2">
                                                    <?php  
                                                        foreach ($prospectus_list2 as $row) {
                                                            print '<tr>
                                                                    <td>'.$row["subject_code"].'</td>
                                                                    <td>'.$row["subject_title"].'</td>
                                                                    <td>   
                                                                    <a href="backend_remove_subject_prospectus.php?pid='.$row["pid"].'&id='.$_GET['id'].'&cid='.$_GET["cid"].'" data-index="'.$row["pid"].'" class="sub_delete pointer"><i class="ik ik-trash"></i></a></td>     
                                                                 </tr>';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div> 
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require_once 'layout/footer.php'; ?>                
            </div>
        </div>

        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>

        <script src="../plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="../js/custom_alert.js"></script>
        <script>    
            <?php
                if (isset($message)) {
                    print('dangerAlert("'.$message.'");');                       
                }
            ?>
        </script>

        <script> 

            // $(document).ready(function(){ 
                 
            //     $('.sub_delete').on('click', function(){
            //         let subpros_id = $(this).data('index');
            //         $.ajax({
            //             type:'POST',
            //             url:'backend_remove_subject_prospectus.php',
            //             data:{subpros_id:subpros_id, clevel:<?php echo $_GET['id']; ?>},
            //             success:function(html){ 
            //                location.reload(); // then reload the page.(3)
            //             }
            //         });
            //     });
            // });
        </script>
        <script>
            function tog(v){return v?'addClass':'removeClass';} 
            $(document).on('input', '.clearable', function(){
                $(this)[tog(this.value)]('x');
            }).on('mousemove', '.x', function( e ){
                $(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
            }).on('touchstart click', '.onX', function( ev ){
                ev.preventDefault();
                $(this).removeClass('x onX').val('').change();
            });
            $(document).ready(function(){ 

               
                
                $('#code').on('keyup', function(){
                    let code = $(this).val();
                    if (!code || code == undefined || code == "") {
                        $('#result').hide();    
                    }else{
                        $.ajax({
                        type:'POST',
                        url:'backend_search_subject.php',
                        data:{code:code, clevel:<?php echo $_GET['id']; ?>, cid:<?php echo $_GET['cid']; ?>},
                        // data:{code:code},
                        success:function(html){
                            $('#result').show();
                            $('#result').html(html);
                        }
                        });
                    }
                });
                
                 $('#secode').on('keyup', function(){
                    let secode = $(this).val();
                    if (!secode || secode == undefined || secode == "") {
                        $('#result2').hide();    
                    }else{
                        $.ajax({
                        type:'POST',
                        url:'backend_search_subject.php',
                        data:{secode:secode, clevel:<?php echo $_GET['id']; ?>, cid:<?php echo $_GET['cid']; ?>},
                        // data:{secode:secode},
                        success:function(html){
                            $('#result2').show();
                            $('#result2').html(html);
                        }
                        });
                    }
                });
            });
        </script> 
    </body>
</html>
