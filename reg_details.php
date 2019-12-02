
<?php
define('connector',include ('database connector.php'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/logstyle.css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script>
$(document).ready(function() {
 $('tr:odd').addClass('alt');   
});

</script>
<script>
	function goBack()
	{
	var page;
	page = document.referrer
	self.location = page;
	}
	</script>
<style type="text/css" >
tr{
	background-color:#FFF;
}
</style>


</head>

<body>
<div id="big_div" align="center">
  <div class="body_div" align="center"></div>
  <div  id="textlogo"> </div>
  <div class="image_div" ></div>
  <div class="footer"><a href="http://facebook.com/horllaysco"><img src="img/fb.gif"alt="twitter page" width="50" height="42" class="fb" longdesc="http://twitter.com/horllaysco" /></a></div>
  <a href="http://twitter.com/horllaysco"><img src="img/twitterl.gif"alt="twitter page" width="50" height="42" class="twitter" longdesc="http://twitter.com/horllaysco" /></a>
</div>
  <div class="ret" > 
  <?php

if (isset($_GET['matric']))
{
$matric1 = 	$_GET['matric'];
data_call($dbconnect,$matric1);
}
else {
header("location:voter_registration.php");
}
?><?php
function data_call($dbconnect,$matric1)
{
global $faculty;
connector;	
 $form = array("Matric No","First Name", "Last Name","Year Of Birth", "Month Of Birth", "Date Of Birth","Faculty", "Sex", "Password", "Department" ) ; 
$selectdb = mysql_select_db('laspotech_e_election',$dbconnect);
$sql = "SELECT *
FROM `reg_student`
WHERE `MATRIC_N0` = $matric1" ; 
$query = mysql_query($sql,$dbconnect);

	
while ($row = mysql_fetch_assoc($query)){
$matric = $row['MATRIC_N0'];
$f_name = $row['F_NAME'];
$l_name = $row['L_NAME'];
$yob = $row['YOB'];
$mob = $row['MOB'];
$dob= $row['DOB'];
$faculty = $row['FACULTY_ID'];
$sex = $row['sex'];  
$password = $row['password'];
$dept = $row['DEPT_ID'];
// echo  each array data individually
if ($row['FACULTY_ID'] == 1){
$faculty = "SCHOOL OF TECHNOOLOGY HND"	;	
}
else{
$faculty = "SCHOOL OF TECHNOOLOGY ND";	
}

}

$sql2 = "SELECT *
FROM `departments`
WHERE `DEPT_ID` = $dept" ; 
$query2 = mysql_query($sql2,$dbconnect);

while($row2 = mysql_fetch_assoc($query2))
{
$dept2 = $row2['DEPARTMENT'];	
}


$value = array( $matric,$f_name,$l_name,$yob,$mob,$dob,$faculty,$sex,$password,$dept2);  //storing the data value in visible array
echo '<table class = "info_call">';
for ($i=0; $i<=9; $i++){
echo "<tr>";
echo "<td>"."<b>".$form[$i]."</b>".":      "."</td>"."<td>".$value[$i]."</br>"."</td>";

echo "</tr>";
}


/*print "<table border = 1>\n";
//get field names
print "<tr>\n";
while ($field = mysql_fetch_field($query)){
print " <th>$field->name</th>\n";
} // end while
print "</tr>\n\n";

} // end foreach
print "</tr>\n\n";
}// end while
print "</table>\n";

  */
  
  }?> 
 
    
</div>

</div>
<div class="ret2">

 <?php
 /*
<form action="" method="POST">

<table width="200" border="1">
<tr>
<td>Department:</td>
<td><select name="deptbox" id="select"> 
<option value="" selected="selected">choose your department</option>
       
global $faculty;	   
$selectdb = mysql_select_db('laspotech_e_election',$dbconnect);
$query = "SELECT *
FROM `$faculty` ";
$result = mysql_query($query,$dbconnect);
while ($dept = mysql_fetch_assoc($result)){
$department	= $dept['DEPARTMENT'];
echo "<option value=".$department.">".$department."</option>";
}


	
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" id="button" value="Submit" /></td>
    </tr>
  </table>
  </form>
  */
?>
    <?php 

  /*
if (isset($_POST['deptbox']))
{
	$deptbox =  mysql_real_escape_string($_POST['deptbox']);
	print $deptbox;
}

*/
?>
<?php
$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("evotingdb", $connect);
$sql2 = "SELECT * FROM `evotingdb`.`votes`  WHERE `matric_no` = '$matric1'"; 
$query = mysql_query($sql2,$connect);
$num_rows = mysql_num_rows($query);
if ($num_rows > 0)
{
	$type = 'already';
$location = 'location:error.php?matric='.$matric1.'&'.'errrorType='.$type;	
}
else{
	$location = 'location:voting.php?matric='.$matric1;
}
?>
<?php
if (isset($_POST['cont']))
{
	
session_start();
$_SESSION['logged'] = 'logged';	
	header($location);
}
?>
<div class="nav">


<form name="" method="post" action="">
  <input name="cont" type="submit" class = "cont" value="continue"/>
  <input type="button" name="back" value="previous" onClick="return goBack()" class="nav"/>

  </form></div>
</div>
</body>
</html>