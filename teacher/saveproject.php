<?php
include('../connect.php');
$subject=$_POST['subject'];
$studidnum=$_POST['studidnum'];
$projectresult=$_POST['projectresult'];
$N = count($studidnum);
for($i=0; $i < $N; $i++)
	{
	$asasas=$projectresult[$i];
	mysql_query("INSERT INTO project (idnum, subject, score) VALUES ('$studidnum[$i]','$subject','$asasas')");
	}
header('location: listsubject.php');
?>