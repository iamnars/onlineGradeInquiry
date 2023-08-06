<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
<link rel="stylesheet" href="../css/main.css" type="text/css" media="screen" />
</head>
<body>
<div id="main">
	<div id="header"></div>
	<div class="menu">
        <ul>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="viewrecord.php">View Record</a></li>
            <li><a href="notification.php">Announcements</a></li>
			<!--<li><a href="printrecord.php">Reports</a></li>-->
			<li><a href="../index.php">Logout</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
	<ul>
	<?php
	include('../connect.php');
	$result = $link->query("SELECT * FROM notificatiion WHERE position='student'");
			while($row = $result->fetch_array())
				{
				   echo '<li>'.$row['title']." - ".$row['message'].'</li>';  
				}
	?>
	<div class="clearfix"></div>
	</ul>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
