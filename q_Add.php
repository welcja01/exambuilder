<?php
include_once('db_connect.php');
include_once('head.php');
print_r($_GET);

$catID = $_GET['rb'];
$name = $_GET['qName'];
$question = $_GET['qArea'];
$answer = $_GET['aArea'];
$difficulty = $_GET['diff'];

$query = "INSERT INTO question (cid, name, difficulty, question, answer) VALUES($catID, '$name', '$difficulty', '$question', '$answer');";

$result = $db->query($query);

if ($result != FALSE)
{
	printf('<div class="content"><p>Added new question to database</p>');
}
else
{
	printf('<div class="content"><p>Error adding new question</p>');
}


?>
<p> <!-- paragraph -->
<a href="add_question.php">Back to test page</a>
</p>
</div>

<?php 
include_once('footer.php');
?>