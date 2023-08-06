<script language="javascript">
function Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25";
  var content_vlue = document.getElementById("print_content").innerHTML;

  var docprint=window.open("","",disp_setting);
   docprint.document.open();
   docprint.document.write('<html><head><title>Class</title>');
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
    	        $course=$_POST['course'];
				$subject=$_POST['subject'];
				$level=$_POST['level'];
				$section=$_POST['section'];
?>

<div id="print_content">
<h2>Course: <?php echo $course;?></h2>
<font size="3">Section: <?php echo $section;?></font><br>
<font size="3">Subject: <?php echo $subject;?></font><br>
<font size="3">Year Level: <?php echo $level;?></font>

<table cellpadding="5" cellspacing="0" id="resultTable" border="1">
  <tr>
    <th style="border-left: 1px solid #FAEF92" width="86" rowspan="2">ID #</th>
    <th width="10" rowspan="2">Name</th>
    <th width="10" rowspan="2">Prelim</th>
    <th width="10" rowspan="2">Midterm</th>
    <th width="10" rowspan="2">Prefinal</th>
    <th width="10" rowspan="2">Final</th>
    <th width="10" rowspan="2">GWA</th>
    <th width="10" rowspan="2">Numeric Value</th>
    <th width="10" rowspan="2">Remarks</th>
    <!--<th width="17" rowspan="2">Action</th> -->
  </tr>
   <tr>

<?php
include('../connect.php');
$teacheridnum=$_SESSION['SESS_FIRST_NAME'];
  $result = $link->query("SELECT student.idnumber, student.fname, student.mname, student.lname, grade.idnum,grade.prelim, grade.midterm, grade.midterm, grade.prefinal, grade.final, grade.gwa, ts.*
FROM student LEFT JOIN grade ON student.idnumber=grade.idnum
LEFT JOIN studentsubject ss ON ss.id=grade.subject
LEFT JOIN teachersubject ts ON ts.id=ss.subjectid
where ts.teacher='$teacheridnum' AND ts.subject='$subject'");
    while($row = $result->fetch_array())
	{
           $stud_gwa= $row['gwa'];
	  echo '<tr>';
         echo '<td style="border-left: 1px solid #FAEF92">'.$row['idnumber'].'</td>';
         echo '<td><div align="left">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</div></td>';
         echo '<td><div align="left">'.$row['prelim'].'</div></td>';
         echo '<td><div align="left">'.$row['midterm'].'</div></td>';
         echo '<td><div align="left">'.$row['prefinal'].'</div></td>';
         echo '<td><div align="left">'.$row['final'].'</div></td>';
         echo '<td><div align="left">'.$row['gwa'].'</div></td>';
        // echo '<td><div align="left">'.$row['gwa'].'</div></td>';
        // echo '<td><div align="left">'.$row['gwa'].'</div></td>';
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
      echo '</tr>';
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
