
<?php
// Author: Jamie Welch and Sean Scott
include_once('head.php');

$eid = $_GET['eid'];

//remove the course from the database
$query = "DELETE FROM exam WHERE eid=" . $eid;
$result1 = $db->query($query);

//remove the exam's questions from the database
$query = "DELETE FROM exam_question WHERE eid=" . $eid;
$result2 = $db->query($query);

//let user know if successfule
if($result1 != false && $result2 != false)
{
	printf("<div id='content'><p>Successfully deleted exam with id %s.</p>\n", $eid);
}

?>

<!-- link back to courses index -->
<a href="exams.php">Back to Exam List</a>
</div>
<?php include('footer.php');?>