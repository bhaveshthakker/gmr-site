<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
} 
?>
<!DOCTYPE HTML>
<html lang="en">
<?php require_once 'scripts.php'; ?>    
<body>
<?php 
	require_once 'header.php';

	 if(isset($_SESSION['username']) && $_SESSION['username']!='') { //user session is active
	  	require_once 'landing.php';   
	  	//echo '<br>'.'session exist'.$_SESSION['username'];
	} else { //user session is not active --go anonymous
	  	require_once 'anonymous.php'; 
	  	//echo '<br>'.'session not exist'.$_SESSION['username'];
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
