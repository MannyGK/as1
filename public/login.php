<?php
   session_start();


   
   require 'layout.php';


   if (isset($_POST['submit'])) {
      $server = 'mysql';
   $username = 'student';
   $password = 'student';
  
   $schema = 'assignment1';
   $pdo = new PDO ('mysql:dbname=' . $schema . ';host='. $server,$username,$password);


      $stmt = $pdo->prepare('SELECT * FROM assignment1.user WHERE email = :email');

      $values = [
          'email' => $_POST['email']
  
      ];
  
      $stmt->execute($values);
  
      $user = $stmt->fetch();




      //this is to Check if they have entered the correct email/password
      if ($_POST['email'] === 'emmanuel.nkenda@outlook.com' && $_POST['password'] === 'secret') {
      $_SESSION['loggedin'] = true;
      echo 'You are now logged in, <a href="more.php">Go to more</a>';
     
      }
      //If not, display an error message
      else {
      echo '<p>You did not enter the correct username and password, <a href="login.php">Go to login</a></p>';
      
      
      }
     }
     

     
     else { //The submit button was not pressed, show the log-in form
     ?>
     <form action="login.php" method="POST">
     <label for="email">Email address</label>
    <input type="text" name="email" />
      <label>Password: </label>
      <input type="password" name="password" />
      <input type="submit" name="submit" value="Log In" />
     </form>
     <?php
     }
     
     
     
    



require 'footer.php';
?>