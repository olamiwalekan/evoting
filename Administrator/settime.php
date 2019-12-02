<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php
// connect to db server.
include('../database connector.php');
?>
</head>

<body>
<?php
$selectdb = mysql_select_db('evotingdb',$dbconnect);
	
	

// create time for start
$starttime = mktime(mysql_real_escape_string($_POST['starthour']),mysql_real_escape_string($_POST['startmin']),0,mysql_real_escape_string($_POST['startmonth']),mysql_real_escape_string($_POST['startday']),mysql_real_escape_string($_POST['startyear']));
$sqlq = "UPDATE Options SET value = '".$starttime."' WHERE optionname = 'starttime'";
$sqlresult = mysql_query($sqlq,$dbconnect);
if (!$sqlresult) {
    die('Invalid query: ' . mysql_error());
}

// create time for end
$endtime = mktime(mysql_real_escape_string($_POST['endhour']),mysql_real_escape_string($_POST['endmin']),0,mysql_real_escape_string($_POST['endmonth']),mysql_real_escape_string($_POST['endday']),mysql_real_escape_string($_POST['endyear']));
$sqlq = "UPDATE Options SET value = '".$endtime."' WHERE optionname = 'endtime'";
$sqlresult = mysql_query($sqlq,$dbconnect);
if (!$sqlresult) {
    die('Invalid query: ' . mysql_error());
}
header("location:index.php");
?>
</body>
</html>