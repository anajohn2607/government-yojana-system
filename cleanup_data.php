<?php
include "config.php";

echo "<h2>Yojana Data Cleanup Script</h2>";

// Find yojanas with corrupted data (including HTML formatted warnings)
$query = "SELECT yojana_id, yojana_name, yojana_description, yojana_requirement FROM yojana 
          WHERE yojana_description LIKE '%Warning:%' 
          OR yojana_requirement LIKE '%Warning:%'
          OR yojana_description LIKE '%Error:%'
          OR yojana_requirement LIKE '%Error:%'
          OR yojana_description LIKE '%<b>Warning</b>%'
          OR yojana_requirement LIKE '%<b>Warning</b>%'";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Found " . mysqli_num_rows($result) . " corrupted yojana records. Cleaning up...<br><br>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['yojana_id'];
        $name = $row['yojana_name'];
        
        echo "Cleaning yojana: <strong>$name</strong> (ID: $id)... ";
        
        $new_desc = "Please update the description for this yojana.";
        $new_req = "Please update the requirements for this yojana.";
        
        $update_query = "UPDATE yojana SET 
                         yojana_description = '$new_desc', 
                         yojana_requirement = '$new_req' 
                         WHERE yojana_id = '$id'";
        
        if (mysqli_query($con, $update_query)) {
            echo "<span style='color: green;'>Success!</span><br>";
        } else {
            echo "<span style='color: red;'>Failed: " . mysqli_error($con) . "</span><br>";
        }
    }
    echo "<br><strong>Cleanup complete. Please go to the Admin Panel and update the details for these yojanas.</strong>";
} else {
    echo "No corrupted data found. Your yojanas look good!";
}
?>
