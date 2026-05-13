<?php
if(isset($_POST["yojana_name"])){
	 $str = $_POST['yojana_name'];
				
     include "config.php"; 

	   $select1=mysqli_query($con,"select * from yojana where yojana_name='".$str."'") or die(mysqli_error($con));
	   
	  
	 while($sele1=mysqli_fetch_array($select1))
{
	echo $sele1['yojana_image'];

	}	 
		
}
?>