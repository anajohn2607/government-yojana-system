<?php
include "config.php";

if (isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
    
    // Check if user exists
    $check = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$user_id'");
    if (mysqli_num_rows($check) > 0) {
        // Delete user
        $delete = mysqli_query($con, "DELETE FROM user WHERE user_id = '$user_id'");
        
        if ($delete) {
            echo "<script>";
            echo "alert('User Deleted Successfully!');";
            echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Error deleting user: " . mysqli_error($con) . "');";
            echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('User not found!');";
        echo "window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';";
        echo "</script>";
    }
} else {
    header("Location: home.php");
}
?>