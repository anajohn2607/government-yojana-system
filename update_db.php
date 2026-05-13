<?php
include "config.php";

// Add aadhar_card and pan_card columns to applied_yojana table
$sql = "ALTER TABLE applied_yojan ADD COLUMN pan_card VARCHAR(255) AFTER aadhar_card";

if (mysqli_query($con, $sql)) {
    echo "Table updated successfully";
} else {
    echo "Error updating table: " . mysqli_error($con);
}
?>