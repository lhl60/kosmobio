<?php

include('php/login/login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: filmbasen_menu.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login til filmbasen</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h2>For Adgang til Filmbasen</h2>
<h2> Kun for Aktive frivillige i Kosmorama-Skælskør</h2>
<div id="login">
<h2>Login</h2>
<form  method="post" action="">
<label>Bruger :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>