<!-- Author: Sean Scott -->
<?php include('head.php');?>

<!--Validating Script -->
<script>
function empty() {
	var response = "";
	var x;

	x = document.getElementById("cName").value;
	if (x == "") {
		response += "Your Course must have a name!\n";
	}
	
	x = document.getElementById("cDesc").value;
	if (x == "") {
		response += "Your Course must have a description!\n";
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

<div class="content">
<h2 align="center">Add a Course</h2>

<!-- send input to c_Add.php -->
<form name="cAdd" method="GET" action="./c_Add.php">

<!-- setup table for creating a new course -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for course name -->
<tr>
<td>Course Name</td>
<td><input type="text" name="cName" id="cName" placeholder="name" size="69"></td>
</tr>

<!-- row for course description -->
<tr>
<td>Course Description</td>
<td><textarea name="cDesc" value="" id="cDesc" rows="5" cols="60"></textarea></td>
</tr>

<!-- submit button -->
<tr>
<td>submit</td>
<td><input type="submit" value="Create Course" Onclick='return empty()' /></td>
<?php printf("<input type='hidden' name='User' value='%s' /></td>",  $_SESSION["username"]); ?>
</tr>

<!-- reset button -->
<tr>
<td>reset</td>
<td><input type="reset" value="Clear All" /></td>
</tr>

</table>
</form>

<!-- end .content --></div>
<?php include('footer.php');?>
