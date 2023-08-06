<?php
 //session_start();
require_once('../auth.php');

?>
<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
<link rel="stylesheet" href="../css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/main.css" type="text/css" media="screen" />
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
			<li><a href="notify.php">Announcements</a></li>
			<li><a href="reports.php">Reports</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		<form action="setsubjectteacher.php" method="post">
		Teacher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subject
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Course
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Section<br>
		<select name="teacher" class="textfield">
		<?php
		include('../connect.php');
		$results = $link->query("SELECT * FROM teacher");
		while($rows = $results->fetch_array())
			{
			echo '<option value="'.$rows['idnumber'].'">'.$rows['fname'].' '.$rows['lname'].'</option>';
			}
		?>
		</select>
		<select name="subject" class="textfield">
		<?php
		$results = $link->query("SELECT * FROM subject");
		while($rows = $results->fetch_array())
			{
			echo '<option value="'.$rows['subject_id'].'">'.$rows['subject_id'].'</option>';
			}
		?>
        </select>
		<select name="course" class="textfield">
		<?php
		include('../connect.php');
		$results = $link->query("SELECT * FROM course");
		while($rows = $results->fetch_array())
			{
			echo '<option>'.$rows['coursecode'].'</option>';
			}
		?>
		</select>
		<select name="level" class="textfield">
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
		</select>

		<input type="submit" value="Assign" class="button">
		</form>
         <br>
	<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />

		<table cellpadding="1" cellspacing="1" id="resultTable">
			<thead>
				<tr>
					<th  style="border-left: 1px solid #FAEF92"> Teacher </th>
                    <th>Name</th>
					<th>Subject</th>
					<th>Section</th>
					<th>Course</th>
					<th>Year Level</th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
			<?php

				include('../connect.php');

                  $result = $link->query("SELECT teachersubject.*, teacher.fname, teacher.lname FROM teachersubject LEFT JOIN teacher ON teachersubject.teacher = teacher.idnumber
                  ORDER BY teacher, section, course, level ASC");


				while($row = $result->fetch_array())
					{
						echo '<tr class="record">';
						echo '<td  style="border-left: 1px solid #FAEF92">'.$row['teacher'].'</td>';
                        echo '<td><div align="left">'.$row['fname'].' '.$row['lname'];'</div></td>';
						echo '<td><div align="left">'.$row['subject'].'</div></td>';
						echo '<td><div align="left">'.$row['section'].'</div></td>';
						echo '<td><div align="left">'.$row['course'].'</div></td>';
						echo '<td><div align="left">'.$row['level'].'</div></td>';
						echo '<td><div align="left"><a rel="facebox" href="editteachersub.php?id='.$row['id'].'" title="Click To Edit">Edit</a> | <a href="#" id="'.$row['id'].'" class="delbutton" title="Click To Delete">delete</a></div></td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
<?php if (isset($_SESSION['SESS_ERROR'])): ?>
    <center><div class="form-errors">
        <?php foreach($_SESSION['SESS_ERROR'] as $error): ?>
            <p><font color="red" size="2"><?php echo $error ?></font></p>
        <?php endforeach; ?>
    </div></center>
<?php endif; ?>
         <?php unset($_SESSION['SESS_ERROR']); ?>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deleteteachersub.php",
   data: info,
   success: function(){

   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>
