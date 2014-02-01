<?php 
ob_start();
session_start();
session_destroy();
$_SESSION['user']="";
$_SESSION['pass']="";
header("Location:login.php?Msg=Log+Out+Successully");
?>
