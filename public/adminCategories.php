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
<h1>Admin Categories</h1>
<ul>
    
    <li><a href="addCategory.php">Add Category</a></li>
    <li><a href="deleteCategory.php">delete Category</a></li>
</ul>

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
<form action="addCategory.php" method="GET">
<label for = "name"></label>
        <input type ="text" name="name"/>
        <input type="submit" value="submit" name="submit">
</form>
<?php
if(isset($_GET['submit'])){
    $stmt = $pdo->prepare('SELECT FROM assignment1.category (name)
    VALUES (:name)');
    
    $values = [
        'name' => $_GET['name']
    ];
    $stmt->execute($values);
}
?>











<?php
require 'footer.php';
?>