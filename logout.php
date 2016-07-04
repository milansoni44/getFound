<?php 
session_start();
session_destroy();
session_start();
$_SESSION['logoutmessage'] = 'You are successfully Logged Out.';
header('Location:login.php');
die();


?>