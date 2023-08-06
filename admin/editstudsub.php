<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT ss.*, ts.teacher, ts.subject, ts.section, ts.course, ts.level, ts.sy, ts.term 
                                            FROM `studentsubject` ss 
                                            left join teachersubject ts on ss.subjectid=ts.id where id='$id'");

while($row = $result->fetch_array())
  {
	$subject=$row['subject'];
	$section=$row['section'];
	$course=$row['course'];
	$level=$row['level'];
	$sy=$row['sy'];
	$term=$row['term'];
  }
?>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<form name="myForm" action="editstudsubexec.php" method="post" enctype="multipart/form-data" name="addroom" onsubmit="return validateForm()">

<input name="id" type="hidden" class="textfield" id="brnu" value="<?php echo $id?>" />
Course <br />
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
Subject <br />
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
<br>
School Year <br />
        <input type="text" name="sy" class="textfield" value="<?php echo $sy?>" />
<br>
Semester<br />
		</select>
         <select name="term" class="textfield">
         <option><?php echo $term?></option>
		<option>1st sem</option>
		<option>2nd sem</option>
		</select>
<br>
<input type="submit" name="Submit" value="save" class="button" />
</form>
