<?php include('head.php');?>

<div class="content">
<h2 align="center">Add a Question</h2>

<form name="qAdd" method="GET" action="./q_Add.php">

<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<tr>
<td>Question Name</td>
<td><input type="text" name="qName" placeholder="name"></td>
</tr>

<tr>
<td>Question Text</td>
<td><textarea name="qArea" value="" rows="5" cols="60"></textarea></td>
</tr>

<tr>
<td>Answer</td>
<td><textarea name="aArea" value="" rows="5" cols="60"></textarea></td>
</tr>

<!-- row 2: text field -->
<tr>
<td>Difficulty</td>
<td><input type="text" name="diff" placeholder="difficulty"></td>
</tr>
<?php

$query = 'SELECT name, cid FROM question_cat;';
$result = $db ->query($query);

printf("<tr>");
printf("<td>Category</td>");
printf("<td>");
while($row =  $result->fetch()){
	
	$name = $row['name'];
	$cid = $row['cid'];

	printf("<input type='radio' name='rb' value='%s'>%s<br />",$cid,$name);
}
printf("</td>");
printf("</tr>");
?>

<!-- row 10: submit button -->
<tr>
<td>submit</td>
<td><input type="submit" value="submit form" /></td>
</tr>

<!-- row 11: reset button -->
<tr>
<td>reset</td>
<td><input type="reset" value="clear all" /></td>
</tr>

</table>
</form>

<!-- end .content --></div>
<?php include('footer.php');?>
