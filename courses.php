<!-- Author: Sean Scott -->
<?php include('head.php');?>

<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete this course?\nAll of its categories and questions will be deleted as well.");
  if (x)
      return true;
  else
    return false;
}
</script>

<div class="content">

<!--send user to page for adding new courses-->
<form name="vQue" method="GET" action="./add_course.php">
<input type='submit'  name='Add Question' value='Add a New Course' style='float:right; height:25px; margin-right:75px; margin-top:5px'/>
</form>

<h2 align="center" style="margin-left:155px">Your Courses</h2>

<!--create table for courses-->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!--set up table headings-->
<tr>
<th>Name</th>
<th>Description</th>
<th>View Categories</th>
<th>View Questions</th>
<th>Delete Course</th>
</tr>

<?php
//get the user's courses
$user=  $_SESSION["username"];
$query = "SELECT cid, course.name AS cname, description FROM course JOIN user ON course.username='$user';";
$result = $db ->query($query); //returns PDOS statement object; $db from db_connect


while($row =  $result->fetch()){
	
	$id = $row['cid'];
	$name = $row['cname'];
	$desc = $row['description'];

	//give course name and description
	printf("<tr> \n");
	printf("<td>%s</td> <td>%s</td>\n", $name, $desc);

	//sends user to page with this course's categories
	printf('<form name="vCat" method="GET" action="./categories.php">');
	printf("<td><input type='submit' name='%d' value='View Categories' />", $id);
	printf("<input type='hidden' name='Course' value='%d' /></td>", $id);

	printf('</form>');

	//sends user to page with this course's questions
	printf('<form name="vQue" method="GET" action="./questions.php">');
	printf("<td><input type='submit' name='%d' value='View Questions' />", $id);
	printf("<input type='hidden' name='Course' value='%d' /></td>",  $id);
	printf('</form>');

	//deletes the course
	printf('<form name="cDel" method="GET" action="./c_Del.php">');
	printf("<td><input type='submit' Onclick='return ConfirmDelete()' name='%d' style=color:red value='Delete Course' />", $id);
	printf("<input type='hidden' name='Course' value='%d' /></td>",  $id);
	printf('</form>');
	printf("</tr> \n");
}
printf("</table>\n");

?>





<!-- end .content --></div>
<?php include('footer.php');?>
