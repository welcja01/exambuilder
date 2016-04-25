<!-- Author: Jamie Welch and Sean Scott. Uses the Chosen jQuery Library for multiselect. -->
<?php include('./head.php');?>

<div class="content">
<h2 align="center">Edit Exam</h2>
 <link rel="stylesheet" href="chosen.css"

<!-- send input to e_Update.php -->
<form name="eUpdate" method="POST" action="./e_Update.php">

<!-- setup table for creating a new exam -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<?php
$eid = $_GET['eid'];
$query = "SELECT eid, exam.name AS name, exam.description as description, course.name AS cname, exam.cid AS cid, instructions FROM exam JOIN course ON exam.cid = course.cid WHERE eid='".$eid."';";
$result = $db ->query($query);

while($row =  $result->fetch()){
	$ename = $row['name'];
	$desc = $row['description'];
	$cname = $row['cname'];
	$cid = $row['cid'];
	$instructions = $row['instructions'];
}
?>
<input type="hidden" name="eid" value="<?php echo($eid);?>" />
<!-- row for exam name -->
<tr>
<td>Exam Name</td>
<td><input type="text" name="eName" value="<?php echo($ename);?>" size="69"></td>
</tr>

<!-- row for exam description -->
<tr>
<td>Exam Description</td>
<td><input type="text" name="eDesc" value="<?php echo($desc);?>" size="69"></td>
</tr>

<!-- row for course selection -->
<tr>
<td>Course</td>
<td>
	<?php echo($cname);?>
    <input type="hidden" name="cid" value="<?php echo($cid);?>"
</tr>

<!-- row for instructions -->
<tr>
<td>Instructions</td>
<td><textarea name="instructions" rows="5" cols="60"><?php echo($instructions);?></textarea></td>
</tr>

<!-- row for question selection -->
<tr>
<td>Questions</td>
<td>
<select name="questions[]" data-placeholder="Click here to choose questions to add to this exam..." style="width:100%;" class="chosen-select" multiple tabindex="6">
            <option value=""></option>
            
<?php

//Get each of the course's categories
$query = "SELECT catID, name FROM question_cat WHERE cid=$cid;";
$catresult = $db->query($query); 
while($row =  $catresult->fetch()){
	$catID = $row['catID'];
	$catName = $row['name'];
	
		printf("<optgroup label='%s'>\n", $catName);
		//Get each of the category's questions
		$query = "SELECT qid, name FROM question_cat_relationships NATURAL JOIN question WHERE catID=$catID;";
		$questionresult = $db->query($query); 
		while($row =  $questionresult->fetch()){
			$qid = $row['qid'];
			$qname = $row['name'];	
			// identify questions already selected and pre-select them
			$query = "SELECT qid FROM exam_question WHERE eid=$eid AND qid=$qid;";
			$qresult = $db->query($query);
			$question = $qresult->fetch();
			if(!empty($question)) { // this question is alrady in quiz
				printf("<option value='%d' selected='selected'>%s</option>\n", $qid, $qname);
			}
			else {
				printf("<option value='%d'>%s</option>\n", $qid, $qname);
			}
		}
		printf("</optgroup>");
}

?>
</td></tr>
<!-- submit button -->
<tr>
<td>Submit</td>
<td><input type="submit" value="Update Exam" />
</td>
</tr>

</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
</form>

<!-- end .content --></div>
<?php include('./footer.php');?>
