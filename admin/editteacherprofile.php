<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT * FROM teacher where id='$id'");

while($row = $result->fetch_array())
  {
	$idnum=$row['idnumber'];
	$password=$row['password'];
	$fname=$row['fname'];
	$lname=$row['lname'];
	$mname=$row['mname'];
	$birth=$row['bday'];
	$status=$row['status'];
	$gender=$row['gender'];
	$work=$row['work'];
    $address=$row['address'];
    $email=$row['email'];
    $contactno=$row['contactno'];
  }
?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editteacherinfoexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
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
Work <br />
<input name="work" type="text" class="textfield" id="brnu" value="<?php echo $work?>" />
<br>
Address <br />
<input name="address" type="text" class="textfield" id="brnu" value="<?php echo $address?>" />
<br>
Email <br />
<input name="email" type="text" class="textfield" id="brnu" value="<?php echo $email?>" />
<br>
Contact No <br />
<input name="contactno" type="text" class="textfield" id="brnu" value="<?php echo $contactno?>" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
