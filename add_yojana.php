<?php
include "config.php";

if(isset($_POST['submit']))
{
    $yojana_name = mysqli_real_escape_string($con, $_POST['yojana_name']);
    $yojana_description = mysqli_real_escape_string($con, $_POST['yojana_description']);
    $yojana_requirement = mysqli_real_escape_string($con, $_POST['yojana_requirement']);

    $df1 = md5(time());
    $name1 = $_FILES['yojana_image']['name'];
    $temp = $_FILES['yojana_image']['tmp_name'];
    $dst1 = $df1 . $name1;
    $desired_dir = "Yojana/";

    // Move the uploaded file first
    if(move_uploaded_file($temp, $desired_dir . $dst1))
    {
        $file = $desired_dir . $dst1;
        $extension = strtolower(pathinfo($dst1, PATHINFO_EXTENSION));

        // Optional image resizing - check if GD functions exist
        if (function_exists('imagecreatetruecolor') && function_exists('imagecreatefromjpeg') && function_exists('imagecreatefrompng')) {
            list($width, $height) = @getimagesize($file);
            if ($width && $height) {
                $modwidth = 150;
                $modheight = 103;
                $tn = imagecreatetruecolor($modwidth, $modheight);
                $image = null;

                if($extension == "jpg" || $extension == "jpeg") {
                    $image = @imagecreatefromjpeg($file);
                } else if($extension == "png") {
                    $image = @imagecreatefrompng($file);
                }

                if($image) {
                    imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);
                    imagejpeg($tn, $file, 100);
                    imagedestroy($tn);
                    imagedestroy($image);
                }
            }
        }
    }

    $query = mysqli_query($con, "insert into yojana(yojana_name, yojana_description, yojana_image, yojana_requirement) values ('$yojana_name', '$yojana_description', '$dst1', '$yojana_requirement')") or die(mysqli_error($con));

    if($query)
    {   
        echo "<script>";
        echo "alert('New Yojana Added Successfully!');";
        echo "window.location.href='view_yojana.php';";
        echo "</script>";
    }
    else
    {
        echo "<script>";
        echo "alert('Error adding Yojana: " . mysqli_error($con) . "');";
        echo "</script>";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana Admin | Add Yojana</title>            
        
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
                    
                        <?php include "top_bar.php"; ?>
                        
                    </div>
                    <!-- END APP HEADER  -->
                    
                    <div class="app-heading-container app-heading-bordered bottom">
                        <ul class="breadcrumb">
                            <li><a href="#">Yojana</a></li>                                                     
                            <li class="active">Add Yojana</li>
                        </ul>
                    </div>
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-12">
                                
                                <!-- BASIC INPUTS -->
                                <div class="block">                        
                                    
                                    <div class="app-heading app-heading-small">                                
                                        <div class="title">
                                            <h2>Add Yojana</h2>
                                        </div>                                
                                    </div>
                                          
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" name="yojana_name" placeholder="Enter Yojana Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Image</label>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="yojana_image" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Description</label>
                                            <div class="col-md-10">
                                                <textarea name="yojana_description" class="form-control" required placeholder="Enter Yojana Description"></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Requirement</label>
                                            <div class="col-md-10">
                                                <textarea name="yojana_requirement" class="form-control" required placeholder="Enter Yojana Requirement"></textarea>
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
                        
           <?php include "footer.php"; ?>

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