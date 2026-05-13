<?php
include "config.php";

if (isset($_GET['user_id'])) {
 
          $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
          $approve = mysqli_query($con,"update user set user_status = 'disapproved' where user_id='$user_id' ")or die(mysqli_error($con));

$back="javascript:history.back()";
  if($approve)

          {
            echo '<script type="text/javascript">';
            echo "alert('User Disapproved Successfully!');";
            echo 'window.location.href = "disapproved_user.php";';
            // echo 'window.location.href = "'.$back.'"';
            echo "</script>";

          }
         else
         {
            echo '<script type="text/javascript">';
            echo "alert('User Not Approve');";
            echo 'window.location.href = "'.$back.'"';
            echo "</script>";
             
          }
}
 ?>