<!-- Author: Sean Scott -->
<?php include('head.php');

$cid=$_GET['Course']; ?>

<div class="content">
<h2 align="center">Add a Category</h2>

<!-- send input to cat_Add.php -->
<form name="catAdd" method="GET" action="./cat_Add.php">

<!-- setup table for creating a new cateory -->
<table align="center" border="1" cellspacing="0" cellpadding="4" 
	   style="border: solid 1px !important;">

<!-- row for category name -->
<tr>
<td>Category Name</td>
<td><input type="text" name="catName" placeholder="name" size="69"></td>
</tr>

<!-- row for category description -->
<tr>
<td>Category Description</td>
<td><textarea name="catDesc" value="" rows="5" cols="60"></textarea></td>
</tr>

<!-- submit button -->
<tr>
<td>submit</td>
<td><input type="submit" value="Create Category" /></td>
<?php printf("<input type='hidden' name='Course' value='%s' /></td>",  $cid); ?>
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
