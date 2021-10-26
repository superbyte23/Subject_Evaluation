<?php
require_once '../Library/Enrollment.php';
require_once '../Library/Settings.php';
$sem = $settings->get_active_semester();
 
require_once '../config/session.php';
require_once '../config/connection.php';
require_once '../Model/User.php';
$session = new app_session;
$db = new Connection; 
$user = new User($db);
if ($session->session_check() == false) {

    header('location: login.php');
    
}else{
    $user_info = $user->get_user($_SESSION['user_id']);
    if ($user_info['user_status'] == 'confirmed') {
        header('location: index.php');
    }
} 

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo str_replace('.PHP', '',strtoupper(basename($_SERVER['PHP_SELF']))); ?> | SCSES</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="icon" href="../favicon.ico" type="image/x-icon" /> 
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css"> 
        <link rel="stylesheet" href="../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <link rel="stylesheet" href="../plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script> 
         
        <style>
            .table td{
                /*padding: .5em;*/
            }
            .sidebar-content{
                background-color: #272d36;
            }
            .wrapper .page-wrap .app-sidebar .sidebar-content .nav-container .navigation-main .nav-item a{
                padding: 10px 5px;
            }
            .wrapper .page-wrap .app-sidebar .sidebar-content .nav-container .navigation-main .nav-item:hover {
                background-color: #141829b3;
            }
            .wrapper .page-wrap .app-sidebar .sidebar-content .nav-container .navigation-main .nav-item a span {
                font-size: 15px; 
            } 
            .pointer {cursor: pointer;}

            .b-bottom-1{
                border-bottom: solid 1px #000;
                border-top: none;
                border-left: none;
                border-right: none;
                border-radius: 0;
            }
            .b-bottom-1:focus{
                border-bottom: solid 1px #000;
                border-top: none;
                border-left: none;
                border-right: none;
                border-radius: 0;
            }
            .no-scroll{
              height: 100vh;
              overflow-y: hidden;
              padding-right: 15px; /* Avoid width reflow */
            } 
            .loader { 
                position: absolute;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(../img/basic_loading_loop.gif) center no-repeat #fff;
                background-size: 70px;
                opacity: 0.5;
            }
            /* Safari */
            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }
            .disabled
            {
              pointer-events: none;

              /* for "disabled" effect */
              opacity: 0.5;
              background: #CCC;
            }
            #student_result{
                    /*width: 100%; 
                    z-index: 1000;  
                    margin: 0 auto;
                    max-height: 100px;
                    overflow-y: scroll;*/
            }
            .clear-text{
                cursor: pointer;
            }

            /*Spinner */
            .lds-roller {
              display: inline-block;
              position: relative;
              width: 64px;
              height: 64px;
            }
            .lds-roller div {
              animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
              transform-origin: 32px 32px;
            }
            .lds-roller div:after {
              content: " ";
              display: block;
              position: absolute;
              width: 6px;
              height: 6px;
              border-radius: 50%;
              background: #fcf;
              margin: -3px 0 0 -3px;
            }
            .lds-roller div:nth-child(1) {
              animation-delay: -0.036s;
            }
            .lds-roller div:nth-child(1):after {
              top: 50px;
              left: 50px;
            }
            .lds-roller div:nth-child(2) {
              animation-delay: -0.072s;
            }
            .lds-roller div:nth-child(2):after {
              top: 54px;
              left: 45px;
            }
            .lds-roller div:nth-child(3) {
              animation-delay: -0.108s;
            }
            .lds-roller div:nth-child(3):after {
              top: 57px;
              left: 39px;
            }
            .lds-roller div:nth-child(4) {
              animation-delay: -0.144s;
            }
            .lds-roller div:nth-child(4):after {
              top: 58px;
              left: 32px;
            }
            .lds-roller div:nth-child(5) {
              animation-delay: -0.18s;
            }
            .lds-roller div:nth-child(5):after {
              top: 57px;
              left: 25px;
            }
            .lds-roller div:nth-child(6) {
              animation-delay: -0.216s;
            }
            .lds-roller div:nth-child(6):after {
              top: 54px;
              left: 19px;
            }
            .lds-roller div:nth-child(7) {
              animation-delay: -0.252s;
            }
            .lds-roller div:nth-child(7):after {
              top: 50px;
              left: 14px;
            }
            .lds-roller div:nth-child(8) {
              animation-delay: -0.288s;
            }
            .lds-roller div:nth-child(8):after {
              top: 45px;
              left: 10px;
            }
            @keyframes lds-roller {
              0% {
                transform: rotate(0deg);
              }
              100% {
                transform: rotate(360deg);
              }
            }
            .wrapper .page-wrap .main-content {
    padding: 30px 0;
    background-color: #F6F7FB;
    min-height: calc(100vh - 120px);
    margin-top: 60px;
    padding-right: 0;
    padding-left: 0; 
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.wrapper .header-top{
    padding-left: 0;
}
@media only screen and (min-width: 1024px){
    .wrapper .page-wrap .footer {
        padding-left: 0;
    }

}
        </style> 
        
    </head>

    <body>
        <div class="wrapper">
           <?php require_once 'layout/header.php'; ?>

            <div class="page-wrap">                                                                              
                <?php 
                 // require_once 'layout/sidebar.php';
                  ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <h1 class="display-4 text-center">You successfully registered to the System</h1>
                        <h1 class="text-center">Please wait for your account to be verified.</h1>
                    </div>
                </div>
                

                
        <footer class="footer">
                    <div class="w-100 clearfix text-center">
                        <!-- <span class="text-center text-sm-left d-md-inline-block">Copyright © 2018 ThemeKit v2.0. All Rights Reserved.</span> -->
                        <!-- float-sm-right -->
                        <span class="float-none  mt-1 mt-sm-0">Subject Evaluation System Version 1.0 Build 2019.06.20 Copyright 2019
                        <!--  <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a> -->
                        </span>
                    </div>
                </footer>
            </div>
        </div> 

        <?php include 'layout/menu_modal.php'; ?> 
        <?php require_once 'default_js_script.php'; ?> 
    </body>
</html>
