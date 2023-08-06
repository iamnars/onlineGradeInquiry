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
            <li><a href="notification.php">Notification</a></li>
			<li><a href="percentage.php">Percentage</a></li>
			<li><a rel="facebox" href="editgrdaes.php">Edit Grades</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92">Assignmant</th>
				<th>Exam</th>
				<th>Participation</th>
				<th>Project</th>
				<th>Quiz</th>
				<th>Setwork</th>
			</tr>
			<tr>
			<?php
			echo '<td style="border-left: 1px solid #FAEF92">';
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM assignmentpercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editpera.php?tid='.$id.'&pe='.$row['apercentage'].'">'.$row['apercentage'].'</a>';
						}
			echo '</td>';
			?>
			<?php
			echo '<td>';
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM exampercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editpere.php?tid='.$id.'&pe='.$row['epercentage'].'">'.$row['epercentage'].'</a>';
						}
			echo '</td>';
			?>
			<?php
			echo '<td>';
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM participationpercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editperp.php?tid='.$id.'&pe='.$row['papercentage'].'">'.$row['papercentage'].'</a>';
						}
			echo '</td>';
			?>
			<?php
			echo '<td>';
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM projectpercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editperpp.php?tid='.$id.'&pe='.$row['ppercentage'].'">'.$row['ppercentage'].'</a>';
						}
			echo '</td>';
			?>
			<?php
			echo '<td>';
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM quizpercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editperq.php?tid='.$id.'&pe='.$row['qpercentage'].'">'.$row['qpercentage'].'</a>';
						}
			echo '</td>';
			?>
			<?php
			echo '<td>';
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM seatworkpercentage WHERE tid='$id'");
					while($row = mysql_fetch_array($result))
						{
							echo '<a rel="facebox" href="editpers.php?tid='.$id.'&pe='.$row['spercentage'].'">'.$row['spercentage'].'</a>';
						}
			echo '</td>';
			?>
			</tr>
		</table>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
