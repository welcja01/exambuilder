<!-- Author: Sean Scott -->
<?php include('head.php');
$qid=$_GET['id'];
$cid=$_GET['Course'];

$query = "SELECT name, question, answer FROM question WHERE qid=$qid;";
$result = $db->query($query);

while($row =  $result->fetch()){	
	$name = $row['name'];
	$ques = $row['question'];
	$answ = $row['answer'];
}
?>

<!--Validating Script -->
<script>
function empty() {
	var response = "";
	var x;

	x = document.getElementById("qName").value;
	if (x == "") {
		response += "Your Question must have a name!\n";
	}
	
	x = document.getElementById("qArea").value;
	if (x == "") {
		response += "Your Question must have a question!\n";
	}
	
	x = document.getElementById("aArea").value;
	if (x == "") {
		response += "Your Question must have an answer!\n";
	}
	if(response != ""){
		alert(response);
		return false;
	}
	else{
		return true;
	}
}
</script>

<div class="content">
<h2 align="center">Edit This Question</h2>

<!-- send input to q_Edit.php -->
<form name="qEdit" method="GET" action="./q_Edit.php">

<!-- setup table for editing -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for question name -->
<tr>
<td>Question Name</td>
<td><?php printf('<input type="text" name="qName" id="qName" value="%s" size="69">',$name);?></td>
</tr>

<!-- row for question text -->
<tr>
<td>Question Text</td>
<td><?php printf('<textarea name="qArea" value="" id="qArea" rows="5" cols="60">%s</textarea>',$ques);?></td>
</tr>

<!-- row for answer to question -->
<tr>
<td>Answer</td>
<td><?php printf('<textarea name="aArea" value="" id="aArea" rows="5" cols="60">%s</textarea>',$answ);?></td>
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
<td><input type="submit" value="Edit Question" Onclick='return empty()'/>
<?php printf("<input type='hidden' name='qid' value='%s' /></td>",  $qid);
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);?>
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
