<?php
session_start();
session_unset($_SESSION['username']);
session_unset($_SESSION_['password']);

header("location:login.php");
?>