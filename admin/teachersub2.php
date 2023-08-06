<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
<link rel="stylesheet" href="../css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="main">
	<div id="header"></div>
	<div class="menu">
        <ul>
            <li><a href="profile.php">Profile</a></li>
			<li><a href="regsub.php">Add Subject</a></li>
			<li><a href="course.php">Course</a></li>
			<li><a href="studsub.php">Student Subject</a></li>
			<li><a href="teachersub.php">Teacher Subject</a></li>
			<li><a href="student.php">Student</a></li>
			<li><a href="teacher.php">Teachers</a></li>
			<li><a href="notify.php">Notify</a></li>
			<li><a href="prospectus.php">Prospectus</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		<form action="setsubjectteacher.php" method="post">
		Teacher<br>
		<select name="teacher" class="textfield">
		<?php
		include('../connect.php');
		$results = mysql_query("SELECT * FROM teacher");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['idnumber'].'">'.$rows['fname'].' '.$rows['lname'].'</option>';
			}
		?>
		</select><br>
		Subject<br>
		<select name="subject" class="textfield">
		<?php
		$results = mysql_query("SELECT * FROM subject");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['subject_id'].'">'.$rows['subject_id'].'</option>';
			}
		?>
		</select><br>
		Course<br>
		<select name="course" class="textfield">
		<?php
		include('../connect.php');
		$results = mysql_query("SELECT * FROM course");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option>'.$rows['coursecode'].'</option>';
			}
		?>
		</select>
		<select name="yearlevel" class="textfield">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
		</select>
		<select name="section" class="textfield">
		<option>A</option>
		<option>B</option>
		<option>C</option>
		<option>D</option>
		</select><br>
		<input type="submit" value="Assign" class="button">
		</form>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
