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
</head>
<body>
<div id="main">
	<div id="header"></div>
	<div class="menu">
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="listsubject.php">Submit Grade</a></li>
            <li><a href="notification.php">Announcements</a></li>
			<li><a href="start_reports.php">Reports</a></li>
			<li><a rel="facebox" href="editgrdaes.php">Edit Grades</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92">Name</th>
				<th>ID Number</th>
				<th>Work</th>
				<th>Birthday</th>
				<th>Status</th>
				<th>Gender</th>
				<th>Action</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_MEMBER_ID'];
			$result = $link->query("SELECT * FROM teacher WHERE id='$id'");
					while($row = $result->fetch_array())
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</td>';
							echo '<td><div align="left">'.$row['idnumber'].'</div></td>';
							echo '<td><div align="left">'.$row['work'].'</div></td>';
							echo '<td><div align="left">'.$row['bday'].'</div></td>';
							echo '<td><div align="left">'.$row['status'].'</div></td>';
							echo '<td><div align="left">'.$row['gender'].'</div></td>';
							echo '<td><div align="center"><a rel="facebox" href="editprofile.php?id='.$row['id'].'" title="Click To Edit">Edit Profile</a></div></td>';
							echo '</tr>';
						}
			?>
		</table>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
