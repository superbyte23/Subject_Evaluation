<?php
require_once '../config/session.php';
require_once '../config/connection.php';
require_once '../Model/User.php';
$session = new app_session;
$db = new Connection; 
$user = new User($db);
$user_info = $user->get_user($_SESSION['user_id']);
if(!$session->session_check()){
    header('location: login.php');
}

require_once '../Library/Settings.php';
$sem = $settings->get_active_semester(); 
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
        
        <!-- <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css"> 
        <link rel="stylesheet" href="../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap.css">
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <link rel="stylesheet" href="../plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>  -->

        <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> 
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../plugins/weather-icons/css/weather-icons.min.css">
        <link rel="stylesheet" href="../plugins/c3/c3.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="../dist/css/theme.min.css">
        <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
             
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
                    width: 100%; 
                    z-index: 1000;  
                    margin: 0 auto;
                    max-height: 100px;
                    overflow-y: scroll;
            }
            .clear-text{
                cursor: pointer;
            } 
        </style> 
    </head>
