<?php
include_once('head.php');
// Author: Jamie Welch and Sean Scott

//get input from POST
$name = $_POST['eName'];
$description = $db->quote($_POST['eDesc']);
$cid = $_POST['cid'];
$instructions = $db->quote($_POST['instructions']);
$username = $_SESSION['username'];

//add input to exam table in database
$query = "INSERT INTO exam (username, cid, name, description, instructions) VALUES('$username', '$cid', '$name', $description, $instructions);";
$result = $db->query($query);

//get the automatically incremeneted question ID
$query = "SELECT LAST_INSERT_ID();";
$result = $db->query($query);
$resultValues = $result->fetch();
$eid = $resultValues[0];

// redirect to main exam editor to continue building exam
if ($result != false)
{
	header("Location: ./edit_exam.php?eid=".$eid); /* Redirect browser */
	exit();

}
else
{
	printf('<div class="content"><p>Error adding new exam.</p></div>');
}

 
include_once('footer.php');
?>
