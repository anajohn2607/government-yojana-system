<?php 
include "menu_bar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana User | Profile</title>            
        
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
                            <li><a href="#">Settings</a></li>                                                     
                            <li class="active">Profile</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-12">
<?php 
include "config.php";

// Function to show "Not Set" for empty fields
if (!function_exists('showVal')) {
    function showVal($val) {
        return !empty($val) ? htmlspecialchars($val) : '<span class="text-muted">Not Set</span>';
    }
}

if(isset($_SESSION['user_id']))
{
      $userId = mysqli_real_escape_string($con, $_SESSION['user_id']);
      $query = mysqli_query($con,"SELECT * FROM user WHERE user_id='$userId'") or die(mysqli_error($con)); 
      $row = mysqli_fetch_array($query); 
      
      if(!$row) {
          echo "<div class='alert alert-danger'>User profile not found. Please contact administrator.</div>";
      } else {
?>                        
                              <!-- PROFILE CARD -->
                                <div class="block block-condensed">
                                    <div class="block-heading margin-bottom-0">

                                        <div class="app-heading app-heading-small">
                                            <div class="contact contact-rounded contact-bordered contact-lg margin-bottom-0">
                                                <img src="img/user/no-image.png" alt="<?php echo htmlspecialchars($row['name']); ?>">
                                                <div class="contact-container">
                                                    <a href="#"><?php echo !empty($row['name']) ? htmlspecialchars($row['name']) : 'Unnamed User'; ?></a>
                                                    <span>User ID: #<?php echo $row['user_id']; ?></span>
                                                </div>                                                
                                            </div>
                                            <div class="heading-elements hidden-mobile">
                                                <a href="edit_profile.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit Profile</a>
                                            </div>
                                        </div>                                                                                

                                    </div>
                                    <div class="block-content row-table-holder">                                                                                
                                        
                                        <div class="row row-table">
                                             <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Full Name:</span>
                                                <p><?php echo showVal($row['name']); ?></p>
                                            </div>  
                                            <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Email Address:</span>
                                                <p><?php echo htmlspecialchars($row['email']); ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Phone Number:</span>
                                                <p><?php echo showVal($row['phone']); ?></p>
                                            </div>
                                                                                     
                                        </div>
                                        <div class="row row-table border-top">
                                            <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Aadhar No:</span>
                                                <p><?php echo showVal($row['aadhar_no']); ?></p>
                                            </div>

                                            <div class="col-md-4 col-xs-12 border-left border-right">
                                                <span class="text-bolder text-uppercase text-sm">Address:</span>
                                                <p><?php echo showVal($row['address']); ?></p>
                                            </div>
                                            
                                            <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Account Status:</span>
                                                <p>
                                                    <?php 
                                                    if($row['user_status'] == 'approved') {
                                                        echo '<span class="label label-success">Approved</span>';
                                                    } else {
                                                        echo '<span class="label label-warning">' . ucfirst(htmlspecialchars($row['user_status'])) . '</span>';
                                                    }
                                                    ?>
                                                </p>
                                            </div>                                            
                                        </div>
                                        <div class="row row-table border-top">
                                            <div class="col-md-4 col-xs-12">
                                                <span class="text-bolder text-uppercase text-sm">Registration Date:</span>
                                                <p><?php echo isset($row['reg_date']) && !empty($row['reg_date']) ? date('d-m-Y H:i A', strtotime($row['reg_date'])) : '<span class="text-muted">N/A</span>'; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PROFILE CARD -->  
<?php
      }
} else {
    echo "<div class='alert alert-danger'>Session expired. Please log in again.</div>";
}
?>                              
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