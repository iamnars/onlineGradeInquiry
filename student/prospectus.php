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
            <li><a href="viewrecord.php">View Record</a></li>
            <li><a href="notification.php">Notification</a></li>
			<li><a href="prospectus.php">Prospectus</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		1st Year 1st semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='1' AND semister='1'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		1st Year 2nd semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='1' AND semister='2'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		2nd Year 1st semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='2' AND semister='1'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		2nd Year 2nd semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='2' AND semister='2'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		3rd Year 1st semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='3' AND semister='1'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		3rd Year 2nd semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='3' AND semister='2'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		4th Year 1st semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='4' AND semister='1'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
		4th Year 2nd semister
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92" width="20%" width="20%">Code</th>
				<th>Description</th>
				<th width="20%">Unit</th>
			</tr>
			<?php
			include('../connect.php');
			$id=$_SESSION['SESS_FIRST_NAME'];
			$result = mysql_query("SELECT * FROM prospectus WHERE coursecode='$id' AND year='4' AND semister='2'");
					while($row = mysql_fetch_array($result))
						{
							echo '<tr>';
							echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
							$subject=$row['subject'];
							$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
							while($rows = mysql_fetch_array($results))
								{
								echo '<td><div align="left">'.$rows['Title'].'</div></td>';
								echo '<td><div align="left">'.$rows['unit'].'</div></td>';
								}
							echo '</tr>';
						}
			?>
		</table>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
