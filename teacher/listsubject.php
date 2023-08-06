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
	<?php 
	include('../connect.php');
	$id=$_SESSION['SESS_MEMBER_ID'];
	$results = $link->query("SELECT * FROM teacher WHERE id='$id'");
			while($rows = $results->fetch_array())
				{
				$rarararara=$rows['idnumber'];
				}
	?>
		<table cellpadding="1" cellspacing="1" id="resultTable">
			<tr>
				<th style="border-left: 1px solid #FAEF92">Subject</th>
				<th>Course</th>
				<th>Year Level</th>
				<th>Section</th>
				<th>Action</th>
			</tr>
			<?php
			
			
			$result = $link->query("SELECT * FROM teachersubject WHERE teacher='$rarararara'");
			while($row = $result->fetch_array())
				{
					echo '<tr>';
					echo '<td style="border-left: 1px solid #FAEF92"><div align="left">'.$row['subject'].'</div></td>';
					echo '<td><div align="left">'.$row['course'].'</div></td>';
					echo '<td><div align="left">'.$row['level'].'</div></td>';
					echo '<td><div align="left">'.$row['section'].'</div></td>';
					echo '<td><div align="left"><a href="submitgrades.php?subject='.$row['subject'].'&course='.$row['course'].'&level='.$row['level'].'&section='.$row['section'].'&sy='.$row['sy'].'&term='.$row['term'].'" title="Click To Edit">Submit Grade</a></td>';
					echo '</tr>';
				}
			?>
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
</body>
</html>
