<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');
require_once('php_mailer.php');
$email = $_POST['forgot_password_email'];
$salt = 'abvbhghg143gjhghjg143gfhg';
$activation_key = sha1($email.$salt);

$query = "update applicants set activation_key = '$activation_key' where username = '$email'";
echo $query;
$result = mysql_query($query)  or $db_error = mysql_errno();
if(isset($db_error)) {
	$_SESSION['alert-message'] = "mysql_".$db_error."-10";
}
//echo $result;

if($result) { //User created go and create session variable
	$subject = "No worries, Reset your password in just single click!";
	$url = '/forgot_password.php?key=';
	$isMailSent = phpMailerSend($url, $activation_key, $email, 'User','forgotPasswordMailTemplate.html', $subject);
	if($isMailSent) {
		$_SESSION['alert-message'] = "FORGOT_PASSWORD_MAIL_SENT-15";
		header('location:index.php');
	}
} else {
	//header('location:index.php?sub=e');
}
?>