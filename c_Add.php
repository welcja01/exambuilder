<!-- Author: Sean Scott --> 
<?php
include_once('head.php');


//get the input from GET
$name = $_GET['cName'];
$description = $_GET['cDesc'];
$username = $_GET['User'];


//add the input to the courses table in the database
$query = "INSERT INTO course (username, name, description) VALUES('$username', '$name', '$description');";

$result = $db->query($query);

//let user know is successful
if ($result != FALSE)
{
	printf('<div class="content"><p>Added new course to database.</p>');
}
else
{
	printf('<div class="content"><p>Error adding new course </p>');
}


?>

<p> <!-- send user to add another course -->
<a href="add_course.php">Add another course</a>
</p>

<p> <!-- send user back to course index -->
<a href="courses.php">Back to courses page</a>
</p>


<?php 
include_once('footer.php');
?>
