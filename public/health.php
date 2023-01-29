<?php
require 'layout.php';
require 'functions.php';
require 'database.php';
?>





<ul>
<li><a href="editAuction.php">edit Auction</a></li>
    <li><a href="addAuction.php">Add Auction</a></li>
</ul>

<h1>Select Auction</h1>


<ul>
<?php


$stmt= $pdo->prepare('SELECT * FROM auction WHERE categoryid=5');
$stmt->execute();


foreach($stmt as $row)
{
    echo '<li><a href="health.php=' . $row['categoryid'] . '">' . $row['title'] . '">' . $row
    ['description'] . '">' . $row['endDate'] . '</a><li>';
}

?>
 </ul>

 <form>
							<label>Add your review</label> <textarea name="reviewtext"></textarea>

							<input type="submit" name="submit" value="Add Review" />
						</form>


<?php
require 'footer.php';
?>