<?php
include_once('head.php');
// Author: Jamie Welch and Sean Scott

//get input from POST
$eid = $_POST['eid'];
$name = $_POST['eName'];
$description = $db->quote($_POST['eDesc']);
$cid = $_POST['cid'];
$instructions = $db->quote($_POST['instructions']);
$username = $_SESSION['username'];
$questions = $_POST['questions'];

//add input to exam table in database
$query = "UPDATE exam SET name='$name', description=$description, instructions=$instructions WHERE eid='$eid';";
$result = $db->query($query);

// drop exisiting question list
$query = "DELETE FROM exam_question WHERE eid=$eid;";
$result = $db->query($query);

// insert new question list
foreach ($questions as $qid) {
		$query = "INSERT INTO exam_question VALUES ($eid, $qid);";
		$result = $db->query($query);
}


// redirect to main exam editor to continue building exam
if ($result != false)
{
	printf('Successfully updated exam.');

}
else
{
	printf('<div class="content"><p>Error updating exam.</p></div>');
}

//Allow user to go back and edit the exam
printf("<form name = 'edit_exam' method='GET' action='edit_exam.php'>");
printf("<input type='submit' value='Return to Exam Editor'>");
printf("<input type='hidden' name='eid' value='%s' /></td>",  $eid);
printf("</form>");

//Allow user to go back to the exam list
printf("<form name = 'ret_exams' method='GET' action='exams.php'>");
printf("<input type='submit' value='Return to Exam List'>");
printf("</form>");

include_once('footer.php');
?>
