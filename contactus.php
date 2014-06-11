<?php 
require_once('session_initialize.php'); 
require_once('php_mailer.php');

$subject  = "Feedback/Alert!";
$email = "";
$response;
if( isset($_POST['captcha']) && isset($_SESSION['captcha'])) {
	if( $_POST['captcha'] != ($_SESSION['captcha'][0]+$_SESSION['captcha'][1]) ) {
    die('Invalid captcha answer');  // client does not have javascript enabled
}
$_SESSION['captcha'] = array( mt_rand(0,9), mt_rand(1, 9) );
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
}
?>
