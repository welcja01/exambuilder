<!-- Author: Sean Scott --> 
<?php
include_once('head.php');

$cid=$_GET['Course'];

//Get each of the course's categories
$query = "SELECT catID, name, description FROM question_cat WHERE cid=$cid;";
$result = $db->query($query);

//Create form for deleting categories
printf("<form name = 'cat_Del' method='GET' action='cat_Del.php'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);

//create table listing categories
printf('<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">');

//set up table headings
printf('<tr> <th></th> <th>Name</th> <th>Description</th> </tr>');

//for each category: create a checkbox, and give its name and decription
while($row =  $result->fetch()){
	$id = $row['catID'];
	$name = $row['name'];
	$desc = $row['description'];
	printf("<tr> \n");
	printf("<td>");
	printf("<input type='checkbox' name ='cat[]' value='%d'>",$id);
	printf("</td>");
	printf("<td>%s</td> <td>%s</td>\n", $name, $desc);
	printf("</tr> \n");
}

//create button to delete categories
printf('<tr><td colspan="3"><input type="submit" style=color:red value="Delete Checked Categories"></td></tr>');
printf("</table>\n");

printf("</form>");


//sends user to page for creating questions
printf("<form name = 'add_category' method='GET' action='add_category.php'>");
printf("<input type='submit' name='submit' value='Add a New Category'>");
printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid);
printf("</form>");


 
include_once('footer.php');
?>
