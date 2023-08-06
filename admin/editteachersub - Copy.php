<?php
include('../connect.php');
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM teachersubject where id='$id'");
$teacher="";
while($row = mysql_fetch_array($result))
  {
    $teacherid = $row['teacher'];
	$subject=$row['subject'];
	$section=$row['section'];
	$course=$row['course'];
	$level=$row['level'];
    $sy=$row['sy'];
    $term=$row['term'];
  }
$result = mysql_query("SELECT * FROM teacher where idnumber ='$teacherid'");
while($row = mysql_fetch_array($result))
  {
    $teacher = $row['fname'].' '. $row['lname'];
  }

?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editteachersubexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">

<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
Teacher <br />
		<select name="teacher" class="textfield">
        <option value="<?php echo $teacherid?>"><?php echo $teacher?></option>
		<?php
		include('../connect.php');
		$results = mysql_query("SELECT * FROM teacher");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['idnumber'].'">'.$rows['fname'].' '.$rows['lname'].'</option>';
			}
		?>
		</select>
<br>Subject<br />
		<select name="subject" class="textfield">
        <option><?php echo $subject?></option>
		<?php
		$results = mysql_query("SELECT * FROM subject");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['subject_id'].'">'.$rows['subject_id'].'</option>';
			}
		?>
        </select>
Course <br />
        </select>
		<select name="course" class="textfield">
        <option><?php echo $course?></option>
		<?php
		include('../connect.php');
		$results = mysql_query("SELECT * FROM course");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option>'.$rows['coursecode'].'</option>';
			}
		?>
		</select>
<br>
Year Level <br />
		<select name="level" class="textfield">
        <option><?php echo $level?></option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		</select>
<br>
Section <br />
		<select name="section" class="textfield">
        <option><?php echo $section?></option>
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		</select>
<br>
School Year <br />
<input type="text" name="sy" class="textfield" value="<?php echo $sy?>" />
<br>
Semester <br />
         <select name="term" class="textfield">
         <option><?php echo $term?></option>
		<option>1st sem</option>
		<option>2nd sem</option>
		</select>
<input type="submit" name="Submit" value="save" class="button" />
</form>
