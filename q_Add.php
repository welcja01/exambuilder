<!-- Author: Sean Scott --> 
<?php
include_once('head.php');


//get input from GET
$name = $_GET['qName'];
$question = $db->quote($_GET['qArea']);
$answer = $db->quote($_GET['aArea']);
$difficulty = $_GET['diff'];
$cid=$_GET['Course'];

//add input to question table in database
$query = "INSERT INTO question (name, difficulty, question, answer) VALUES('$name', '$difficulty', $question, $answer);";
$result = $db->query($query);

//get the automatically incremeneted question ID
$query = "SELECT LAST_INSERT_ID();";
$result = $db->query($query);
$resultValues = $result->fetch();
$qid = $resultValues[0];

//let user know if insert was successful
if ($result != false)
{
	printf('<div class="content"><p>Added new question to database.</p>');
	
	foreach ($_GET['cb'] as $catID){
		//link the question to the specified categories in the database
		$query = "INSERT INTO question_cat_relationships VALUES($catID, $qid);";

		$result = $db->query($query);
		if($result != false)
		{
			printf("<p>Successfully added question to category.</p>\n");
		}
		else{
			printf('<div class="content"><p>Error adding question to category</p>'. $catID . ' ' . $qid);
		}

	}

}
else
{
	printf('<div class="content"><p>Error adding new question</p>');
}


//Allow user to go back and add another question
printf("<form name = 'add_question' method='GET' action='add_question.php'>");
printf("<input type='submit' name='submit' value='Add Another Question'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("</form>");

//Allow user to go back to the question index
printf("<form name = 'ret_question' method='GET' action='questions.php'>");
printf("<input type='submit' name='submit' value='Return to Questions Page'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("</form>");


 
include_once('footer.php');
?>
