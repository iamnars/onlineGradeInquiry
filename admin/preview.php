<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
<?php
	require_once('../auth.php');
        $course="";
        $year="";
        $section="";
        $idnumber="";
?>
<div id="print_content">
<?php
include('../connect.php');
$id=$_SESSION['SESS_MEMBER_ID'];
$result = $link->query("SELECT * FROM student WHERE id='$id'");
		while($row = $result->fetch_array())
			{
				$course=$row['course'];
				$year=$row['yearlevel'];
				$section=$row['section'];
				$idnumber=$row['idnumber'];
			}
?>

<table cellpadding="5" cellspacing="0" id="resultTable" border="1">
  <tr>
    <th width="86" rowspan="2">Code</th>
    <th width="59" rowspan="2">Instructor</th>
    <th width="56" rowspan="2">Unit</th>
	<th width="23" rowspan="2">Project</th>
    <th width="23" rowspan="2">PE</th>
    <th width="23" rowspan="2">ME</th>
    <th width="23" rowspan="2">EE</th>
	<th width="23" rowspan="2">PG</th>
    <th width="23" rowspan="2">MG</th>
    <th width="23" rowspan="2">EG</th>
    <th width="17" rowspan="2">Final Grade</th>
	<th width="17" rowspan="2">Remarks</th>
  </tr>
  <tr>
  </tr>
  <?php
  $result = $link->query("SELECT * FROM studentsubject WHERE section='$section' AND level='$year' AND course='$course'");
while($row = $result->fetch_array())
	{
  ?>
  <tr>
    <td style="border-left: 1px solid #FAEF92"><?php echo $row['subject']?></td>
	<?php
	$subject=$row['subject'];
	$resultj = $link->query("SELECT * FROM teachersubject WHERE subject='$subject' AND section='$section' AND level='$year' AND course='$course'");
        while($rowj = $resultj->fetch_array()){
            $ttt=$rowj['teacher'];
	}
	?>
	<td>
	<?php
	$results = $link->query("SELECT * FROM teacher WHERE idnumber='$ttt'");
        while($rows = $results->fetch_array()){
            echo $rows['fname'].' '.$rows['lname'];
        }
	?>
    <?php
	$resultas = $link->query("SELECT * FROM assignmentpercentage WHERE tid='$ttt'");
        while($rowas = $resultas->fetch_array()){
            $a=$rowas['apercentage'];
        }
	?>
    <?php
	$resulte = $link->query("SELECT * FROM exampercentage WHERE tid='$ttt'");
        while($rowe = $resulte->fetch_array()){
            $e=$rowe['epercentage'];
        }
	?>
    <?php
	$resultp = $link->query("SELECT * FROM participationpercentage WHERE tid='$ttt'");
        $rowp = mysql_fetch_array($resultp);
        while($rowp = $resultp->fetch_array()){
            $p=$rowp['papercentage'];
        }
	
	?>
    <?php
	$resultpp = $link->query("SELECT * FROM projectpercentage WHERE tid='$ttt'");
        while($rowpp = $resultpp->fetch_array()){
            $pp=$rowpp['ppercentage'];
        }
	?>
    <?php
	$resultq = $link->query("SELECT * FROM quizpercentage WHERE tid='$ttt'");
        while($rowq = $resultq->fetch_array())
	{
            $q=$rowq['qpercentage'];
	}
	?>
    <?php
	$resultse = $link->query("SELECT * FROM seatworkpercentage WHERE tid='$ttt'");
        while($rowse = $resultse->fetch_array())
	{
            $s=$rowse['spercentage'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM subject WHERE subject_id='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['unit'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM project WHERE idnum='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	$projecttttt=$rows['score'];
	}
	?>
	</td>
	<td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	$sddsaqexcvdd=$rows['score'];
	echo round($sddsaqexcvdd, 2);
	$preexam=$rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	$sdsdsd=$rows['score'];
	echo round($sdsdsd, 2);
	$midexam=$rows['score'];
	}
	?>
	</td>
	<td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	$sdsdsdslkklk=$rows['score'];
	echo round($sdsdsdslkklk, 2);
	$endexam=$rows['score'];
	}
	?>
	</td>
	<td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE idnumber='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	$quiz=$rows['sum(score)'];
	$quizez=$quiz/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE idnumber='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	$part=$rows['sum(score)'];
	$participate=$part/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE idnumber='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	$seat=$rows['sum(score)'];
	$seatw=$seat/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE idnumber='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	$assign=$rows['sum(score)'];
	$assignment=$assign/6;
	}
	?>
	<?php
	$prelllllllm=(($assignment*$a)+($seatw*$s)+($participate*$p)+($quizez*$q)+($projecttttt*$p)+($preexam*$e));
	echo round($prelllllllm, 2);
	$prefinal=$prelllllllm*.30;
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE idnumber='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	$quiz=$rows['sum(score)'];
	$quizez=$quiz/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE idnumber='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	$part=$rows['sum(score)'];
	$participate=$part/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE idnumber='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	$seat=$rows['sum(score)'];
	$seatw=$seat/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE idnumber='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	$assign=$rows['sum(score)'];
	$assignment=$assign/6;
	}
	?>
	<?php
	$middddddtrn=(($assignment*$a)+($seatw*$s)+($participate*$p)+($quizez*$q)+($projecttttt*$p)+($midexam*$e));
	echo round($middddddtrn, 2);
	$midfinal=$middddddtrn*.30;
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE idnumber='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	$quiz=$rows['sum(score)'];
	$quizez=$quiz/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE idnumber='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	$part=$rows['sum(score)'];
	$participate=$part/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE idnumber='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	$seat=$rows['sum(score)'];
	$seatw=$seat/6;
	}
	?>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE idnumber='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	$assign=$rows['sum(score)'];
	$assignment=$assign/6;
	}
	?>
	<?php
	$eeeennnnd=(($assignment*$a)+($seatw*$s)+($participate*$p)+($quizez*$q)+($projecttttt*$p)+($endexam*$e));
	echo round($eeeennnnd, 2);
	$endfinal=$eeeennnnd*.40;
	?>
	</td>
    <td>
	<?php
	$overallfinal=$prefinal+$endfinal+$midfinal;
	echo round($overallfinal, 2);
	?>
	</td>
	<td>
	<?php
	if($overallfinal<74){
	echo '<div style="color:red">Failed</div>';
	}
	if($overallfinal>74){
	echo '<div style="color:blue">Passed</div>';
	}
	?>
	</td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
<a href="javascript:Clickheretoprint()">Print</a>