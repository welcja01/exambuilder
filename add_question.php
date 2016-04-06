<!-- Author: Sean Scott -->
<?php include('head.php');
$cid=$_GET['Course'];?>

<div class="content">
<h2 align="center">Add a Question</h2>

<!-- send input to q_Add.php -->
<form name="qAdd" method="GET" action="./q_Add.php">

<!-- setup table for creating a new question -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for question name -->
<tr>
<td>Question Name</td>
<td><input type="text" name="qName" placeholder="name" size="69"></td>
</tr>

<!-- row for question text -->
<tr>
<td>Question Text</td>
<td><textarea name="qArea" value="" rows="5" cols="60"></textarea></td>
</tr>

<!-- row for answer to question -->
<tr>
<td>Answer</td>
<td><textarea name="aArea" value="" rows="5" cols="60"></textarea></td>
</tr>

<!--  row for question difficulty - selected via radio button -->
<tr>
<td>Difficulty</td>
<td><input type='radio' name='diff' value='easy'>Easy<br />
	<input type='radio' name='diff' value='medium'>Medium<br />
	<input type='radio' name='diff' value='hard'>Hard<br /></td>
</tr>
<?php

//Get possible categories for the question
$query = "SELECT name, catID FROM question_cat WHERE cid=$cid;";
$result = $db ->query($query);

// create row with checkboxes for each possible category
printf("<tr>");
printf("<td>Categories</td>");
printf("<td>");
while($row =  $result->fetch()){
	
	$name = $row['name'];
	$catID = $row['catID'];

	printf("<input type='checkbox' name='cb[]' value='%s'>%s<br />",$catID,$name);
}
printf("</td>");
printf("</tr>");
?>

<!-- submit button -->
<tr>
<td>submit</td>
<td><input type="submit" value="Submit Question" />
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);?>
</td>
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
