<!-- Author: Jamie Welch and Sean Scott -->
<?php include('head.php');?>

<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete this exam?");
  if (x)
      return true;
  else
    return false;
}
</script>

<div class="content">

<!--send user to page for adding new courses-->
<form name="examNew" method="GET" action="./add_exam.php">
<input type='submit'  value='Add a New Exam' style='float:right; height:25px; margin-right:75px; margin-top:5px'/>
</form>

<h2 align="center" style="margin-left:155px">Your Exams</h2>

<!--create table for exams-->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!--set up table headings-->
<tr>
<th>Exam Name</th>
<th>Course</th>
<th>Exam Description</th>
<th>Print Exam</th>
<th>Print Key</th>
<th>Edit Exam</th>
<th>Delete Exam</th>
</tr>

<?php
//get the user's courses
$user=  $_SESSION["username"];
$query = "SELECT eid, course.name AS cname, exam.name AS ename, exam.description AS description FROM exam JOIN course ON exam.cid = course.cid WHERE exam.username='$user';";
$result = $db ->query($query); //returns PDOS statement object; $db from db_connect


while($row =  $result->fetch()){
	
	$id = $row['eid'];
	$ename = $row['ename'];
	$cname = $row['cname'];
	$desc = $row['description'];

	//give exam name and course name, and description
	printf("<tr> \n");
	printf("<td>%s</td> <td>%s</td><td>%s</td>\n", $ename, $cname, $desc);

	//sends user to page where they can print the exam
	printf('<form name="examPrint" method="GET" action="./print_exam.php">');
	printf("<td><input type='submit' value='Print Exam' />");
	printf("<input type='hidden' name='eid' value='%s' /></td>",  $id);
	printf('</form>');
	
	//sends user to page where they can print the key
	printf('<form name="examPrint" method="GET" action="./print_key.php">');
	printf("<td><input type='submit' value='Print Key' />");
	printf("<input type='hidden' name='eid' value='%s' /></td>",  $id);
	printf('</form>');
	
	//sends user to page where they can edit the exam
	printf('<form name="examEdit" method="GET" action="./edit_exam.php">');
	printf("<td><input type='submit' value='Edit Exam' />");
	printf("<input type='hidden' name='eid' value='%s' /></td>",  $id);
	printf('</form>');

	// allow user to delete the exam
	printf('<form name="examDelete" method="GET" action="./e_Del.php">');
	printf("<td><input type='submit' Onclick='return ConfirmDelete()' style=color:red value='Delete Exam' />");
	printf("<input type='hidden' name='eid' value='%d' /></td>",  $id);
	printf('</form>');
	printf("</tr> \n");
}
printf("</table>\n");

?>





<!-- end .content --></div>
<?php include('footer.php');?>
