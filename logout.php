<?php
include "functions.php"; // Include functions to access redirect()
session_start(); // Start the session


// Destroy the session to log out the user
session_destroy();
setcookie('PHPSESSID', '', time() - 3600, '/'); // Clear cookie
redirect("login.php");
exit; // Ensure the script stops after redirection
exit;
?>
