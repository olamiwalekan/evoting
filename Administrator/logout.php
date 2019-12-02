<?php
session_start();

$_SESSION['user'] = '';
if(isset($_SESSION)){
unset($_SESSION['user']);

header('location:../voter_registration.php');	
}
?>