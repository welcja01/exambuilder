<!-- Author: Sean Scott -->
<?php include('head.php');?>

<div class="content">
<h2 align="center">Add a Course</h2>

<!-- send input to c_Add.php -->
<form name="cAdd" method="GET" action="./c_Add.php">

<!-- setup table for creating a new course -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for course name -->
<tr>
<td>Course Name</td>
<td><input type="text" name="cName" placeholder="name" size="69"></td>
</tr>

<!-- row for course description -->
<tr>
<td>Course Description</td>
<td><textarea name="cDesc" value="" rows="5" cols="60"></textarea></td>
</tr>

<!-- submit button -->
<tr>
<td>submit</td>
<td><input type="submit" value="Create Course" /></td>
<?php printf("<input type='hidden' name='User' value='%s' /></td>",  $_SESSION["username"]); ?>
</tr>

<!-- reset button -->
<tr>
<td>reset</td>
<td><input type="reset" value="Clear All" /></td>
</tr>

</table>
</form>

<!-- end .content --></div>
<?php include('footer.php');?>
