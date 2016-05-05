<!-- Author: Sean Scott --> 
<?php
include_once('head.php');


//get input from GET
$name = $_GET['qName'];
$question = $db->quote($_GET['qArea']);
$answer = $db->quote($_GET['aArea']);
$difficulty = isset($_GET['diff']) ? $_GET['diff'] : 'medium';
$qid=$_GET['qid'];
$cid=$_GET['Course'];

//update question table in database
$query = "UPDATE question SET name='$name', difficulty='$difficulty', question='$question', answer='$answer', WHERE qid=$qid;";
$result = $db->query($query);

//remove old categories
$query= "DELETE FROM question_cat_relationships WHERE qid=$qid;";
$result = $db->query($query);

//let user know if insert was successful
if ($result != false)
{
	printf('<div class="content"><p>Your Question has been edited.</p>');
	//attach it to any selected categories
	if(isset($_GET['cb'])){
		foreach ($_GET['cb'] as $catID){
			//link the question to the specified categories in the database
			$query = "INSERT INTO question_cat_relationships VALUES($catID, $qid);";

			$result = $db->query($query);
			if($result != false)
			{
				printf("<p>Successfully added question to category.</p>\n");
			}
		}
	}
	else{
		//if there were no selected categories the add it to unsorted
		$query = "SELECT catID FROM question_cat WHERE name='unsorted' AND cid=$cid;";
		$result = $db->query($query);
		$resultValues = $result->fetch();
		$unsortedID = $resultValues[0];

		$query = "INSERT INTO question_cat_relationships VALUES($unsortedID, $qid);";

		$result = $db->query($query);

	}

}
else
{
	printf('<div class="content"><p>Error editing question</p>');
}


//Allow user to go back to the question index
printf("<form name = 'ret_question' method='GET' action='questions.php'>");
printf("<input type='submit' name='submit' value='Return to Questions Page'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("</form>");


 
include_once('footer.php');
?>
