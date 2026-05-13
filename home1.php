<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Admin | Dashboard</title>            
        
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
    <?php include "config.php"; ?>  
    <?php  include "menu_bar.php"; ?>
                
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
                        <h1 align="center">Welcome, To Psquare Fitclub Admin Panel</h1>          
                       

                        <div class="row">
                            
                            <a href="view_pro_type.php">
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
                                                        <div class="title">Product Type</div>
                                                    </div>
                                        <?php
                                            $querypt=mysqli_query($con,"select * from product_type ") or die(mysqli_error($con));
                                            $countpt=mysqli_num_rows($querypt);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $countpt; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_pro.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-product-hunt"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Product</div>
                                                    </div>
                                        <?php
                                            $qpro=mysqli_query($con,"select * from product");
                                            $cpro=mysqli_num_rows($qpro);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cpro; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="today_schedule.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-clock-o"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Todays Schedule</div>
                                                    </div>
                                        <?php
                                        date_default_timezone_set("Asia/Kolkata");
                                        $current_date=Date("Y-m-d");
                                        $tsc="select m.*, s.* from member m, schedule s  where s.sd_m_id=m.m_id and s.sd_nxt_chk LIKE '".$current_date."%' and s.sd_status='Not_Visited' ";
                                        $sche=mysqli_query($con,$tsc) or die(mysqli_error($con));
                                        $schecc=mysqli_num_rows($sche);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $schecc; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_member.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-users"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Member</div>
                                                    </div>
                                        <?php
                                            $qm=mysqli_query($con,"select * from member where m_status='Approved' ") or die(mysqli_error($con));
                                            $cm=mysqli_num_rows($qm);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cm; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
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

                        <div class="row">

                            <a href="update_refer.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-gift"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Allocate Referal Reward</div>
                                                    </div>
                                        <?php
                                            $dat=Date('Y-m-d');
                                            $queryref="select * from member where m_refer!='NA' and m_refer_status=''";
                                            $resref=mysqli_query($con,$queryref) or die (mysqli_error($con));
                                            $cmref=mysqli_num_rows($resref);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cmref; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="expire_member.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-user-times"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Expired Member</div>
                                                    </div>
                                        <?php
                                            $dat=Date('Y-m-d');
                                            $queryexmem="select * from member where (m_c_member < '".$dat."') and m_status='Approved' ";
                                            $resexmem=mysqli_query($con,$queryexmem) or die (mysqli_error($con));
                                            $cmexmem=mysqli_num_rows($resexmem);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cmexmem; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="view_purchase_pro.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-th-list"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Total Purchase</div>
                                                    </div>
                                        <?php
                                            $querybill=mysqli_query($con,"select * from purchase_bill") or die (mysqli_error($con));
                                            $cmbill=mysqli_num_rows($querybill);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cmbill; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                        </div>                                                                 
                                        <!-- END WIDGET -->
                                    </li>
                                </ul>
                            </div>
                            </a>

                            <a href="contact_view.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-envelope"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Contact</div>
                                                    </div>
                                        <?php
                                            $qcontact=mysqli_query($con,"select * from contact") or die (mysqli_error($con));
                                            $ccontact=mysqli_num_rows($qcontact);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $ccontact; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
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

                        <div class="row">

                            <a href="birthday_sms.php">
                            <div class="col-md-3">
                                <ul class="app-feature-gallery app-feature-gallery-noshadow margin-bottom-0">
                                    <li>
                                        <!-- START WIDGET -->
                                        <div class="app-widget-tile app-widget-highlight">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="icon icon-lg">
                                                        <span class="fa fa-birthday-cake"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">                             
                                                    <div class="line">
                                                        <div class="title">Member Birthday</div>
                                                    </div>
                                        <?php
                                        date_default_timezone_set("Asia/Kolkata");
                                        $current_date=Date("d/m");
                                        $sqlbir="select * from member where m_dob LIKE '".$current_date."%' ";
                                        $resbir = mysqli_query($con, $sqlbir) or die(mysqli_error($con));
                                            
                                        $cbir=mysqli_num_rows($resbir);
                                        ?>                                        
                                                    <div class="intval text-center"><?php echo $cbir; ?></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="line">
                                                        <div class="subtitle">Last Update:</div>
                                                        <div class="subtitle pull-right text-warning"><a href="#"><?php echo Date('d/m/y'); ?></a></div>
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

                        <div class="row">
                            
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