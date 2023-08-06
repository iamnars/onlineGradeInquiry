
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="addteacherexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
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
Work<br />
<select name="work" class="textfield">
<option>Full Time</option>
<option>Part Time</option>
</select>
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
Address <br />
<input name="address" type="text" class="textfield" id="brnu" />
<br>
Email <br />
<input name="email" type="text" class="textfield" id="brnu" />
<br>
Contact No <br />
<input name="contactno" type="text" class="textfield" id="brnu" />
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
