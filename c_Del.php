<!-- Author: Sean Scott -->
<?php

include_once('head.php');

$id = $_GET['Course'];

//remove the course from the database
$query = "DELETE FROM course WHERE cid=" . $id;
$result2 = $db->query($query);

//remove the course's categories from the database
$query = "DELETE FROM question_cat WHERE cid=" . $id;
$result1 = $db->query($query);

//remove those categories' relationships
$query = "DELETE FROM question_cat_relationships WHERE question_cat_relationships.catID NOT IN 
		(SELECT question_cat.catID FROM question_cat);";
$result3 = $db->query($query);

//remove the now category-less questions
$query= "DELETE FROM question WHERE question.qid NOT IN (SELECT question_cat_relationships.qid FROM question_cat_relationships);";
$result4 = $db->query($query);	

//let user know if successfule
if($result1 != false && $result2 != false && $result3 != false && $result4 != false)
{
	printf("<p>Successfully deleted course with %s</p>\n", $id);
}


?>

<!-- hyper link back to courses index -->
<a href="courses.php">Back to Courses Page </a>
<?php include('footer.php');?>
