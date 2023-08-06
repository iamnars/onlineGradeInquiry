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
<?php
	require_once('../auth.php');
?>
<?php
include('../connect.php');
$id=$_GET['id'];
$sub=$_GET['sub'];
$teach=$_GET['teach'];

$result = $link->query("SELECT * FROM student WHERE id='$id'");
		while($row = $result->fetch_array())
			{
				$course=$row['course'];
				$year=$row['yearlevel'];
				$section=$row['section'];
				$idnumber=$row['idnumber'];
                                $studname=$row['fname'].' '.$row['mname'].' '.$row['lname'];
			}
?>
<table width="1997" cellpadding="1" cellspacing="1" id="resultTable">
  <tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">Code</th>
    <th width="40" rowspan="2">STUDENT</th>
    <th width="17" rowspan="2">Unit</th>
    <th width="17" rowspan="2">PRELIM</th>
    <th width="17" rowspan="2">MIDTERM</th>
    <th width="17" rowspan="2">PREFINAL</th>
    <th width="17" rowspan="2">FINAL</th>
    <th width="17" rowspan="2">GWA</th>
    <th width="17" rowspan="2">NUMERIC GRADE</th>
	<th width="17" rowspan="2">Remarks</th>
    <th width="17" rowspan="2">Action</th>
  </tr>

  <tr>
<?php
  $result = $link->query("SELECT ss.*,ts.teacher, ts.subject, ts.section, ts.course, ts.level, ts.sy, ts.term FROM studentsubject ss LEFT JOIN teachersubject ts ON ss.subjectid=ts.id"
          . " WHERE section='$section' AND level='$year' AND course='$course' AND ts.teacher='$teach' AND ts.subject='$sub'");
while($row = $result->fetch_array())
	{
  ?>
  <tr>
    <td style="border-left: 1px solid #FAEF92"><?php echo $row['subject']?></td>
          	
	<td>
        	<?php
        	echo $studname;
        	?>
	</td>

    <td>
          	<?php
          	$results = $link->query("SELECT * FROM subject WHERE subject_id='$sub'");
          while($rows = $results->fetch_array())
          	{
          	echo $rows['unit'];
          	}
          	?>
	</td>

			<?php
			$result = $link->query("SELECT grade.*, ts.subject FROM grade left join studentsubject ss on grade.subject = ss.id
                                                left join teachersubject ts on ts.id=ss.subjectid WHERE idnum='$idnumber' AND ts.subject='$sub' AND ts.teacher='$teach'");
					while($row = $result->fetch_array())
						{
							//echo '<tr>';
                            $stud_gwa= $row['gwa'];
							echo '<td style="border-left: 1px solid #FAEF92">'.$row['prelim'].'</td>';
							echo '<td><div align="left">'.$row['midterm'].'</div></td>';
							echo '<td><div align="left">'.$row['prefinal'].'</div></td>';
							echo '<td><div align="left">'.$row['final'].'</div></td>';
							echo '<td><div align="left">'.$row['gwa'].'</div></td>';

                        echo '<td>';
                        	if($stud_gwa>=0 && $stud_gwa<75){
    	                        echo '<div align="left">5</div>';
                            	}
    	                    if($stud_gwa>=75 && $stud_gwa<77){
    	                        echo '<div align="left">3</div>';
    	                        }
                            if($stud_gwa>=77 && $stud_gwa<80){
    	                        echo '<div align="left">2.75</div>';
    	                        }
                            if($stud_gwa>=80 && $stud_gwa<83){
    	                        echo '<div align="left">2.5</div>';
    	                        }
                            if($stud_gwa>=83 && $stud_gwa<86){
    	                        echo '<div align="left">2.25</div>';
    	                        }
                            if($stud_gwa>=86 && $stud_gwa<89){
    	                        echo '<div align="left">2</div>';
    	                        }
                            if($stud_gwa>=89 && $stud_gwa<92){
    	                        echo '<div align="left">1.75</div>';
    	                        }
                            if($stud_gwa>=92 && $stud_gwa<95){
    	                        echo '<div align="left">1.5</div>';
    	                        }
                            if($stud_gwa>=95 && $stud_gwa<98){
    	                        echo '<div align="left">1.25</div>';
    	                        }
                            if($stud_gwa>=98 && $stud_gwa<100){
    	                        echo '<div align="left">1</div>';
    	                        }
                        echo '</td>';

                        echo '<td>';
                    	    if($stud_gwa>=0 && $stud_gwa<75){
    	                        echo '<div align="left" style="color:red">Failure</div>';
                            	}
    	                    if($stud_gwa>=75 && $stud_gwa<77){
    	                        echo '<div align="left" style="color:blue">Passing</div>';
    	                        }
                            if($stud_gwa>=77 && $stud_gwa<80){
    	                        echo '<div align="left" style="color:blue">Satisfactory</div>';
    	                        }
                            if($stud_gwa>=80 && $stud_gwa<83){
    	                        echo '<div align="left" style="color:blue">Fair</div>';
    	                        }
                            if($stud_gwa>=83 && $stud_gwa<86){
    	                        echo '<div align="left" style="color:blue">Good</div>';
    	                        }
                            if($stud_gwa>=86 && $stud_gwa<89){
    	                        echo '<div align="left" style="color:blue">Good</div>';
    	                        }
                            if($stud_gwa>=89 && $stud_gwa<92){
    	                        echo '<div align="left" style="color:blue">Very Good</div>';
    	                        }
                            if($stud_gwa>=92 && $stud_gwa<95){
    	                        echo '<div align="left" style="color:blue">Very Good</div>';
    	                        }
                            if($stud_gwa>=95 && $stud_gwa<98){
    	                        echo '<div align="left" style="color:blue">Excellent</div>';
    	                        }
                            if($stud_gwa>=98 && $stud_gwa<100){
    	                        echo '<div align="left" style="color:blue">Excellent</div>';
    	                        }
                         echo '</td>';
						  	echo '<td><div align="center"><a rel="facebox" href="editgrades.php?id='.$row['id'].'" title="Click To Edit">Edit</a></div></td>';
						  //	echo '</tr>';
						}
			?>


  </tr>
  <?php
  }
  ?>

       </tr>
</table>

<div>

<br>
        <center><table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" height="200" valign="middle"><div align="center">
            <a rel="facebox" href="editgrdaes.php"><input type="submit" value="Back" class="button"></a><br><br></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br style="clear: left">
  </div>