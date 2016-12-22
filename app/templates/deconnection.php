<?php

session_start();
//delete the data that help to identify the user
unset($_SESSION['user']); 
header("Location: home.php");

//setcookie('remember_me', "jqfgjklbjhkdrjgiokj", time() + 3600, "/");

/*
http://localhost/site/password-recovery?token=qjfskgkf&email=son@email.com
*/
?>