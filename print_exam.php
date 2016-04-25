<HTML>
<HEAD>
<TITLE>Exam</TITLE>
</HEAD>
<BODY style="font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif">
<!-- Author: Jamie Welch -->
<?php include('db_connect.php');?>
<?php include('auto_login.php');?>

<?php 
	$eid = $_GET['eid'];
	$query = "SELECT exam.name AS ename, instructions, course.name AS cname FROM exam JOIN course ON exam.cid=course.cid WHERE eid=$eid;";
	$result = $db->query($query);
	$examInfo = $result->fetch();
	$ename = $examInfo['ename'];
	$instructions = $examInfo['instructions'];
	$cname = $examInfo['cname'];
	printf("<h1 align='center'>%s</h1>", $ename);
	print("<h4>Name ________________________</h4>\n");
	printf("<h3>Directions: %s</h3>", $instructions);
	?>
    
    <?php
	// retrieve list of questions
	$query = "SELECT question FROM exam_question NATURAL JOIN question WHERE eid=$eid;";
	$result = $db->query($query);
	print("<ol>");
	while($row =  $result->fetch()){
		printf("<li><p>%s</p></li>", $row['question']);
	}
	printf("</ol><hr /><h1 align='center'>%s</h1>", $cname);

	?>

<h2 align="center" style="margin-left:155px"></h2>

</BODY>
</HTML>

