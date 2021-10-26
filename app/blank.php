<?php require_once 'layout/main.php'; ?>

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
                                            <h5>Blank Page</h5>
                                            <span>Customize blank page</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <a href="#" class="btn btn-success"><i class="ik ik-plus"></i>Button 1</a>
                                        <button type="button" class="btn btn-danger"><i class="ik ik-trash"></i>Button 2</button>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php require_once 'message_notifications.php'; ?>

                <?php require_once 'layout/footer.php'; ?>
                
            </div>
        </div>

        <?php include 'layout/menu_modal.php'; ?>
        
        <?php require_once 'default_js_script.php'; ?>
    </body>
</html>
