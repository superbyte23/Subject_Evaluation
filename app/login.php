<?php
require_once '../config/session.php';
$session = new app_session;
if (!empty($_SESSION['user_id'])) {
    header('location: index.php');    
}else{
    if (isset($_POST['btn_login'])) {
        require_once '../config/connection.php';
        require_once '../Model/User.php';
        $db = new Connection;
        $login = new User($db);
        $user_name = $_POST['user_name'];
        $password = $_POST['userpass'];
        if(!$login->login_user($user_name, $password)){
            $_SESSION['msg'] = 'Invalid Username or Password';
        }else{
            header('location: index.php');
        }
    }else{
        session_destroy();
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo str_replace('.PHP', '',strtoupper(basename($_SERVER['PHP_SELF']))); ?> | SCSES</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="../favicon.ico" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
        <style type="text/css">
            #error_message{
                animation: shake 0.3s;
                padding-bottom: 5px;
            }
            @keyframes shake {
              0% { transform: translate(1px, 1px) rotate(0deg); }
              10% { transform: translate(-1px, -2px) rotate(-1deg); }
              20% { transform: translate(-3px, 0px) rotate(1deg); }
              30% { transform: translate(3px, 2px) rotate(0deg); }
              40% { transform: translate(1px, -1px) rotate(1deg); }
              50% { transform: translate(-1px, 2px) rotate(-1deg); }
              60% { transform: translate(-3px, 1px) rotate(0deg); }
              70% { transform: translate(3px, 1px) rotate(-1deg); }
              80% { transform: translate(-1px, -1px) rotate(1deg); }
              90% { transform: translate(1px, 2px) rotate(0deg); }
              100% { transform: translate(1px, -2px) rotate(-1deg); }
            }
        </style>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('../img/auth/login-bg.jpg')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="../index.html"><img src="../src/logo.png" alt="" style="width: 70px;"></a>
                            </div>
                            <h3 class="text-center">Southland College Subject Evaluation System</h3>
                            <p class="text-center">Login to SCSES</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="user_name">
                                    <i class="ik ik-user"></i>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="userpass">
                                    <i class="ik ik-lock"></i>
                                </div>
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                        <span class="custom-control-label">&nbsp;Remember Me</span>
                                    </label>
                                </div>
                                <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo '<div class="text-danger text-center" id="error_message"><i class="ik ik-alert-triangle"></i> '.$_SESSION['msg'].'</div>'; 
                                    }
                                ?>
                                <div class="sign-btn text-center mb-2" style="margin-top: -5px;">
                                    <button type="submit" class="btn btn-theme btn-block" name="btn_login"><i class="ik ik-unlock"></i>Login</button>
                                </div>

                                <div class="form-group text-center display-6">                                      
                                    <a href="signup.php" class="nav-link text-info"><i class="ik ik-users"></i> Create new Account</a> 
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../plugins/jquery/jquery-3.4.1.js"></script> 
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 
        <script src="../plugins/moment/moment.js"></script> 
        <!-- <script src="../js/tables.js"></script> -->
    </body>
</html>
