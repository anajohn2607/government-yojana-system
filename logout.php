<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['name']);

// Delete all session variables
session_destroy();

// Jump to login page
echo '<script type="text/javascript">'; 
echo 'alert("Logout Successfully");';
echo "window.location.href = 'index.php';";
echo '</script>'; 
?>