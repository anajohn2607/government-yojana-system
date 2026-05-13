<!DOCTYPE html>
<html lang="en">
    <head>                        
        <title>Government Yojana Admin | View Registered User</title>            
        
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
                            <li><a href="#">Registered User</a></li>                                                     
                            <li class="active">View Registered User</li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADING -->
                    
                    <!-- START PAGE CONTAINER -->
                    <div class="container">
                                                
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="block block-condensed">
                            <!-- START HEADING -->
                            <div class="app-heading app-heading-small">
                                <div class="title">
                                    <h5>View Registered User </h5>
                                    <!-- <p>The simple, easy-to-implement plugin to export HTML tables to xlsx, xls, csv, and txt files.</p> -->
                                </div>
                                <div class="heading-elements">
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-icon-fixed dropdown-toggle" data-toggle="dropdown"><span class="fa fa-bars"></span> Export Data</button>
                                        <ul class="dropdown-menu dropdown-left">
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"> CSV</a></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"> XLS</a></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"> Word</a></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"> PNG</a></li>
                                            <li><a href="#" onClick ="$('#sortable-data').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"> PDF</a></li>
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                            <!-- END HEADING -->

                            <div class="block-content">
                                
                                <table class="table table-striped table-bordered datatable-extended" id="sortable-data">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Email</th>
                                            <th>Registration Date</th>
                                            <th><center>Action</center></th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
<?php

include "config.php";

$query="select * from user where user_status = 'not_approved' ORDER BY user_id DESC";
$res=mysqli_query($con,$query) or die (mysqli_error($con));
$counter=0;
while($row=mysqli_fetch_array($res))
{
extract($row);
?>
                                        <tr>
                                            <td><?php echo ++$counter; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo isset($row['reg_date']) && !empty($row['reg_date']) ? date('d-m-Y H:i A', strtotime($row['reg_date'])) : 'N/A'; ?></td>
                                            <td align="center">
                    <a class="green" href="approve_user.php?user_id=<?php echo $user_id; ?>" title="Approve User">
                        <i class="ace-icon fa fa-check bigger-130"></i>
                    </a>
                    &nbsp;
                    <a class="red" onClick="return confirm('Are You Sure You Want To Delete This User?');"  href="delete_user.php?user_id=<?php echo $user_id; ?>" title="Delete User">
                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                                            </td>
                                        </tr>
<?php
}
?>
                                    </tbody>
                                </table>
                                
                            </div>
                            
                        </div>  
                                
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
        <!-- THIS PAGE SCRIPTS -->
        <script type="text/javascript" src="js/vendor/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/vendor/datatables/dataTables.bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/vendor/tableexport/tableExport.js"></script>
        <script type="text/javascript" src="js/vendor/tableexport/jquery.base64.js"></script>
        <script type="text/javascript" src="js/vendor/tableexport/html2canvas.js"></script>
        <script type="text/javascript" src="js/vendor/tableexport/jspdf/libs/sprintf.js"></script>
        <script type="text/javascript" src="js/vendor/tableexport/jspdf/jspdf.js"></script>
        <script type="text/javascript" src="js/vendor/tableexport/jspdf/libs/base64.js"></script>
        <!-- END THIS PAGE SCRIPTS -->
        <!-- APP SCRIPTS -->
        <script type="text/javascript" src="js/app.js"></script>
        <script type="text/javascript" src="js/app_plugins.js"></script>
        <script type="text/javascript" src="js/app_demo.js"></script>
        <!-- END APP SCRIPTS -->







    </body>
</html>