<?php

session_start();

session_destroy();
unset($_SESSION['user_id']);
$_SESSION['logged_in'] = false;

header("Location: login.php");
exit();


?>