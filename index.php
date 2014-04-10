<!DOCTYPE HTML>
<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
} 
$router = $_SESSION['router'] = isset($_SESSION['router'])? $_SESSION['router']:'anonymous';
?>
<html lang="en">
<?php require 'header.php'; ?>    
<body>
  <?php require 'navbar.php'; ?>
  <!-- ******************** HeaderWrap ********************-->
  <?php
  if($router == 'anonymous') {
    if(session_status() == PHP_SESSION_ACTIVE) {
     session_destroy();
   }  
   require 'anonymous.php'; 
  } 
  elseif($router == 'landing') {
    require 'landing.php';
  } 

?>
<!--******************** Portfolio Section ********************-->
<?php require 'portfolio.php'; ?>
<!--******************** Services Section ********************-->
<?php require 'services.php'; ?>
<!--******************** Testimonials Section ********************-->
<?php require 'testimonials.php'; ?>
<!--******************** News Section ********************-->
<?php require 'news.php'; ?>
<!--******************** Team Section ********************-->
<?php require 'team.php'; ?>
<!--******************** Contact Section ********************-->
<?php require 'contact.php'; ?>
<?php require 'footer.php'; ?>
</body>
</html>
