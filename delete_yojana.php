<?php
	
	include "config.php";

	if(isset($_GET['yojana_id']))
	{
	  $yojana_id = mysqli_real_escape_string($con, $_GET['yojana_id']);

	  // Get yojana name first to delete associated applications
	  $get_yojana = mysqli_query($con, "SELECT yojana_name, yojana_image FROM yojana WHERE yojana_id = '$yojana_id'");
	  $yojana_data = mysqli_fetch_assoc($get_yojana);
	  $yojana_name = mysqli_real_escape_string($con, $yojana_data['yojana_name']);
	  $yojana_image = $yojana_data['yojana_image'];

	  // Delete from applied_yojana first (cascading delete manually)
	  mysqli_query($con, "DELETE FROM applied_yojana WHERE yojana_name = '$yojana_name'");

	  // Delete yojana from database
	  $query= "delete from yojana where yojana_id='$yojana_id'" ; 
      $result = mysqli_query($con,$query);
     // $row = mysqli_fetch_array($result); 
	  if($result)
                      {
						 // Optional: Delete yojana image from server
						 $image_path = "Yojana/" . $yojana_image;
						 if (file_exists($image_path)) {
							 unlink($image_path);
						 }

						 echo '<script type="text/javascript">';
						 echo " alert('Yojana and its associated status records deleted successfully!');";
						 echo 'window.location.href = "view_yojana.php";'; 
						 echo '</script>';
	  
                      }
	 else
	 				  {
						 echo '<script type="text/javascript">';
						 echo " alert('Error In Yojana Delete ! ');";
						 echo 'window.location.href = "view_yojana.php";'; 
						 echo '</script>';
	  
                      }
	}
?>