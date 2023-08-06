<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
<?php
	require_once('../auth.php');
?>
<?php
include('../connect.php');
$id=$_GET['id'];
$result = $link->query("SELECT * FROM student WHERE id='$id'");
		while($row = $result->fetch_array())
			{
				$course=$row['course'];
				$year=$row['yearlevel'];
				$section=$row['section'];
				$idnumber=$row['idnumber'];
			}
?>
<table width="1997" cellpadding="1" cellspacing="1" id="resultTable">
  <tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">Code</th>
    <th width="59" rowspan="2">Instructor</th>
    <th width="56" rowspan="2">Unit</th>
    <th colspan="4">week 1</th>
    <th colspan="4">week 2</th>
    <th colspan="4">week 3</th>
    <th colspan="4">week 4</th>
    <th colspan="4">week 5</th>
    <th colspan="4">week 6</th>
    <th colspan="4">PRELIM</th>
    <th width="23" rowspan="2">PE</th>
    <th width="23" rowspan="2">PG</th>
    <th colspan="4">week 7</th>
    <th colspan="4">week 8</th>
    <th colspan="4">week 9</th>
    <th colspan="4">week 10</th>
    <th colspan="4">week 11</th>
    <th colspan="4">week 12</th>
    <th colspan="4">MIDTERM</th>
    <th width="23" rowspan="2">ME</th>
    <th width="23" rowspan="2">MG</th>
    <th colspan="4">week 13</th>
    <th colspan="4">week 14</th>
    <th colspan="4">week 15</th>
    <th colspan="4">week 16</th>
    <th colspan="4">week 17</th>
    <th colspan="4">week 18</th>
    <th colspan="4">ENDTERM</th>
    <th width="23" rowspan="2">EE</th>
    <th width="23" rowspan="2">EG</th>
	<th width="23" rowspan="2">Project</th>
    
    
	
    
    
    <th width="17" rowspan="2">Final Grade</th>
	<th width="17" rowspan="2">Remarks</th>
  </tr>
  <tr>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">Q</th>
    <th width="20">A</th>
    <th width="20">S</th>
    <th width="20">P</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    
    <th width="20">Q</th>
    <th width="20">A</th>
    <th width="20">S</th>
    <th width="20">P</th>
    
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    <th width="20">q</th>
    <th width="20">a</th>
    <th width="20">s</th>
    <th width="20">p</th>
    
    <th width="20">Q</th>
    <th width="20">A</th>
    <th width="20">S</th>
    <th width="20">P</th>
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
        while($rowj = $resultj->fetch_array())
	{
            $ttt=$rowj['teacher'];
	}
	?>
	<td>
	<?php
	$results = $link->query("SELECT * FROM teacher WHERE idnumber='$ttt'");
        while($rows = $results->fetch_array())
	{
            echo $rows['fname'].' '.$rows['lname'];
	}
	
	?>
    <?php
	$resultas = $link->query("SELECT * FROM assignmentpercentage WHERE tid='$ttt'");
        while($rowas = $resultas->fetch_array())
	{
            $a=$rowas['apercentage'];
	}
	?>
    <?php
	$resulte = $link->query("SELECT * FROM exampercentage WHERE tid='$ttt'");
        while($rowe = $resulte->fetch_array())
	{
            $e=$rowe['epercentage'];
	}
	?>
    <?php
	$resultp = $link->query("SELECT * FROM participationpercentage WHERE tid='$ttt'");
        while($rowp = $resultp->fetch_array())
	{
            $p=$rowp['papercentage'];
	}
	?>
    <?php
	$resultpp = $link->query("SELECT * FROM projectpercentage WHERE tid='$ttt'");
        while($rowpp = $resultpp->fetch_array())
	{
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
        while($row = $results->fetch_array()){
            echo $row['unit'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='1' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='1' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
        <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='1' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='1' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='2' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='2' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='2' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
            ?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='2' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='3' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='3' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='3' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='3' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='4' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='4' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='4' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='4' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='5' AND idnumber='$idnumber' AND subject='$subject'");
        while($rows = $results->fetch_array())
	{
            echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='5' AND idnumber='$idnumber' AND subject='$subject'");
    while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='5' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='5' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='6' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='6' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='6' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='6' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    
    
    
    
    
    
    
    
    
     <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE term='Prelim' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghg=$rows['sum(score)'];
	$sddsaqexcvdd=$asasghghg/6;
	echo round($sddsaqexcvdd, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE term='Prelim' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjk=$rows['sum(score)'];
	$sddsaqexcvddjk=$asasghghgjk/6;
	echo round($sddsaqexcvddjk, 2);
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE term='Prelim' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkk=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvc=$asasghghgjkkkkk/6;
	echo round($sddsaqexcvddjkcvcvc, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE term='Prelim' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkks=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvcs=$asasghghgjkkkkks/6;
	echo round($sddsaqexcvddjkcvcvcs, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Prelim'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	$preexam=$rows['score'];
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
	$results = $link->query("SELECT * FROM project WHERE idnum='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$projecttttt=$rows['score'];
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
	$results = $link->query("SELECT * FROM quiz WHERE week='7' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='7' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='7' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='7' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='8' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='8' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='8' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='8' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='9' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='9' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='9' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='9' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='10' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='10' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='10' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='10' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='11' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='11' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='11' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='11' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='12' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='12' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='12' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='12' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    
    
    
    
    
    
    
    
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE term='Midterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgm=$rows['sum(score)'];
	$sddsaqexcvddm=$asasghghgm/6;
	echo round($sddsaqexcvddm, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE term='Midterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkm=$rows['sum(score)'];
	$sddsaqexcvddjkm=$asasghghgjkm/6;
	echo round($sddsaqexcvddjkm, 2);
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE term='Midterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkkm=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvcm=$asasghghgjkkkkkm/6;
	echo round($sddsaqexcvddjkcvcvcm, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE term='Midterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkksm=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvcsm=$asasghghgjkkkkksm/6;
	echo round($sddsaqexcvddjkcvcvcsm, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Midterm'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	$midexam=$rows['score'];
	}
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
	$results = $link->query("SELECT * FROM project WHERE idnum='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$projecttttt=$rows['score'];
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
	$results = $link->query("SELECT * FROM quiz WHERE week='13' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='13' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='13' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='13' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='14' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='14' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='14' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='14' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='15' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='15' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='15' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='15' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
    <td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='16' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='16' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='16' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='16' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
	<td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='17' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='17' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='17' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='17' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
	
	<td>
	<?php
	$results = $link->query("SELECT * FROM quiz WHERE week='18' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM assignment WHERE week='18' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT * FROM seatwork WHERE week='18' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT * FROM participation WHERE week='18' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	}
	?>
	</td>
    
    
    
    
    
    
    
    
    
    
    
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM quiz WHERE term='Endterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgme=$rows['sum(score)'];
	$sddsaqexcvddme=$asasghghgme/6;
	echo round($sddsaqexcvddme, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM assignment WHERE term='Endterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkme=$rows['sum(score)'];
	$sddsaqexcvddjkme=$asasghghgjkme/6;
	echo round($sddsaqexcvddjkme, 2);
	}
	?>
	</td>
     <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM seatwork WHERE term='Endterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkkme=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvcme=$asasghghgjkkkkkme/6;
	echo round($sddsaqexcvddjkcvcvcme, 2);
	}
	?>
	</td>
    <td>
	<?php
	$results = $link->query("SELECT sum(score) FROM participation WHERE term='Endterm' AND idnumber='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$asasghghgjkkkkksme=$rows['sum(score)'];
	$sddsaqexcvddjkcvcvcsme=$asasghghgjkkkkksme/6;
	echo round($sddsaqexcvddjkcvcvcsme, 2);
	}
	?>
	</td>
    
    
    
    
    
    
    
    
    
    
    
	<td>
	<?php
	$results = $link->query("SELECT * FROM exam WHERE idnum='$idnumber' AND subject='$subject' AND term='Endterm'");
while($rows = $results->fetch_array())
	{
	echo $rows['score'];
	$endexam=$rows['score'];
	}
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
	$results = $link->query("SELECT * FROM project WHERE idnum='$idnumber' AND subject='$subject'");
while($rows = $results->fetch_array())
	{
	$projecttttt=$rows['score'];
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
<a href="#" onClick="window.open('preview.php?subject=<?php echo $subject;?>&course=<?php echo $course;?>&level=<?php echo $year;?>&section=<?php echo $section;?>','mywindow','scrollbars=yes,width=1050,height=700')">Preview</a>