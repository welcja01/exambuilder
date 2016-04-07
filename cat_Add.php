<!-- Author: Sean Scott --> 
<?php
include_once('head.php');


//get input from GET
$name = $_GET['catName'];
$description = $_GET['catDesc'];
$cid = $_GET['Course'];


//add input to categories table in database
$query = "INSERT INTO question_cat (cid, name, description) VALUES($cid, '$name', '$description');";

$result = $db->query($query);

//let user know if successful
if ($result != FALSE)
{
	printf('<div class="content"><p>Added new category to database.</p>');
}
else
{
	printf('<div class="content"><p>Error adding new category</p>');
}


?>

<!--Allow user to go back and add another category -->
<form name = 'catAdd_Ret' method='GET' action='add_category.php'>
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid); ?>
<?php printf("<input type='submit' name='redAdd' value='Add Another Category' /></td>",  $cid); ?>
</form>

<!--Allow user to return to category index -->
<form name = 'cat_Ret' method='GET' action='categories.php'>
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid); 
printf("<input type='submit' name='redAdd' value='Return to Categories Page' /></td>",  $cid); ?>
</form>


<?php 
include_once('footer.php');
?>
