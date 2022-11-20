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


<?php
$pdo = new PDO('mysql:dbname=games;host=mysql', 'student', 'student');

if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE auction
						   SET title = :title , description = :description
						   WHERE categoryid = :categoryid');

	$values = [
		'title' => $_POST['title'],
		'categoryid' => $_POST['categoryd'],
		'description' => $_POST['desscription']
	];

	$stmt->execute($values);
	echo 'auction ' . $_POST['title'] . ' edited';
}
//If the form has not been submitted, check that a game has been selected to be edited e.g. editgame.php?id=3
else if (isset($_GET['categoryid'])) {

	$auctionstmt = $pdo->prepare('SELECT * FROM auction WHERE categoryid = :categoryid');

	$values = [
		'categoryid' => $_GET['categoryid']
	];

	$auctionstmt->execute($values);

	$auction = $auctionstmt->fetch();
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