<?php
include_once('db_connect.php');

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
	printf("<p>Added new question to database</p>\n");
}
else
{
	printf("<p>Error adding new question</p>\n");
}


?>
<p> <!-- paragraph -->
<a href="add_question.php">Back to test page</a>
</p>
