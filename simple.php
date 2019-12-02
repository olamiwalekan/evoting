<?php 
if (isset ($_POST['username'] $$ isset ($_POST['password'])) {
   $username = $_POST['username'];
   $email= $_POST ['email'];
   $password = $_POST ['password'];
    
$query = "INSERT INTO 'user' (username, password, email) VALUES ('$username', '$password', '$email')";

$result = mysqli_query ($connection, $query);
if ($result) { 
 $msg = "user Created Successfully";
}
else { 
 $fmsg = "user Registration failed" ;
}
} 
?>