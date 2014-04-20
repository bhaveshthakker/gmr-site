<?php
require_once('session_initialize.php'); 
//setcookie('fbs_'.$facebook->getAppId(), '', time()-100, '/', 'getmereferred.com');
unset($_SESSION['username']);
session_destroy();
header('location:index.php');
?>