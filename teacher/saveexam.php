<?php
session_start();
include('../connect.php');

$subject=$_POST['subject'];
$studidnum=$_POST['studidnum'];
$pgrade=$_POST['pgrade'];
$mgrade=$_POST['mgrade'];
$pfgrade=$_POST['pfgrade'];
$fgrade=$_POST['fgrade'];
$gwa=$_POST['gwa'];
$N = count($studidnum);

for($i=0; $i < $N; $i++)
	{
	$pg=$pgrade[$i];
    $mg=$mgrade[$i];
    $pfg=$pfgrade[$i];
    $fg=$fgrade[$i];
    $gw=$gwa[$i];
    $result=$link->query("SELECT grade.*, ts.* FROM grade left join studentsubject ss on ss.id=grade.subject "
            . "left join teachersubject ts on ts.id=ss.subjectid WHERE grade.idnum = '$studidnum[$i]'
                AND ts.subject = '$subject'");
			if($result->num_rows > 0) {
				$_SESSION['SESS_ERROR'] = array("Record/s already exists! \r\n Please proceed to Edit Grade if you wish to update record/s.");
			}else {
                $link->query("INSERT INTO grade (idnum, prelim, midterm, prefinal, final, subject, gwa)
                        VALUES ('$studidnum[$i]','$pg','$mg','$pfg','$fg','$subject','$gw')");
			}


	}
header('location: listsubject.php');
?>