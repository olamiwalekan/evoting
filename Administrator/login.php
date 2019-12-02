<?php
include('delete.class.php');
session_start();
?>
<?php
$error= '';
if( isset($_GET['admin_user']) && isset($_GET['admin_pass']) ){
		if($_GET['admin_user'] == '' || $_GET['admin_pass'] == ''){
		$error = 'make sure all feilds all filled'	;
		}
	
	else{
		$user = $_GET['admin_user'];
		$pass = $_GET['admin_pass'];
		$check = new delete;
		$check->table('evotingdb');
		$query = "SELECT count(`id`) from `admin_veriy` where `username`= '$user' AND `password` ='$pass'";
		$check->execute($query );
		while($check->valid())
		{
		$me = $check->current();
		$counted = $me[0];
		$check->next();
		}
		if($counted >0){
		$_SESSION['user'] ='vote_admin';
		header('location:index.php');
		}
		else{
		$error = 'invalid username and password';	
		}
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style>
html{
	width:100%;
	height:100%;
}
body{
	width:50%;
	height:50%;
	margin:auto;
	background-color:rgba(255,255,255,1);
}
#logbox{
	width:400px;
	height:250px;
	margin:auto;
	
	margin-top:25%;
	padding-top:30px;
	padding-left:30px;
	background-color:rgba(0,102,0,1);
	border-radius:5px;
	box-shadow:7px 7px 7px #CCC;
}
form{
	margin-top:30px;
	width:300px;
}
#logbox fieldset{
	margin:auto;
	border:0px;
}
#logbox fieldset label{
	color:rgba(255,255,255,1);
	font:"Courier New", Courier, monospace;
	font-weight:bolder;
}
#logbox fieldset input[type=text],input[type=password]{
	width:250px;
	height:25px;
	box-shadow:2px 2px 2px #666666;
	border-radius:4px;
	border:1px;
}
#logbox input[type=submit]{
	width:250px;
	height:30px;
	box-shadow:2px 2px 2px #666666;
	color:rgba(102,102,102,1);
	background-color:rgba(51,153,153,1);
	border:0px;
	margin-left:7px;
	border-radius:4px;
}	
#logbox input[type=submit]:hover{
	background-color:rgba(204,204,204,1);
}
</style>
<body>
<div id="logbox">
<form action="login.php" method="get">
<fieldset><label >ADAMINISTRATOR USERNAME  </label><input type="text" name="admin_user" /></fieldset>
<fieldset><label>ADAMINISTRATOR PASSWORD </label><input type="password" name="admin_pass" /></fieldset>
<input type="submit" />
<?PHP echo $error; ?>
</form>
</div>
</body>
</html>
