<?php
include('../connect.php');
$id=$_GET['id'];
$stmt = $link->prepare("SELECT * FROM admin WHERE id=?"); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_array())
  {
	$idnum=$row['idnum'];
	$password=$row['password'];
	$fname=$row['fname'];
	$lname=$row['lname'];
	$mname=$row['mname'];
	$birth=$row['birth'];
	$status=$row['status'];
	$gender=$row['gender'];
  }
?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editadmininfoexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
ID Number <br />
<input name="idnum" type="text" class="textfield" id="brnu" value="<?php echo $idnum?>" />
<br>
Password <br />
<input name="password" type="password" class="textfield" id="brnu" value="<?php echo $password?>" />
<br>
Firstname <br />
<input name="fname" type="text" class="textfield" id="brnu" value="<?php echo $fname?>" />
<br>
Lastname <br />
<input name="lname" type="text" class="textfield" id="brnu" value="<?php echo $lname?>" />
<br>
Middlename <br />
<input name="mname" type="text" class="textfield" id="brnu" value="<?php echo $mname?>" />
<br>
Birthdate<br />
<input name="birth" type="date" class="textfield" id="brnu" value="<?php echo $birth?>" />
<br>
Status <br />
<input name="stat" type="text" class="textfield" id="brnu" value="<?php echo $status?>" />
<br>
Gender <br />
<select name="gender" class="textfield">
<option><?php echo $gender?></option>
<option>Male</option>
<option>Female</option>
</select>
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
