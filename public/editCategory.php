<?php
require 'logincheck.php';
?>
<?php
require 'layout.php';
require 'functions.php';
require 'database.php';
?>

<ul>
    <li><a href="addCategory.php">add Category</a></li>
    <li><a href="deleteCategory.php">delete Category</a></li>
    <li><a href="editAuction.php">edit Auction</a></li>
</ul>


<h1>edit Category</h1>

<form action="editCategory.php" method="POST">
    
       

<?php
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
if(isset($_POST['submit'])){
    $stmt = $pdo->prepare('UPDATE assignment1.category (name)
    VALUES (:name)');
    
    $values = [
        'name' => $_POST['name']
    ];
    $stmt->execute($values);
    
 
}


require 'footer.php';
?>