<!-- Author: Sean Scott -->
<?php include('head.php');?>

<div class="content">
<h2 align="center">Add an Exam</h2>

<!-- send input to e_Add.php -->
<form name="eAdd" method="POST" action="./e_Add.php">

<!-- setup table for creating a new exam -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for exam name -->
<tr>
<td>Exam Name</td>
<td><input type="text" name="eName" size="69"></td>
</tr>

<!-- row for exam description -->
<tr>
<td>Exam Description</td>
<td><input type="text" name="eDesc" size="69"></td>
</tr>

<!-- row for course selection -->
<tr>
<td>Course</td>
<td>
	<select name="cid">
		<?php

//Get possible courses for the exam
$query = "SELECT cid, name FROM course WHERE username='".$_SESSION['username']."';";
$result = $db ->query($query);

while($row =  $result->fetch()){
	
	$cid = $row['cid'];
	$cname = $row['name'];

	printf("<option value='%d'>%s</option>",$cid,$cname);
}
printf("</select>");
?>
</tr>

<!-- row for instructions -->
<tr>
<td>Instructions</td>
<td><textarea name="instructions" value="" rows="5" cols="60"></textarea></td>
</tr>

<!-- submit button -->
<tr>
<td>Submit</td>
<td><input type="submit" value="Create Exam" />
</td>
</tr>

<!-- reset button -->
<tr>
<td>Reset</td>
<td><input type="reset" value="Clear All" /></td>
</tr>

</table>
</form>

<!-- end .content --></div>
<?php include('footer.php');?>
