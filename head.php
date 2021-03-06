<!-- Author: James Welch --> 
<?php include_once('db_connect.php'); ?>
<?php
	// temporarily automatically log in user to admin account
	require_once('auto_login.php');
?>

<?php
function getName() {
	global $db;
	$query = "SELECT name FROM user WHERE username = '". $_SESSION["username"]."'";
	$result = $db->query($query);
	if ($result != FALSE) {
		$row = $result->fetch();
		echo $row['name'];
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Exam Builder</title>
</head>

<body>
<div class="container">
  <div class="header">
  <div class="floatright">
  		Logged in as <?php getName();?> <!-- Logout disabled until login functionality implemented (<a href ="./logout.php">Logout</a>) -->
	 <!-- end .floatright --></div>
<a href="./index.php"><img src="./images/exam-builder-logo.png" alt="Exam Builder Logo" width="180" height="90" /></a>
 	 
    <!-- end .header --></div>
  <div class="sidebar">
    <ul class="nav">
      <li><a href="./index.php">Home</a></li>
      
      <li><a href="./courses.php">Courses</a><ul>
          <li><a href="./courses.php">List Courses</a></li>
          <li><a href="./add_course.php">Create A Course</a></li>
      </ul></li>
      
      <li><a href="./exams.php">Exams</a><ul>
          <li><a href="./exams.php">List Exams</a></li>
          <li><a href="./add_exam.php">Create An Exam</a></li>
      </ul></li>
      <?php
	  if($_SESSION['isAdmin']) {
		 // echo('<li><a href="./admin.php">Administration</a></li>');
	  }
      ?>
    </ul>
    <!-- end .sidebar --></div>
    

 
