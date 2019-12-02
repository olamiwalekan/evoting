<?php
session_start();
$_SESSION['dept_id'] = '12';
include ('../database connector.php');
$location = '../completed.php?type=admin';

if(!isset($_GET['show_toggle'])  || $_GET['show_toggle'] == ''){
	
	header('location:index.php?page=opt');
}
	$show_toggle = $_GET['show_toggle'];
	
	
$connect = mysql_connect("localhost", "root", "");
$db = mysql_select_db("evotingdb", $connect);
if(!$connect)
{
die("unable to connect");
}
else{
$sql = "UPDATE `evotingdb`.`options` SET `showToggle` = '$show_toggle' WHERE `options`.`optionname` = 'endtime' AND `options`.`value` = '1444897860'  LIMIT 1;";
$query = mysql_query($sql,$connect);
if ($query){
	header('location:'.$location);
}
else {
	die(mysql_error());
}
}

$query1 = "SELECT *
FROM `options`
WHERE `optionname` LIKE 'endtime'
ORDER BY `options`.`optionname` ASC
LIMIT 0 , 30";
$query2 = mysql_query($query1, $dbconnect);
if (!$query2)
{   die(mysql_error());
}
while($rowed = mysql_fetch_array($query2))
{ 
 $res = $rowed['showToggle'];
}
echo $res;


?>