<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Principal | Edit Year</title>            
        
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
                            <li><a href="#">Year</a></li>                                                     
                            <li class="active">Edit Year</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Edit Year</h2>
                                    <!-- <p>Ultra Crisp Line Icons with Integrity</p> -->
                                </div>                                
                            </div>
<?php
                                  
include "config.php";
if(isset($_GET['y_id']))
{
extract($_POST);
$query= mysqli_query($con,"select * from Year where y_id='{$_GET['y_id']}' ") or die(mysqli_error($con)) ;
    
      $row = mysqli_fetch_array($query);
?>       
                            <form class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Year Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="y_name" placeholder="Enter Year Name (Ex. 2018-2019)" value="<?php echo $row['y_name']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                        <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
                                    </div>                                  
                                </div>
                                
                            </form>
<?php

}

?>
                                <?php 
                                    include "config.php";
                                    
                                    if(isset($_POST['submit']))
                                    {
                                        extract($_POST);
                                        
                                        
                                        $update=mysqli_query($con,"update year set
                                        y_name='".$_POST['y_name']."'
                                        where y_id='".$_GET['y_id']."' ") or die (mysqli_error($con));
                                        if($update)
                                        {
                                                    echo "<script>";
                                                    echo "alert('Year Updated Successfully.');";
                                                    echo "window.location.href='view_year.php';";
                                                    echo "</script>";                                                                       
                                        }
                                        
                                        else
                                        {
                                            echo "<script>";
                                            echo 'alert("Year Not Updated");';
                                            echo "window.location.href='view_year.php';";
                                            echo "</script>";
                                        }                              
                            
                                    }
                                ?>                        
                        </div>
                        <!-- END BASIC INPUTS -->
                                
                            </div>
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
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/app_plugins.js"></script>
        <script type="text/javascript" src="js/app_demo.js"></script>
        <!-- END APP SCRIPTS -->
    </body>
</html>