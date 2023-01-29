<?php
require 'logincheck.php';
?>
<?php
require 'layout.php';
require 'functions.php';
require 'database.php';
?>


<?php
if(isset($_POST['submit'])){
    $stmt = $pdo->prepare('UPDATE assignment1.auction ( categoryid, title, description, endDate)
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


/*
	$auctionstmt = $pdo->prepare('SELECT * FROM auction WHERE id = :id');
	$values = [
		'id' => $_GET['id']
	];

	$auctionstmt->execute($values);

	$auction = $auctionstmt->fetch();
?>
<form action="editAuction.php" method="POST" id="formAuction"> 
<input type="hidden" name="categoryid" value="<?php echo $_GET['categoryid']; ?>"/>
<label for = "title"></label>
<input type ="text" name="title" placeholder="title"  value="<?php echo $auction['title'];?>/>

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



if (isset($_POST['submit'])) {
	$stmt = $pdo->prepare('UPDATE auction
	SET title = :title, description = :description, categoryid = :categoryid, endDate = :endDate
	WHERE id = :id');

	$values = [
		'title' => $_POST['title'],
		'categoryid' => $_POST['categoryid'],
		'description' => $_POST['description'],
		'endDate' => $_POST['endDate'],
        
	];

	$stmt->execute($values);
	echo 'auction '. $_POST['categoryid'].'has been edited';
}


*/
?>



<?php
require 'footer.php';
?>