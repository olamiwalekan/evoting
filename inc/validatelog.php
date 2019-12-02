<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><br />
<?php

include('database connector.php');
?>
</head>

<body>

<?php
echo "olaysco";
if (isset($_GET['matric'])){
$matric_no = $_GET['matric'];
$selectdb = mysql_select_db('laspotech_e_election',$dbconnect);
$sql = "SELECT * FROM `reg_student` WHERE `MATRIC_N0` = '$matric_no' LIMIT 1 "; 
$query = mysql_query($sql,$dbconnect);
$num_rows = mysql_num_rows($query);

if ($num_rows<0)
{
echo "<b>"."matric no not registered"."</b>";
}
}
?>
</body>
</html>