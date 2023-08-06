<script language="javascript">
function Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25";
  var content_vlue = document.getElementById("print_content").innerHTML;

  var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<html><head><title>Grades</title>');
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
?>
<?php
include('../connect.php');
$id=$_SESSION['SESS_MEMBER_ID'];
$result = $link->query("SELECT * FROM student WHERE id='$id'");
		while ($row = $result->fetch_array()) {
				$course=$row['course'];
				$year=$row['yearlevel'];
				$section=$row['section'];
				$idnumber=$row['idnumber'];
                $name=$row['fname'].' '.$row['mname'].' '.$row['lname'];
			}
?>
<div id="print_content">
    <div>
       <h1><?php echo $name;?></h1>
    </div>
<table cellpadding="5" cellspacing="0" id="resultTable" border="1">
  <tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">Code</th>
    <th width="10" rowspan="2">SCHOOL YEAR</th>
    <th width="10" rowspan="2">SEMESTER</th>
    <th width="10" rowspan="2">TEACHER</th>
    <th width="10" rowspan="2">Unit</th>
    <th width="10" rowspan="2">PRELIM</th>
    <th width="10" rowspan="2">MIDTERM</th>
    <th width="10" rowspan="2">PREFINAL</th>
    <th width="10" rowspan="2">FINAL</th>
    <th width="10" rowspan="2">GWA</th>
    <th width="10" rowspan="2">NUMERIC GRADE</th>
	<th width="10" rowspan="2">Remarks</th>
    <!--<th width="17" rowspan="2">Action</th> -->
  </tr>

  <tr>
<?php
  $result = $link->query("SELECT * FROM studentsubject WHERE section='$section' AND level='$year' AND course='$course'");
while($row = mysql_fetch_array($result))
	{
  ?>
  <tr>
    <td style="border-left: 1px solid #FAEF92"><?php echo $row['subject']?></td>
          	<?php
          	$subject=$row['subject'];
          	$resultj = mysql_query("SELECT * FROM teachersubject WHERE subject='$subject' AND section='$section' AND level='$year' AND course='$course'");
          while($rowj = mysql_fetch_array($resultj))
          	{
          	$ttt=$rowj['teacher'];
          	}
          	?>
    	<td>
           <?php echo $row['sy'];?>
        </td>
    	<td>
           <?php echo $row['term'];?>
        </td>
	<td>
        	<?php
        	$results = mysql_query("SELECT * FROM teacher WHERE idnumber='$ttt'");
            $rows = mysql_fetch_array($results);
        	echo $rows['fname'].' '.$rows['lname'];
        	?>
	</td>

    <td>
          	<?php
          	$results = mysql_query("SELECT * FROM subject WHERE subject_id='$subject'");
          while($rows = mysql_fetch_array($results))
          	{
          	echo $rows['unit'];
          	}
          	?>
	</td>

			<?php
			$result = mysql_query("SELECT * FROM grade WHERE idnum='$idnumber' AND subject='$subject'");
					while($row = mysql_fetch_array($result))
						{
							//echo '<tr>';
                            $stud_gwa= $row['gwa'];
							echo '<td>'.$row['prelim'].'</td>';
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
						  	//echo '<td><div align="center"><a rel="facebox" href="editgrades.php?id='.$row['id'].'" title="Click To Edit">Edit</a></div></td>';
						  //	echo '</tr>';
						}
			?>


  </tr>
  <?php
  }
  ?>
       </tr>
</table>
</div>
<div>

<br>
        <center><table width="800" border="0">
          <tr>
            <td>&nbsp;</td>
            <td width="300" height="200" valign="middle"><div align="center">
            <!--<a href="javascript:Clickheretoprint()">Print</a>-->
             <input type="submit" value="Print" class="button" onclick="Clickheretoprint()"><input type="submit" value="Back" class="button" onclick="history.back()"></div><br><br></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <br style="clear: left">
  </div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
    Clickheretoprint();
});
</script>

