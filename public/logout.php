<?php
session_start();
unset($_SESSION['loggedin']);
echo 'You are now logged out
<a href="login.php">Go to
login.php</a>';



?>
<?php
require 'layout.php';
?>







<?php
require 'footer.php';
?>