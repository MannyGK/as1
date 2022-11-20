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

<h1>Add Auction</h1>



<?php
$server = 'mysql';
$username = 'student';
$password = 'student';
$schema = 'assignment1';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);

if(isset($_POST['submit'])){
    $stmt = $pdo->prepare('INSERT INTO assignment1.auction ( categoryid, title, description, endDate)
    VALUES (:categoryid, :title, :description, :endDate)');
    
    $values = [
        'categoryid' => $_POST['categoryid'],
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'endDate' => $_POST['endDate']
    ];
    $stmt->execute($values);
}
else {
  ?>
<form action="addAuction.php" method="POST"> 

<label for = "title"></label>
        <input type ="text" name="title" placeholder="title"/>
        
    <input type="text" name="description" placeholder="description" />
							


        <select name="categoryid">
                <option value="4">home & garden</option>
                <option value="2">electronics</option>
                <option value="1">fashion</option>
                <option value="3">sport</option>
                <option value="5">health</option>
                <option value="6">toys</option>
                <option value="7p">motors</option>

        </select>
        <input type="date" name="endDate" value="<?php echo date('yy-mm-dd'); ?>" />
							

    
        <input type="submit" name="submit" value="submit" />
</form>
<?php
}
?>
<?php
require 'footer.php';
?>