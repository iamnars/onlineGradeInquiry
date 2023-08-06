<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT * FROM notificatiion where id='$id'");

while($row = $result->fetch_array())
  {
	$position=$row['position'];
	$title=$row['title'];
	$message=$row['message'];
  }
?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editnoteexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">
<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
Position <br />
<select name="position" class="textfield">
    <option value="<?php echo $position ?>"><?php echo $position ?></option>
    <option value="teacher">Teacher</option>
    <option value="student">Student</option>
</select>
<br>
		Title<br>
        <input name="title" type="text" class="textfield" id="brnu" value="<?php echo $title?>" />
        <br>
        Message<br>
		<textarea name="message" class="textfield" id="brnu"><?php echo $message?></textarea>
		<br>
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>


