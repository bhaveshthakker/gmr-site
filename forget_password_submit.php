<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');
require_once('PHPMailer/class.phpmailer.php');
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
	$isMailSent = phpMailerSend($activation_key, $email, $fname, $lname);
	if($isMailSent) {
		$_SESSION['alert-message'] = "FORGOT_PASSWORD_MAIL_SENT-15";
		header('location:index.php');
	}
} else {
	#header('location:index.php?sub=e');
}
function phpMailerSend($act_key, $email_addr, $firstname, $lastname) {

//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	$url = $_SERVER['HTTP_HOST'].'/forgot_password.php?key=';
	$mail             = new PHPMailer();

	$body             = file_get_contents('forgotPasswordMailTemplate.html');
	$body             = eregi_replace("[\]",'',$body);
	$body 			  = str_replace('%ACT_URL%', $url.$act_key, $body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.getmereferred.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.getmereferred.com"; // sets the SMTP server
$mail->Port       = 25	;                    // set the SMTP port for the GMAIL server
$mail->Username   = "mail@getmereferred.com"; // SMTP account username
$mail->Password   = "Admin123!";        // SMTP account password

$mail->SetFrom('mail@getmereferred.com', 'Get Me Referred');

$mail->AddReplyTo("mail@getmereferred.com","GMR Admin");

$mail->Subject    = "No worries, now just 1 step away from resetting your password";

$mail->AltBody    = "We have sent you the activation link"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAddress($email_addr, $firstname.' '.$lastname);

//$mail->AddAttachment("img/portrait-3.jpg");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
	$_SESSION['alert-message'] = $mail->ErrorInfo;
	return false;
} else {
	echo "Message sent!";
	return true;
}

}
?>