<?php 
include "config.php";
include "menu_bar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana User | Dashboard</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="css/styles.css">
        <!-- EOF CSS INCLUDE -->
    </head>
    <body>        
                
                <!-- START APP CONTENT -->
                <div class="app-content app-sidebar-left">
                    <!-- START APP HEADER -->
                    <div class="app-header">
                        <ul class="app-header-buttons">
                            <li class="visible-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-toggle=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
                            <li class="hidden-mobile"><a href="#" class="btn btn-link btn-icon" data-sidebar-minimize=".app-sidebar.dir-left"><span class="icon-menu"></span></a></li>
                        </ul>
                        <form class="app-header-search" action="" method="post">        
                            <input type="text" name="keyword" placeholder="Search">
                        </form>    
                    
                        <?php include"top_bar.php"; ?>
                        
                    </div>
                    <!-- END APP HEADER  -->
                    
                    <!-- START PAGE HEADING -->
                    <!-- <div class="app-heading app-heading-bordered app-heading-page"> -->
                       <!--  <div class="icon icon-lg">
                            <span class="icon-laptop-phone"></span>
                        </div> -->
                       <!--  <div class="title">
                            <h1>Boooya - Admin Template</h1>
                            <p>The revolution in admin template build</p>
                        </div>  -->              
                        <!--<div class="heading-elements">
                            <a href="#" class="btn btn-danger" id="page-like"><span class="app-spinner loading"></span> loading...</a>
                            <a href="https://themeforest.net/item/boooya-revolution-admin-template/17227946?ref=aqvatarius&license=regular&open_purchase_for_item_id=17227946" class="btn btn-success btn-icon-fixed"><span class="icon-text">$24</span> Purchase</a>
                        </div>-->
                    <!-- </div> -->
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Application</a></li>                                                     
                            <li class="active">Dashboard</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                        <h1 align="center">Welcome, <?php echo $_SESSION['name']; ?>!</h1>
                        <p align="center" class="text-muted">To Government Yojana User Panel</p>
                       

                        <div class="row">
                            
                            <a href="view_yojana.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-tasks"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Total Released Yojana</div>
                                                    </div>
                                        <?php
                                            $yojana = mysqli_query($con,"select * from yojana ") or die(mysqli_error($con));
                                            $countyojana=mysqli_num_rows($yojana);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $countyojana; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="view_yojana.php"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_applied_yojana.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-check"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Applied Yojana</div>
                                                    </div>
                                        <?php
                                            $applied_yojana=mysqli_query($con,"select * from applied_yojana where email = '".$_SESSION['email']."' && yojana_status = 'pending'");
                                            $count_applied_yojana=mysqli_num_rows($applied_yojana);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $count_applied_yojana; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="view_applied_yojana.php"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_approved_yojana.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                           <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-check text-warning"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Approved Yojana</div>
                                                    </div>
                                        <?php
                                            $approve_yojana=mysqli_query($con,"select * from applied_yojana where email = '".$_SESSION['email']."' && yojana_status = 'approved'");
                                            $count_approve_yojana=mysqli_num_rows($approve_yojana);
                                        ?>                                        
                                                    <div class="intval text-center text-warning"><?php echo $count_approve_yojana; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="view_approved_yojana.php" class="text-warning"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                   
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_succeed_yojana.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-check text-success"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Succeed Yojana</div>
                                                    </div>
                                        <?php
                                            $succeed_yojana=mysqli_query($con,"select * from applied_yojana where email = '".$_SESSION['email']."' && yojana_status = 'succeed'");
                                            $count_succeed_yojana=mysqli_num_rows($succeed_yojana);
                                        ?>                                        
                                                    <div class="intval text-center text-success"><?php echo $count_succeed_yojana; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-success"><a href="view_succeed_yojana.php" class="text-success"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>
                        </div>



                        

                       
                        
                    </div>
                    <!-- END PAGE CONTAINER -->
                    
                </div>
                <!-- END APP CONTENT -->
                                
            </div>
            <!-- END APP CONTAINER -->
                        
           <?php include"footer.php"; ?>

            <!-- START APP SIDEPANEL -->
           
            <!-- END APP SIDEPANEL -->
            
            <!-- APP OVERLAY -->
            <div class="app-overlay"></div>
            <!-- END APP OVERLAY -->
        </div>        
        <!-- END APP WRAPPER -->                
        
        <!-- IMPORTANT SCRIPTS -->
        <script type="text/javascript" src="js/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/vendor/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/vendor/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vendor/moment/moment.min.js"></script>
        <script type="text/javascript" src="js/vendor/customscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END IMPORTANT SCRIPTS -->
        <!-- THIS PAGE SCRIPTS -->
        <script type="text/javascript" src="js/vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>
        
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap.min.js"></script>
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script type="text/javascript" src="js/vendor/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        
        <script type="text/javascript" src="js/vendor/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/vendor/rickshaw/rickshaw.min.js"></script>
        <!-- END THIS PAGE SCRIPTS -->
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/app_plugins.js"></script>
        <script type="text/javascript" src="js/app_demo.js"></script>
        <!-- END APP SCRIPTS -->
        <script type="text/javascript" src="js/app_demo_dashboard.js"></script>
    </body>
</html>