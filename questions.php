<!-- Author: Sean Scott --> 
<script>
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete these questions?");
  if (x)
      return true;
  else
    return false;
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

printf('<div id="buttons" >');

//sends user to page for adding new questions
printf("<form name = 'add_category' method='GET' action='add_question.php'>");
printf("<input type='submit' name='submit' value='Add a New Question' style='float:left; height:25px; margin-left:175px;margin-top:-12px'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("</form>");


//create form for deleting questions
printf("<form name = 'q_Del' method='GET' action='q_Del.php'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);

printf('<input type="submit" value="Delete Checked Questions" Onclick="return ConfirmDelete()" align="right" style="color:red; height:25px; margin-left:100px; margin-top:-12px">');
printf('</div>');

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
	//create checkboxes for the question deletion form
	printf("<input type='checkbox' name ='q[]' value='%d'>",$id);
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
//create button for deleting checked questions
printf('<tr><td colspan="6" align="center"><input type="submit" Onclick="return ConfirmDelete()" style=color:red;height:25px value="Delete Checked Questions"></td></tr>');
printf("</table>\n");

printf("</form>");




printf('</div>');
 
include_once('footer.php');
?>
