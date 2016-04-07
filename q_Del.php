<!-- Author: Sean Scott -->
<?php
include_once('head.php');
$cid=$_GET['Course'];

foreach ($_GET['q'] as $id){
	//remove the question from the database
	$query = "DELETE FROM question WHERE qid=$id;";
	$result1 = $db->query($query);

	//remove the question's relationships from the database
	$query= "DELETE FROM question_cat_relationships WHERE qid=$id;";
	$result2 = $db->query($query);
	
	//let user know if successful
	if($result1 != false && $result2 != false)
	{
		printf("<p>Successfully deleted question</p>\n");
	}
}
?>

<!--allow user to return to question index-->
<form name = 'q_Ret' method='GET' action='questions.php'>
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("<input type='submit' name='redAdd' value='Return to Questions Page' /></td>"); ?>
</form>

<?php 
include_once('footer.php');
?>
