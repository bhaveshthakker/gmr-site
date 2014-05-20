<?php 
require_once('session_initialize.php'); 
require_once('php_mailer.php');

$subject  = "Feedback/Alert!";
$email = "";
if(isset($_SESSION['username']) && $_SESSION['username']!='')
	$email = $_SESSION['username'];
else 
	$email = $_POST['your-email'];
	
$body = "Message From ".$email."<br />".$_POST['message'];

$isMailSent = phpMailerManualSend("mail@getmereferred.com", "Feedback", $body, $subject);
if($isMailSent) {
	#$_SESSION['alert-message'] = "ACTIVATION_SENT-15";
	#header('location:index.php');
}
?>
