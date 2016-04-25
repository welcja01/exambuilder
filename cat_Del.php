<!-- Author: Sean Scott -->
<?php
include_once('head.php');

$cid=$_GET['Course'];

$query = "SELECT catID FROM question_cat WHERE name='unsorted' AND cid=$cid;";
$result = $db->query($query);
$resultValues = $result->fetch();
$unsortedID = $resultValues[0];
printf($unsortedID);



foreach ($_GET['cat'] as $id){
	//delete the specified categories from the database
	$query = "DELETE FROM question_cat WHERE catID=$id;";
	$result1 = $db->query($query);

	//delete the categories' relationships from the database
	$query= "DELETE FROM question_cat_relationships WHERE catID=$id;";
	$result2 = $db->query($query);

	//if any questions no longer have a category, remove them from the database
	$query= "SELECT question.qid FROM question WHERE question.qid NOT IN (SELECT question_cat_relationships.qid FROM question_cat_relationships);";
	$result3 = $db->query($query);

	while($row =  $result3->fetch()){
		$qid = $row['qid'];
		$query = "INSERT INTO question_cat_relationships VALUES($unsortedID, $qid);";
		$result = $db->query($query);
	}		
	
	//let user know if deletion was successful
	if($result1 != false && $result2 != false && $result3 != false)
	{
		printf("<p>Successfully deleted category</p>\n");
	}
}
?>

<!--allow the user to return to the categories index-->
<form name = 'cat_Ret' method='GET' action='categories.php'>
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("<input type='submit' name='redAdd' value='Return to Categories Page' /></td>"); ?>
</form>

<?php 
include_once('footer.php');
?>
