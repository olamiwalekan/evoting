<?php
require_once 'config.php';

$firstname = $firstname = $email = $username = $password = $confirm_password = "";
$firstname_err = $firstname_err = $email_err = $username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
// STEP 1 
    If (empty(trim($_POST['firstname'])))
    {
        $firstname_err = "Please input the firstname";
    }
    else {
        $sql = "SELECT id FROM users WHERE firstname = ?";
    }
    if ($stmt = mysqli_prepare($link , $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_firstname );
             $param_firstname = trim($_POST["firstname"]);
                if (mysqli_stmt_execute($stmt)) {
                    mysqli_stmt_store_result($stmt);
                }
        }
//STEP 2 
    if (empty(trim($_POST['surname']== "POST"))){
        $username_err = "please enter your surname";
    }
    else {
        $sql = "SELECT  id  FROM users WHERE surname = ?";
    }
    if ($stmt = mysqli_prepare($link, $sql)) { 
        mysqli_stmt_bind_param($stmt, "s", $param_surname);
        $param_surname = trim($_POST["surname"]);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
        }
    }
//STEP 3
    if (empty(trim($_POST['email']))) {
        $email_err = "Please enter your password";
    }
    else {
        $sqli = "SELECT id  FROM users WHERE email = ?";
    }
    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt,"s", $param_email);
        $param_email = trim($_POST["email"]);
        if (mysqli_stmt_execute($stmt)) { 
            mysqli_stmt_store_result($stmt); 
        }
    }
    // STEP 4
    if (empty(trim($_POST['username']))) {
        $username_err = "please input your username";
    }
    else {
        $sql = "SELECT id FROM users WHERE username = ?";
    }
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param ($stmt, "s", $param_username);
        $param_username = trim($_POST["username"]);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result ($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1 ) {
                $username_err = "This username is already taken"; 
            }
            else {
                $username = trim($_POST["username"]);
            }
        }
        else {
            echo "OOps!.Something went wrong, please try again later";
        }
    }
    mysqli_stmt_close($stmt);


 // Validate password
 if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password.";     
} elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have atleast 6 characters.";
} else{
    $password = trim($_POST['password']);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = 'Please confirm password.';     
} else{
    $confirm_password = trim($_POST['confirm_password']);
    if($password != $confirm_password){
        $confirm_password_err = 'Password did not match.';
    }
}

// Check input errors before inserting in database
if(empty($firstname_err) && empty($surname_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
    
    // Prepare an insert statement
    $sql = "INSERT INTO users (firstname, surname, username, password) VALUES (?, ?, ?, ?)";
     
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss",  $param_firstname, $param_surname, $param_email, $param_username, $param_password);
        
        // Set parameters
        $param_firstname = $firstname;
        $param_surname = $surname;
        $param_email = $email;
        $param_username = $username;
        $param_password = $password;
        // Attempt to execute the prepared statement
       
        if(mysqli_stmt_execute($stmt)){
            // Redirect to login page
            header("location: login.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 50px;
    width:40%;
    margin: 0px 30%;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>

<form style="border:1px solid #ccc"  action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="surname"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="surname" required>

    <label for="firstname"><b>Firstname</b></label>
    <input type="text" placeholder="Enter Firstname" name="firstname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password"  required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password"  required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>
