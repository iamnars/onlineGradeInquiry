<?php
include('../connect.php');
$term=$_POST['term'];
$weeknumber=$_POST['weeknumber'];
$studidnum=$_POST['studidnum'];
$subject=$_POST['subject'];
$quizans=$_POST['quizans'];
$assignmentans=$_POST['assignmentans'];
$seatworkans=$_POST['seatworkans'];
$participatans=$_POST['participatans'];
$N = count($studidnum);
for($i=0; $i < $N; $i++)
	{
	$asasas=$quizans[$i];
	mysql_query("INSERT INTO quiz (term, idnumber, subject, score, week) VALUES ('$term','$studidnum[$i]','$subject','$asasas','$weeknumber')");
	}
for($o=0; $o < $N; $o++)
	{
	$hhhh=$assignmentans[$o];
	mysql_query("INSERT INTO assignment (term, idnumber, subject, score, week) VALUES ('$term','$studidnum[$o]','$subject','$hhhh','$weeknumber')");
	}
for($p=0; $p < $N; $p++)
	{
	$jhjh=$seatworkans[$p];
	mysql_query("INSERT INTO seatwork (term, idnumber, subject, score, week) VALUES ('$term','$studidnum[$p]','$subject','$jhjh','$weeknumber')");
	}
for($z=0; $z < $N; $z++)
	{
	$dsds=$participatans[$z];
	mysql_query("INSERT INTO participation (term, idnumber, subject, score, week) VALUES ('$term','$studidnum[$z]','$subject','$dsds','$weeknumber')");
	}
header('location: listsubject.php');
?>