<?php
	require_once('../auth.php');
?>
<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
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
	<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
	<a rel="facebox" href="addteacher.php">Add Teacher</a>
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<thead>
				<tr>
					<th  style="border-left: 1px solid #FAEF92"> Name </th>
					<th>ID Number</th>
					<th>Work</th>
					<th>Gender</th>
					<th>Status</th>
					<th>Birthday</th>
					<th> Action </th>
				</tr>
			</thead>
			<tbody>
			<?php
				include('../connect.php');
				$result = $link->query("SELECT * FROM teacher");
				while($row = $result->fetch_array())
					{
						echo '<tr class="record">';
						echo '<td  style="border-left: 1px solid #FAEF92">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</td>';
						echo '<td><div align="left">'.$row['idnumber'].'</div></td>';
						echo '<td><div align="left">'.$row['work'].'</div></td>';
						echo '<td><div align="left">'.$row['gender'].'</div></td>';
						echo '<td><div align="left">'.$row['status'].'</div></td>';
						echo '<td><div align="left">'.$row['bday'].'</div></td>';
						echo '<td><div align="left"><a rel="facebox" href="editteacherprofile.php?id='.$row['id'].'" title="Click To Edit">Edit Profile</a> | <a rel="facebox" href="viewworkload.php?id='.$row['idnumber'].'">View Load</a> | <a href="#" id="'.$row['id'].'" class="delbutton" title="Click To Delete">delete</a></div></td>';
						echo '</tr>';
					}
				?> 
			</tbody>
		</table>
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
   url: "deleteteacher.php",
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
