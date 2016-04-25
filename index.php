<!-- Author: James Welch --> 
<?php include('head.php');?>

<div class="content">

    <h2 align="center">Welcome!</h2>
	<p>This is the exam builder. Use the courses menu to create a new course or access existing courses from the list. Use the exams menu to view previously created exams or to create a new exam.</p>
  
	<?php if($_SESSION['isAdmin']) {
		//echo("<p>Administrators can add or manage users by choosing the administrator menu.</p>");
	}
	?>
</p>
<!-- end .content --></div>

<?php include('footer.php');?>


