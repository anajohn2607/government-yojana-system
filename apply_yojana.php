<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana User | Apply For Yojana</title>            
        
        <!-- META SECTION -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

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
                            <li><a href="#">Yojana</a></li>                                                     
                            <li class="active">Add Yojana</li>
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
                                    <h2>Apply For Yojana</h2>
                                    <!-- <p>Ultra Crisp Line Icons with Integrity</p> -->
                                </div>                                
                            </div>
                                  
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Yojana Name</label>
                                    <div class="col-md-10">
                                       <select name="yojana_name" id="yojana_name" class="form-control">
                                         <option value="">--Select Yojana--</option>
                                       <?php
                                        include "config.php";

                                          $yoj = mysqli_query($con,"select * from yojana") or die(mysqli_error($con));
                                          while ($row = mysqli_fetch_array($yoj)) {
                                            extract($row);
                                          
                                        ?>

                                       
                                        <option value="<?php echo $row['yojana_name'] ?>"><?php echo $row['yojana_name'] ?></option>

                                       <?php } ?> 
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Yojana Documents</label>
                                     <div class="col-md-10">
                                     <textarea name="yojana_requirement" id="yojana_requirement" class="form-control" required="" placeholder="Required documents will appear here" readonly=""></textarea>
                                 </div>
                                </div>
                                <div id="dynamic_docs_container">
                                    <!-- Dynamic upload fields will be generated here -->
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
                       
                       <?php 
                       include "config.php";

error_reporting(0);

// Ensure the dynamic documents table exists
$sql1 = "CREATE TABLE IF NOT EXISTS `applied_yojana_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
mysqli_query($con, $sql1);

    if(isset($_POST['submit']))
    {
        $yojana_name = mysqli_real_escape_string($con, $_POST['yojana_name']);
        $email = $_SESSION['email'];
        $desired_dir = "../admin/user_docs/";

        // Insert application record
        $query = "INSERT INTO applied_yojana(yojana_name, email, yojana_status) VALUES ('$yojana_name', '$email', 'pending')";
        $add_app = mysqli_query($con, $query);
        $application_id = mysqli_insert_id($con);

        if($add_app)
        {
            $aadhar_file = "";
            $pan_file = "";

            // Handle multiple dynamic uploads
            if(isset($_FILES['docs'])) {
                foreach($_FILES['docs']['name'] as $doc_name_key => $file_name) {
                    if(!empty($file_name)) {
                        $tmp_name = $_FILES['docs']['tmp_name'][$doc_name_key];
                        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                        $new_name = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9]/", "_", $doc_name_key) . "." . $ext;
                        
                        if(move_uploaded_file($tmp_name, $desired_dir . $new_name)) {
                            $doc_name = mysqli_real_escape_string($con, $doc_name_key);
                            $doc_file = mysqli_real_escape_string($con, $new_name);
                            mysqli_query($con, "INSERT INTO applied_yojana_docs (application_id, doc_name, file_path) VALUES ('$application_id', '$doc_name', '$doc_file')");

                            // For backward compatibility with existing admin views
                            if(stripos($doc_name, "aadhar") !== false) {
                                $aadhar_file = $doc_file;
                            }
                            if(stripos($doc_name, "pan") !== false) {
                                $pan_file = $doc_file;
                            }
                        }
                    }
                }
            }

            // Update main record with Aadhar and PAN if found
            if($aadhar_file != "" || $pan_file != "") {
                $update_query = "UPDATE applied_yojana SET aadhar_card = '$aadhar_file', pan_card = '$pan_file' WHERE yojana_id = '$application_id'";
                mysqli_query($con, $update_query);
            }

            echo '<script type="text/javascript">';
            echo " alert('Yojana Applied Successfully!');";
            echo 'window.location.href = "view_applied_yojana.php";';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo " alert('Error: Yojana could not be applied: " . mysqli_error($con) . "');";
            echo 'window.location.href = "apply_yojana.php";';
            echo '</script>';
        }
    }
                                ?>
                        
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
    <script type="text/javascript">
  $(document).ready(function(){
    $("select#yojana_name").change(function(){
          var r = $("#yojana_name option:selected").val();

          if(r == "") {
              $("#yojana_requirement").val("");
              $("#dynamic_docs_container").html("");
              return;
          }

          $.ajax({
              type: "POST",
              url: "yojana_requirement.php", 
              data: { yojana_name : r  } 
          }).done(function(data){
              $("#yojana_requirement").val(data);
              
              // Generate dynamic upload fields
              // Split by comma or newline and remove empty entries
              var requirements = data.split(/[,\n]/).map(s => s.trim()).filter(s => s !== "");
              var html = "";
              var uniqueDocs = [];

              requirements.forEach(function(req) {
                  var cleanReq = req.replace(/^\d+[\.\)\s]+/, "").trim();
                  if(cleanReq === "") return;
                  
                  // Normalize Aadhar naming to prevent duplicates
                  if(cleanReq.toLowerCase().includes("aadhar")) {
                      cleanReq = "Aadhar Card";
                  }
                  
                  // Add to unique list if not already present
                  if(uniqueDocs.indexOf(cleanReq) === -1) {
                      uniqueDocs.push(cleanReq);
                  }
              });

              uniqueDocs.forEach(function(docName) {
                  html += generateUploadField(docName, true);
              });

              $("#dynamic_docs_container").hide().html(html).fadeIn(500);
          });
      });

      function generateUploadField(docName, isMandatory) {
          var requiredAttr = isMandatory ? 'required' : '';
          
          return '<div class="form-group">' +
                 '<label class="col-md-2 control-label">' + docName + '</label>' +
                 '<div class="col-md-10">' +
                 '<div class="input-group">' +
                 '<span class="input-group-addon"><span class="fa fa-cloud-upload"></span></span>' +
                 '<input name="docs[' + docName + ']" type="file" ' + requiredAttr + ' accept=".jpg,.jpeg,.png,.pdf" class="form-control">' +
                 '</div>' +
                 '<p class="help-block">Please upload a clear scanned copy of your ' + docName + ' (JPG, PNG, or PDF).</p>' +
                 '</div>' +
                 '</div>';
      }
  });
</script>

</html>