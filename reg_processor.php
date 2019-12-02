
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php

include("database connector.php");
?>
</head>

<body>
<?php
if( !isset($_POST['matric_no']) || !isset($_POST['f_name']) || !isset($_POST['l_name']) || !isset($_POST['pass']) || !isset($_POST['sex']) ||
!isset($_POST['YOB']) || !isset($_POST['MOB']) || !isset($_POST['DOB']) || !isset($_POST['faculty']) || !isset($_POST['autodept']) || is_nan($_POST['matric_no']) )
{
	header("location:voter_registration.php?empty='wee'");
}
else{
$matric_no = mysql_real_escape_string($_POST['matric_no']);
$f_name = mysql_real_escape_string($_POST['f_name']);
$l_name = mysql_real_escape_string($_POST['l_name']);
$pass = mysql_real_escape_string($_POST['pass']);
$sex = mysql_real_escape_string($_POST['sex']);
$YOB = mysql_real_escape_string($_POST['YOB']);
$MOB = mysql_real_escape_string($_POST['MOB']);
$DOB = mysql_real_escape_string($_POST['DOB']);
$faculty = mysql_real_escape_string($_POST['faculty']);
$dept = mysql_real_escape_string($_POST['autodept']);

$selectdb = mysql_select_db('evotingdb',$dbconnect);
$sql = "SELECT * FROM `reg_student` WHERE `MATRIC_N0` = '$matric_no' LIMIT 1 "; 
$query = mysql_query($sql,$dbconnect);
$num_rows = mysql_num_rows($query);

$sql2 = "SELECT count(`id`)FROM `demo_eligible` WHERE `MATRIC_NO` = '$matric_no'";
$query = mysql_query($sql2,$dbconnect);
while($result = mysql_fetch_array($query)){
$elig = $result[0];
}
if ($num_rows>0)
{
	header("location:voter_registration.php?matric=$matric_no");
echo "<b>"."YOU have REGISTERED BEFORE"."</b>";
}
else if($elig == 0){
	header("location:voter_registration.php?error=2");
}
else {
echo "</br>"."<b>succesfull</b>";
$query = "INSERT INTO `reg_student`(`MATRIC_N0`, `F_NAME`, `L_NAME`, `YOB`, `MOB`, `DOB`, `FACULTY_ID`, `sex`, `password`, `DEPT_ID`) VALUES ('$matric_no', '$f_name', '$l_name', '$YOB', '$MOB', '$DOB', '$faculty', '$sex', '$pass', '$dept')";

$result = mysql_query($query,$dbconnect);
if (!$result)
{
echo "data input failed";
die(mysql_error());
}
else
{
	echo "successful";
	header('location:reg_details.php?matric='.$matric_no);	
}
mysql_close($dbconnect);

}
}
?>
</body>
</html>