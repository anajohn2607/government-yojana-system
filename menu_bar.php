 <?php

session_start();
if(!isset($_SESSION['email']))
{
         echo "<script>";
         echo "window.location.href='index.php';";
         echo "</script>";
    //header("location:index.php");
}

 ?>
    <!-- APP WRAPPER -->
        <div class="app">           

            <!-- START APP CONTAINER -->
            <div class="app-container">
                <!-- START SIDEBAR -->
                <div class="app-sidebar app-navigation app-navigation-fixed scroll app-navigation-style-default app-navigation-open-hover dir-left" data-type="close-other">
                    <a href="home.php" class="app-navigation-logo">
                        Government Yojana
                    </a>
                    
                    <div class="app-navigation-user">
                        <div class="profile">
                            <img src="img/user/no-image.png" alt="<?php echo $_SESSION['name']; ?>">
                            <div class="profile-info">
                                <div class="profile-title"><?php echo $_SESSION['name']; ?></div>
                                <div class="profile-subtitle">User</div>
                            </div>
                        </div>
                    </div>

                    <nav>
                        <ul>
                            <!-- <li class="title">MAIN</li> -->
                            <li><a href="home.php"> Dashboard</a></li>
                            <!--<li><a href="view_fee_structure.php"> Fee Structure</a></li>
                             <li>
                                <a href="#"> Caste </a>
                                 <ul>
                                    <li><a href="add_caste.php"> Add Caste</a></li>                
                                    <li><a href="view_caste.php"> View Caste</a></li>                
                                </ul>            
                            </li> -->
                            <li>
                                <a href="#"> Yojana </a>
                                 <ul>
                                    <li><a href="apply_yojana.php"> Apply for Yojana</a></li>                
                                    <li><a href="view_applied_yojana.php"> My Applications</a></li>
                                    <li><a href="view_approved_yojana.php"> Approved Yojana</a></li>
                                    <li><a href="view_succeed_yojana.php"> Succeed Yojana</a></li>                
                
                                </ul>            
                            </li>
                            <li>
                                <a href="#"> Settings </a>
                                 <ul>
                                    <li><a href="profile.php"> Profile</a></li>                
                                    <li><a href="change_password.php"> Change Password</a></li>
                                </ul>            
                            </li>
                             <!-- <li class="title">RTL</li> -->
                            <li><a href="logout.php"> Logout</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- END SIDEBAR -->