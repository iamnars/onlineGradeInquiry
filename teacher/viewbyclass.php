<?php
	require_once('../auth.php');
?>


<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="viewclass.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">

Subject<br>
<select name="subject" class="textfield">
<?php
include('../connect.php');
$idnum=$_SESSION['SESS_FIRST_NAME'];
$results = $link->query("SELECT * FROM teachersubject WHERE teacher='$idnum'");
while($rows = $results->fetch_array())
	{
	echo '<option>'.$rows['subject'].'</option>';
	}
?>
</select><br>
Course<br>
<select name="course" class="textfield">
<?php
include('../connect.php');
$results = $link->query("SELECT * FROM course");
while($rows = $results->fetch_array())
	{
	echo '<option>'.$rows['coursecode'].'</option>';
	}
?>
</select>
<select name="level" class="textfield">
<option>1<option>
<option>2<option>
<option>3<option>
<option>4<option>
<option>5<option>
<option>6<option>
</select>
<select name="section" class="textfield">
<option>A<option>
<option>B<option>
<option>C<option>
<option>D<option>
</select><br>
<input type="submit" value="View" class="button">
</form>
