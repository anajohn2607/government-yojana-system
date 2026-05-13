<?php
include "config.php";

if (isset($_GET['yojana_id'])) {
 
          $yojana_id = mysqli_real_escape_string($con, $_GET['yojana_id']);
          $approve = mysqli_query($con,"update applied_yojana set yojana_status = 'pending' where yojana_id='$yojana_id' ")or die(mysqli_error($con));

$back="javascript:history.back()";
  if($approve)

          {
            echo '<script type="text/javascript">';
            echo "alert('Applied Yojana Disapproved Successfully!');";
            echo 'window.location.href = "view_applied_yojana.php";';
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