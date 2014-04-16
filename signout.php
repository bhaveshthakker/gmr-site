<?php
require_once('session_initialize.php'); 
unset($_SESSION['username']);
session_destroy();
header('location:home.php');
?>