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
<script type="text/javascript">
function validateForm()
{
var x=document.forms["form1"]["term"].value;
var y=document.forms["form1"]["weeknumber"].value;
if (x=='Prelim' && y>6)
  {
  alert("Something Wrong In the Term and Week Pls Check");
  return false;
  }
if (x=='Midterm' && y<7 && y>12)
  {
  alert("Something Wrong In the Term and Week Pls Check");
  return false;
  }
if (x=='Endterm' && y<12)
  {
  alert("Something Wrong In the Term and Week Pls Check");
  return false;
  }
  var con = confirm("Are You Sure? you want to proceed?");
if (con ==false)
{
return false;
}
}
</script>
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
	
		<form id="form1" method="post" action="savegrade.php" name="form1" onSubmit="return validateForm()">
			Select Term: 
			<select name="term">
			<option>Prelim</option>
			<option>Midterm</option>
			<option>Endterm</option>
			</select><br>
			Select Week Number:
			<select name="weeknumber">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			</select><br>
			<input type="hidden" name="subject" value="<?php echo $_GET['subject']?>">
			<table cellpadding="1" cellspacing="1" id="resultTable">
			  <tr>
				<th style="border-left: 1px solid #FAEF92">ID #</th>
				<th>Name</th>
				<th>Quizes</th>
				<th>Assignment</th>
				<th>Seat Work</th>
				<th>Participation</th>
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
					<input type="text" name="quizans[]"/>
				</td>
				<td>
					<input type="text" name="assignmentans[]"/>
				</td>
				<td>
					<input type="text" name="seatworkans[]"/>
				</td>
				<td>
					<input type="text" name="participatans[]"/>
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
