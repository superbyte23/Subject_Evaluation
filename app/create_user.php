<?php 

require_once '../Library/User.php';
require_once 'layout/main.php'; 

if (isset($_POST['btn_register'])) {  
        $user_name = $_POST['user_name'];
        $password = $_POST['userpass'];
        if(!$users->create_user($_POST)){
            $_SESSION['msg'] = 'Error in creating an Account. Try Again.';
        }

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
                                            <h5>Create Account</h5> 
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="card w-75"  style="margin: 0 auto;">
                            <div class="card-body">
                               <form action="" method="post">
                                <div class="input-group">
                                    <span class="input-group-prepend" id="basic-addon2">
                                        <label class="input-group-text"><i class="ik ik-user"></i></label>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Name" name="name" required="" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-prepend" id="basic-addon2">
                                        <label class="input-group-text"><i class="ik ik-user"></i></label>
                                    </span>
                                    <select class="custom-select"  name="user_type" required="" autocomplete="off">
                                        <option value="" selected>Choose User Type</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="registrar">Registrar</option>
                                        <option value="secretary">Secretary</option> 
                                  </select> 
                                </div>
                                <div class="input-group">
                                    <span class="input-group-prepend" id="basic-addon2">
                                        <label class="input-group-text"><i class="ik ik-user"></i></label>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Username" name="user_name" required="" autocomplete="off">
                                </div> 

                                <div class="input-group">
                                    <span class="input-group-prepend" id="basic-addon2">
                                        <label class="input-group-text"><i class="ik ik-lock"></i></label>
                                    </span>
                                    <input type="password" class="form-control" placeholder="Password" name="userpass" required="" autocomplete="off">
                                </div> 
                                <div class="sign-btn text-center">
                                    <button type="submit" class="btn btn-theme btn-block" name="btn_register"><i class="ik ik-unlock"></i>Create Account</button> 
                                </div>
                            </form>
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
            $(document).ready(function(){
                $('#delete').click(function(){
                     $("#target").submit();                                      
                });
            });
        </script>
    </body>
</html>
