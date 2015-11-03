<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);


 $xyz = dirname(__FILE__) . "/../db.php";
require $xyz;

$rows= $database-> Login($username,$password);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session

$adm = $database->is_admin($username);
if ($adm)
{
  
    $_SESSION['is_admin'] = $adm;
}
header("location:/vagtplan.php"); // Redirecting To Other Page
} else {
$error = "Bruger eller Password er forkert";
}

}
}
?>