<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

 echo 'You are seeing this because you are logged in. <a href="logout.php">Click here to log out</a>';
}
else {
 echo 'Sorry, you must be logged in to use this page. <a href="login.php">Click here to log in</a>';
}
?>

<?php
require 'layout.php';
require 'functions.php';
require 'database.php';
?>
<h1>More</h1>
<?php


$stmt= $pdo->prepare('SELECT * FROM category');
$stmt->execute();

echo '<select name=category>';
while($category = $stmt ->fetch()){
    echo '<option value="'.$category['id']. '">'.$category['name'].'</option>';
}
echo '</select>';



?>

<ul>
    
    <li><a href="adminCategories.php">administer Categories </a></li>
     <li><a href="addAuction.php">Add Auction</a></li>
    <li><a href="register.php">register account</a></li>
    <li><a href="index.php">return to home</a></li>
</ul>


<?php
require 'footer.php';
?>