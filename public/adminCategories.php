<?php
require 'logincheck.php';
?>
<?php
require 'layout.php';
?>
<h1>Admin Categories</h1>
<ul>
    
    <li><a href="addCategory.php">Add Category</a></li>
    <li><a href="deleteCategory.php">delete Category</a></li>
    <li><a href="editCategory.php">edit Category</a></li>
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