<?php include('head.php');?>

<div class="content">

    <h2>Welcome!</h2>
	<p>This is the exam builder. Use the courses dropdown menu to create a new course or access existing courses from the list. Use the exams menu to view previously created exams or to create a new exam.</p>
  
	<?php if($_SESSION['isAdmin']) {
		echo("<p>Administrators can add or manage users by choosing the administrator menu.</p>");
	}
	?>
</p>
<p>
<!-- for demo purposes only -->
<a href = "./add_question.php">Add a question (demo link only)</a>
</p>
<!-- end .content --></div>

<?php include('footer.php');?>


