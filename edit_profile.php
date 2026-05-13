<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana User | Edit Profile</title>            
        
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
                                
                                <!-- BASIC INPUTS -->
                        <div class="block">                        
                            
                            <div class="app-heading app-heading-small">                                
                                <div class="title">
                                    <h2>Edit Profile</h2>
                                </div>                                
                            </div>
<?php
                                  
include "config.php";
if(isset($_GET['user_id']))
{
    $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
    $query = mysqli_query($con, "SELECT * FROM user WHERE user_id='$user_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
?>       
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter User Name" value="<?php echo $row['name']; ?>" required>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Aadhar Card No</label>
                                    <div class="col-md-10">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="12" pattern="\d{12}" class="form-control" name="aadhar_no" placeholder="Enter Aadhar Card No" value="<?php echo $row['aadhar_no']; ?>" required title="Please enter valid 12-digit Aadhar number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Email</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>" readonly required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Address</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="address"><?php echo $row['address'] ?></textarea>
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Mobile No</label>
                                    <div class="col-md-10">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="10" pattern="\d{10}" class="form-control" name="phone" placeholder="Enter Mobile No" value="<?php echo $row['phone']; ?>" required title="Please enter valid 10-digit phone number">
                                    </div>  
                                </div>
                              
                                <div class="form-group">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                        <input type="submit" name="submit" value="Update Profile" class="btn btn-success">
                                        <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
                                    </div>                                  
                                </div>
                                
                            </form>
<?php
}

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $aadhar_no = mysqli_real_escape_string($con, $_POST['aadhar_no']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    // Server-side validation
    if (strlen($phone) != 10) {
        echo "<script>alert('Please enter valid 10-digit phone number');</script>";
    } elseif (strlen($aadhar_no) != 12) {
        echo "<script>alert('Please enter valid 12-digit Aadhar number');</script>";
    } else {
        $upquery = "UPDATE user SET 
                    name = '$name', 
                    aadhar_no = '$aadhar_no', 
                    address = '$address', 
                    phone = '$phone' 
                    WHERE user_id = '$user_id'";
        
        $update = mysqli_query($con, $upquery) or die(mysqli_error($con));
        if($update)
        {
            echo '<script type="text/javascript">';
            echo " alert('User Profile Updated Successfully');";
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo "alert('Error: User Profile Not Updated');";
            echo '</script>';
        }
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