<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 echo 'You are logged in. <a href="logout.php">Click here to log out</a>';
}
else {
 // Redirect to the login page
 header("Location: login.php");
 exit;
}