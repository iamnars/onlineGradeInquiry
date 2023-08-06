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
			<li><a rel="facebox" href="editgrdaes.php">Edit Grades</a></li>
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
	
		<form id="form1" name="form1" method="post" action="saveexam.php">
			<input type="hidden" name="subject" value="<?php echo $_GET['subject']?>">
			<table cellpadding="1" cellspacing="1" id="resultTable">
			  <tr>
				<th style="border-left: 1px solid #FAEF92">ID #</th>
				<th>Name</th>
				<th>Prelim</th>
                <th>Midterm</th>
                <th>Prefinal</th>
                <th>Final</th>
                <th>GWA</th>
			  </tr>
			  <?php
				include('../connect.php');
				$course=$_GET['course'];
				$subject=$_GET['subject'];
				$level=$_GET['level'];
				$section=$_GET['section'];
				$results = mysql_query("SELECT * FROM student WHERE course='$course' AND section='$section' AND yearlevel='$level'");
						while($rows = mysql_fetch_array($results))
							{	
				?>
			  <tr>
				<td style="border-left: 1px solid #FAEF92"><?php echo $rows['idnumber']?><input type="hidden" name="studidnum[]" value="<?php echo $rows['idnumber']?>"></td>
				<td><?php echo $rows['fname'].' '.$rows['lname']?></td>
				<td>
					<input type="text" name="pgrade[]"/>
				</td>
                <td>
					<input type="text" name="mgrade[]"/>
				</td>
                <td>
					<input type="text" name="pfgrade[]"/>
				</td>
                <td>
					<input type="text" name="fgrade[]"/>
				</td>
                <td>
					<input type="text" name="gwa[]"/>
				</td>
			  </tr>
			  <?php
			  }
			  ?>
			</table>
			<input type="submit" value="Record">
		</form>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
