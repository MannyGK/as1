<?php
require 'logincheck.php';
?>
<?php
require 'layout.php';
?>


<ul>
    <li><a href="addCategory.php">add Category</a></li>
    <li><a href="editCategory.php">edit Category</a></li>
   
</ul>



<h1>Delete category</h1>

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
    $stmt = $pdo->prepare('DELETE FROM assignment1.category (name)
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