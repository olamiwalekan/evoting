<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include("database connector.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$_SESSION['voteformcheck'] = false;

?>
<?php

$logmatric = mysql_real_escape_string($_POST['logmatric']);
$logpass = mysql_real_escape_string($_POST['logpass']);

$matric1 = $logmatric; 

$selectdb = mysql_select_db('laspotech_e_election',$dbconnect);
$sql = "SELECT *
FROM `reg_student`
WHERE `MATRIC_N0` = $logmatric
AND `password` LIKE '$logpass'
LIMIT 0 , 30"; 
$query = mysql_query($sql,$dbconnect);

$num_rows = mysql_num_rows($query);
if ($num_rows>0)
{	
session_start();
$_SESSION['logged'] = true;
header('location:reg_details.php?matric='.$matric1);
}
else {
header('location:voter_registration.php?error=1');
}
?>


</body>
</html>