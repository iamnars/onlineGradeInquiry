<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT grade.*, student.*, student.id AS 'studid' FROM grade LEFT JOIN student ON student.idnumber = grade.idnum where grade.id='$id'");

while($row = $result->fetch_array())
  {
    $studid=$row['studid'];
	$idnum=$row['idnum'];
	$prelim=$row['prelim'];
	$midterm=$row['midterm'];
	$prefinal=$row['prefinal'];
	$final=$row['final'];
	$gwa=$row['gwa'];
	$subject=$row['subject'];
    $student=$row['fname'].' '.$row['mname'].' '.$row['lname'];
  }
?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editgradesexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
<br />
<input name="idnum" type="hidden" class="textfield" id="brnu" value="<?php echo $idnum?>" readonly />
<br>
Student <br />
<input name="studentname" type="text" class="textfield" id="brnu" value="<?php echo $student?>" readonly />
<br>
Prelim <br />
<input name="prelim" type="text" class="textfield" id="brnu" value="<?php echo $prelim?>" />
<br>
Midterm <br />
<input name="midterm" type="text" class="textfield" id="brnu" value="<?php echo $midterm?>" />
<br>
Prefinal <br />
<input name="final" type="text" class="textfield" id="brnu" value="<?php echo $prefinal?>" />
<br>
Final<br />
<input name="prefinal" type="text" class="textfield" id="brnu" value="<?php echo $final?>" />
<br>
GWA <br />
<input name="gwa" type="text" class="textfield" id="brnu" value="<?php echo $gwa?>" />
<br>
 <input name="studid" type="hidden" class="textfield" id="brnu" value="<?php echo $studid?>" />
<input type="submit" name="Submit" value="save" class="button" />

</form>
