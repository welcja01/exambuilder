<!--Author: Sean Scott -->

<!--Validating Script -->
<script>
function empty() {
	var response = "";
	var x;

	x = document.getElementById("id").checked;
	if (x == "") {
		response += "You must select a question!\n";
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

<?php
include_once('head.php');

$cid=$_GET['Course'];

printf('<div class="content">');

//get the course's questions
$query = "SELECT DISTINCT question.qid, question.name, difficulty, question, answer FROM question JOIN question_cat_relationships ON question.qid=question_cat_relationships.qid JOIN question_cat ON  question_cat_relationships.catID=question_cat.catID WHERE cid=$cid;";
$result = $db->query($query);


printf('<h2 align="center">Your Questions</h2>');

//create form for editing questions
printf("<form name = 'q_Edit' method='GET' action='edit_question.php'>");

printf('<div style="text-align: center"> ');
printf('<input type="submit" value="Edit Selected Question"  align="right" Onclick="return empty()" style="padding: 5px 10px; height:30px">');
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf('</div>');
printf('<br>');

//create question table
printf('<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">');

//set up table headings
printf('<tr> <th></th> <th>Categories</th> <th>Name</th> <th>Difficulty</th> <th>Question</th> <th>Answer</th></tr>');

while($row =  $result->fetch()){
	
	$id = $row['qid'];
	$name = $row['name'];
	$diff = $row['difficulty'];
	$ques = $row['question'];
	$answ = $row['answer'];
	
	//find all the question's categories
	$query = "SELECT name FROM question_cat NATURAL JOIN question_cat_relationships WHERE qid=$id;";
	$categories = $db->query($query);
	
	printf("<tr> \n");
	printf("<td>");
	//create radiobuttons for selecting question to be edited
	printf("<input type='radio' name ='id' id='id' value='%d'>",$id);
	printf("</td>");
	printf("<td>");
	//list all of the question's categories
	while($row2 =  $categories->fetch()){
		$cats = $row2['name'];
		printf("%s\n",$cats);
	}
	printf("</td>");
	//add question name, difficulty, text, and answer to table
	printf("<td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> \n", $name, $diff, $ques, $answ);
	printf("</tr> \n");
}
printf('<tr><td colspan="6" align="center"><input type="submit" style=height:25px Onclick="return empty()" value="Edit Selected Question"></td></tr>');
printf("</table>\n");

printf("</form>");




printf('</div>');
 
include_once('footer.php');
?>
