<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
} ?>
<!DOCTYPE HTML>
<?php
$router = $_SESSION['router'] = isset($_SESSION['router'])? $_SESSION['router']:'anonymous';
?>
<html lang="en">
<?php require_once 'header.php'; ?>    
<body>
  <?php require_once 'navbar.php';
  
  if($router == 'anonymousError') {  
   require_once 'anonymous.php'; 
  } 
  elseif($router == 'anonymous') {
    if(session_status() == PHP_SESSION_ACTIVE) {
     session_destroy();
   }  
   require_once 'anonymous.php'; 
  } 
  elseif($router == 'landing') {
    require_once 'landing.php';
  } 

?>
<!--******************** Portfolio Section ********************-->
<?php //require_once 'portfolio.php'; ?>
<!--******************** Services Section ********************-->
<?php //require_once 'services.php'; ?>
<!--******************** Testimonials Section ********************-->
<?php //require_once 'testimonials.php'; ?>
<!--******************** News Section ********************-->
<?php require_once 'news.php'; ?>
<!--******************** Team Section ********************-->
<?php require_once 'team.php'; ?>
<!--******************** Contact Section ********************-->
<?php require_once 'contact.php'; ?>
<?php require_once 'footer.php'; ?>
</body>
</html>
