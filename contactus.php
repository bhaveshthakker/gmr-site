<?php 
require_once('session_initialize.php'); 
require_once('php_mailer.php');

$subject  = "Feedback/Alert!";
$body = "Message From ".$_POST['your-email']."<br />".$_POST['message'];

$isMailSent = phpMailerManualSend("mail@getmereferred.com", "Feedback", $body, $subject);
if($isMailSent) {
	#$_SESSION['alert-message'] = "ACTIVATION_SENT-15";
	#header('location:index.php');
}
?>