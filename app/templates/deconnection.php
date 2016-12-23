<?php

//delete the data that help to identify the user
unset($_SESSION['user']); 
header("Location: ".BASE_URL);

//setcookie('remember_me', "jqfgjklbjhkdrjgiokj", time() + 3600, "/");

/*
http://localhost/site/password-recovery?token=qjfskgkf&email=son@email.com
*/
?>