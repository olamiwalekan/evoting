<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']!='vote_admin'){
	header('location:login.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../js/jquery-1.10.2.min.js" ></script>
<?php
// connect to db server.
include('../database connector.php');
$page = '';
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
?>
<style>
@import url('admin.css'); 
</style>
</head>
<body>
<div id="wrapper">
<div id="header"><div style="margin-top:10px;"><span>ADMINISTRATOR PANEL</span></div>
</div>
<div id="content">
<div id="nav"><nav style="width:400px;"><a href="?page=post">POST |</a><a href="?page=aspirant">ASPIRANT |</a><a href="?page=eligible">ElIGIBLE VOTERS |</a><a href="?page=opt">OPTIONS |</a><a href="logout.php">OFF</a></nav></div>
<div id="main">
<?php
if($page == 'post'){
	include('post.php');
}
elseif($page == 'aspirant'){
	include('aspirant.php');
}
elseif($page == 'eligible'){
	include('eligible.php');
}
elseif($page == 'opt'){
	include('options.php');
}
elseif($page == ''){
	include('post.php');
}
?>
</div>
</div>
<div id="footer"></div>
</div>
</body>
</html>



