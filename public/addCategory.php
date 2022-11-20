<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

 echo 'You are seeing this because you are logged in. <a href="logout.php">Click here to log out</a>';
}
else {
 echo 'Sorry, you must be logged in to view this page. <a href="login.php">Click here to log in</a>';
}
?>
<?php
require 'layout.php';
?>


<h1>Add Category</h1>

<form action="addCategory.php" method="POST">
    
       

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

$stmt= $pdo->prepare('SELECT * FROM category');
$stmt->execute();

echo '<select name=category>';
while($category = $stmt ->fetch()){
    echo '<option value="'.$category['id']. '">'.$category['name'].'</option>';
}
echo '</select>';
?>
 <label for = "name"></label>
        <input type ="text" name="name"/>
        <input type="submit" value="submit" name="submit">
</form>
</body>
</html>

<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);



if(isset($_POST['submit'])){
    $stmt = $pdo->prepare('INSERT INTO assignment1.category (name)
    VALUES (:name)');
    
    $values = [
        'name' => $_POST['name']
    ];
    $stmt->execute($values);
    
 
}

  ?>





<?php
require 'footer.php';
?>