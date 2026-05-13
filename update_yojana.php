<?php
include "config.php";

if(isset($_GET['yojana_id']))
{
    $yojana_id = mysqli_real_escape_string($con, $_GET['yojana_id']);
    $query = mysqli_query($con, "select * from yojana where yojana_id='$yojana_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);

    if(!$row) {
        echo "<script>alert('Error: Yojana not found.'); window.location.href='view_yojana.php';</script>";
        exit();
    }

    if(isset($_POST['submit']))
    {
        $yojana_name = mysqli_real_escape_string($con, $_POST['yojana_name']);
        $yojana_description = mysqli_real_escape_string($con, $_POST['yojana_description']);
        $yojana_requirement = mysqli_real_escape_string($con, $_POST['yojana_requirement']);

        $name = $_FILES['yojana_image']['name'];
        $temp = $_FILES['yojana_image']['tmp_name'];
        $desired_dir = "Yojana/";

        if($name)
        {
            // Delete old image if it exists
            if (!empty($row['yojana_image']) && file_exists($desired_dir . $row['yojana_image'])) {
                @unlink($desired_dir . $row['yojana_image']);             
            }
            
            $yojana_image = uniqid() . $name;
            $extension = strtolower(pathinfo($yojana_image, PATHINFO_EXTENSION));
            
            if(move_uploaded_file($temp, $desired_dir . $yojana_image)) {
                $file = $desired_dir . $yojana_image;
                
                // Optional resizing
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
        }
        else
        {
            $yojana_image = $row['yojana_image'];
        }  

        $qw = "update yojana set
            yojana_image='$yojana_image', 
            yojana_name='$yojana_name',
            yojana_description='$yojana_description',
            yojana_requirement='$yojana_requirement'
            where yojana_id='$yojana_id'";
      
        $update = mysqli_query($con, $qw) or die(mysqli_error($con));
        if($update)
        {
            echo '<script type="text/javascript">';
            echo " alert('Yojana Updated Successfully');";
            echo 'window.location.href = "view_yojana.php";';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo "alert('Yojana Not Updated');";
            echo '</script>';
        }
    }
} else {
    header("Location: view_yojana.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana Admin | Update Yojana</title>            
        
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
        <style>
            .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
            .fileinput{margin-left:0px;}
            .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align:left;}
            .preview_box img{max-width: 150px; max-height: 150px;}
        </style> 
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
                            <li class="active">Update Yojana</li>
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
                                            <h2>Update Yojana</h2>
                                        </div>                                
                                    </div>
                                    
                                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Name</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" value="<?php echo $row['yojana_name']?>" name="yojana_name" placeholder="Enter Yojana Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Image</label>
                                            <div class="col-md-10">
                                                <?php
                                                if (empty($row['yojana_image'])) {
                                                    ?>
                                                    <img src="images/No-image-full.jpg" alt="No Image" id="preview_img" height="100px" width="100px"/>
                                                    <?php
                                                } else {
                                                    ?>                                        
                                                    <img src="Yojana/<?php echo $row['yojana_image'];?>" alt="Yojana Image" id="preview_img" height="100px" width="100px" />
                                                    <?php
                                                }
                                                ?>
                                                <input type="file" name="yojana_image" id="image" />                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Description</label>
                                            <div class="col-md-10">
                                                <textarea name="yojana_description" class="form-control" required placeholder="Enter Yojana Description"><?php echo $row['yojana_description']?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-2 control-label">Yojana Requirement</label>
                                            <div class="col-md-10">
                                                <textarea name="yojana_requirement" class="form-control" required placeholder="Enter Yojana Requirement"><?php echo $row['yojana_requirement']?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-2">
                                            </div>
                                            <div class="col-md-10">
                                                <input type="submit" name="submit" value="Update" class="btn btn-success">
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

        <script type="text/javascript">
            $(document).ready(function(){
                $("#image").change(function(){
                    readImageData(this);
                });
            });
             
            function readImageData(imgData){
                if (imgData.files && imgData.files[0]) {
                    var readerObj = new FileReader();
                    
                    readerObj.onload = function (element) {
                        $('#preview_img').attr('src', element.target.result);
                    }
                    
                    readerObj.readAsDataURL(imgData.files[0]);
                }
            }
        </script>
    </body>
</html>