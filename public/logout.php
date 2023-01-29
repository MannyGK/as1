<?php
session_start();
// unset the admin session variable
unset($_SESSION['loggedin']);
echo 'You are now logged out
<a href="login.php">Go to
logincheck.php</a>';

// redirect the user to the login page
header("location: login.php");

?>
<?php
require 'layout.php';
?>







<?php
require 'footer.php';
?>