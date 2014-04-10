<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
$_SESSION['username'] = ''; 
$_SESSION['router'] = 'anonymous';
header('location:index.php');
?>