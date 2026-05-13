<?php
include "config.php";

if (isset($_GET['yojana_id'])) {
    $yojana_id = mysqli_real_escape_string($con, $_GET['yojana_id']);
    
    // Check if applied yojana exists
    $check = mysqli_query($con, "SELECT * FROM applied_yojana WHERE yojana_id = '$yojana_id'");
    if (mysqli_num_rows($check) > 0) {
        $row = mysqli_fetch_array($check);
        $file_path = "user_docs/" . $row['yojana_requirements'];
        
        // Delete applied yojana
        $delete = mysqli_query($con, "DELETE FROM applied_yojana WHERE yojana_id = '$yojana_id'");
        
        if ($delete) {
            // Optional: Delete associated document file from server
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            echo "<script>";
            echo "alert('Applied Yojana Status Deleted Successfully!');";
            echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Error deleting applied yojana: " . mysqli_error($con) . "');";
            echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('Applied Yojana record not found!');";
        echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
        echo "</script>";
    }
} else {
    header("Location: home.php");
}
?>