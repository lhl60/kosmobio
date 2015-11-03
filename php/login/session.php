<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
      $xyz = dirname(__FILE__) . "/../db.php";
require $xyz;

$rows= $database->Validate_login($user_check);


// SQL Query To Fetch Complete Information Of User
if($rows==0){
header('Location: index.php'); // Redirecting To Home Page
}
$adm = $database->is_admin($user_check);
if ($adm)
{
    $_SESSION['is_admin'] = $adm;
}

?>