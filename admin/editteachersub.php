<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT * FROM teachersubject where id='$id'");
$teacher="";
while($row = $result->fetch_array())
  {
    $teacherid = $row['teacher'];
	$subject=$row['subject'];
	$section=$row['section'];
	$course=$row['course'];
	$level=$row['level'];
  }
$result = $link->query("SELECT * FROM teacher where idnumber ='$teacherid'");
while($row = $result->fetch_array())
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
		$results = $link->query("SELECT * FROM teacher");
		while($rows = $results->fetch_array())
			{
			echo '<option value="'.$rows['idnumber'].'">'.$rows['fname'].' '.$rows['lname'].'</option>';
			}
		?>
		</select>
<br>Subject<br />
		<select name="subject" class="textfield">
        <option><?php echo $subject?></option>
		<?php
		$results = $link->query("SELECT * FROM subject");
		while($rows = $results->fetch_array())
			{
			echo '<option value="'.$rows['subject_id'].'">'.$rows['subject_id'].'</option>';
			}
		?>
        </select>
    <br>Course <br />
        </select>
		<select name="course" class="textfield">
        <option><?php echo $course?></option>
		<?php
		include('../connect.php');
		$results = $link->query("SELECT * FROM course");
		while($rows = $results->fetch_array())
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
<input type="submit" name="Submit" value="save" class="button" />
</form>
