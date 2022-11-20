<?php
   session_start();
if (isset($_POST['submit'])) {


    $_SESSION['loggedin'] = true;
   echo 'return to home
    <a href="index.php">return to index.php</a>';
   }

?>
<?php
require 'layout.php';
?>

<h1>login</h1>

<form action="login.php" method="POST">
<label for="email">Email address</label>
    <input type="text" name="email" />
    <label for="password">Password</label>
    <input type="text" name="password" />
 <input type="submit" name="submit" value="Submit" />
</form>



<?php
require 'footer.php';
?>