
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="addadminexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
Firstname <br />
<input name="fname" type="text" class="textfield" id="brnu" />
<br>
Lastname <br />
<input name="lname" type="text" class="textfield" id="brnu" />
<br>
Middlename <br />
<input name="mname" type="text" class="textfield" id="brnu" />
<br>
ID Number <br />
<input name="idnum" type="text" class="textfield" id="brnu" />
<br>
Gender<br />
<select name="gender" class="textfield">
<option>Male</option>
<option>Female</option>
</select>
<br>
Status<br />
<select name="status" class="textfield">
<option>Single</option>
<option>Married</option>
</select>
<br>
Birthday<br />
<input name="bday" type="date" class="textfield" id="brnu" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
