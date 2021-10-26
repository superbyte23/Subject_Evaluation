        

        <script src="../plugins/jquery/jquery-3.3.1.min.js"></script>
        <!-- <script>window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script> -->
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
        <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 
        <script src="../plugins/moment/moment.js"></script>
        <script src="../plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="../plugins/d3/dist/d3.min.js"></script>
        <script src="../plugins/c3/c3.min.js"></script>
        <script src="../js/tables.js"></script>
        <!-- <script src="../js/widgets.js"></script> -->
        <script src="../dist/js/theme.min.js"></script>
        <script src="../plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        <!-- <script src="../plugins/chartist/dist/chartist.min.js"></script>         -->
        <!-- <script src="../js/widget-statistic.js"></script> -->
        <script> 
            $(document).ready(function(){
                $('.modal').on('show.bs.modal', function (e){
                    $('body').addClass('no-scroll');
                });

                 $('.modal').on('hidden.bs.modal', function (e){
                    $('body').removeClass('no-scroll');
                });


                // setTimeout(function() {
                //   let destroy = true;
                //   $.ajax({
                //     type: 'POST',
                //     url: 'destroy_session.php',
                //     data: {
                //       destroy:destroy
                //     },
                //     success:function(){
                //       alert("Session Expired due to system inactivity!");
                //       window.location = "login.php";
                //     }
                //   });
                // }, 1800000‬);
            });  
        </script>