<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>STI Online Grade Inquiry | STI College - General Santos City</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />

</head>
<body>
<div id="main">
	<div id="header"></div>
<div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="index.php">Login</a></li>
        </ul>
        <br style="clear: left">
    </div>
	<div id="content">
		<form action="login.php" method="post">
		  <div align="left">I.D. Number<br>
		    <input type="text" name="id" class="textfield">
		    <br>
		Password<br>
		<input type="password" name="password" class="textfield">
		<br>
		<input type="submit" value="Login" class="button">
		  </div>
	  </form>
	</div>
	<div class="footer">Copyright © 2014. STI College - General Santos City. All Rights Reserved.</div>
</div>
</body>
</html>
