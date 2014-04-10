<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
$_SESSION['username'] = $_POST['email']; 
$_SESSION['router'] = 'landing';
header('location:index.php');
?>