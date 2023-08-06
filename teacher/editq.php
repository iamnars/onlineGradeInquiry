<?php
$idnum=$_GET['idnumber'];
$week=$_GET['week'];
$subject=$_GET['subject'];
include('../connect.php');
$results = mysql_query("SELECT * FROM quiz WHERE idnumber='$idnum' AND subject='$subject' AND week='$week'");
while($rows = mysql_fetch_array($results))
	{
	$score=$rows['score'];
	$id=$rows['id'];
	}
?>

<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editqexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
Score <br />
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
<input name="ccode" type="text" class="textfield" id="brnu" value="<?php echo $score?>" readonly/>
<br>
New Score <br />
<input name="nscore" type="text" class="textfield" id="brnu" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
