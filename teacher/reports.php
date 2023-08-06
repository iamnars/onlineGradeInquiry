<?php
	require_once('../auth.php');
?>
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
            <li><a href="listsubject.php">Submit Grade</a></li>
            <li><a href="notification.php">Announcements</a></li>
			<li><a href="reports.php">Reports</a></li>
			<li><a rel="facebox" href="editgrdaes.php">Edit Grades</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
             <form action="setsubjectprospectus.php" method="post">
		Course<br>
		<select name="course" class="textfield">
		<?php
		include('../connect.php');
        $id=$_SESSION['SESS_FIRST_NAME'];

		$results = mysql_query("SELECT * FROM teachersubject WHERE teacher='$id'");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option>'.$rows['course'].'</option>';
			}
		?>
		</select>

		<br>
        Section
        <br>
		<select name="section" class="textfield">
		<?php
		$results = mysql_query("SELECT * FROM teachersubject WHERE teacher='$id'");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['section'].'">'.$rows['section'].'</option>';
			}
		?>
		</select><br>
		Subject<br>
		<select name="subject" class="textfield">
		<?php
		$results = mysql_query("SELECT * FROM teachersubject WHERE teacher='$id'");
		while($rows = mysql_fetch_array($results))
			{
			echo '<option value="'.$rows['subject'].'">'.$rows['subject'].'</option>';
			}
		?>
		</select><br>
         <br>
		<input type="submit" value="View Report" class="button">
		</form>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
