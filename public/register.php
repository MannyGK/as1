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

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

// If the submit button was pressed
if (isset($_POST['submit'])) {
$stmt = $pdo->prepare('INSERT INTO assignment1.user (email, password, name)
 VALUES (:email, :password, :name)
');
$values = [
 'name' => $_POST['name'],
 'password' => $_POST['password'],
 'email' => $_POST['email']
 ];
$stmt->execute($values);
}
else {
?>
<form action="register.php" method="POST">
<label>Name:</label>
<input type="text" name="name" />
<label>Password:</label>
<input type="password" name="password" />
<label>Email:</label>
<input type="text" name="email" />
<input type="submit" name="submit" value=”Submit” />
</form>
<?php
}
?>








<?php
require 'footer.php';
?>