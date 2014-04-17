<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');
require_once('PHPMailer/class.phpmailer.php');
$fname = test_input($_POST['a_firstname']);
/*if(!isset($fname) || empty($fname)) {
	$error = $error."First name is required</br>";
}
elseif(!sanity_check($fname,'string',30)) {
	$error = $error."Enter name upto 30 characters</br>";	
}*/
$lname = test_input($_POST['a_lastname']);
/*if(!isset($lname) || empty($lname)) {
	$error = $error."last name is required</br>";
}*/
$email = test_input($_POST['a_email']);
/*if(!isset($email) || empty($email)) {
	$error = $error."Email is required</br>";
} elseif(!check_email($email)){
	$error = $error."Please enter valid email address</br>";
}*/
$password = test_input($_POST['a_password']);
/*if(!isset($password)) {
	$error = $error."Password is required</br>";
}*/
//if(empty($error)) {
$password=sha1($password);
$ip = getRealIpAddr();
$salt = 'e8rfdvfgh689kjjkooi';
	$activation_key = sha1($email.$salt);

$query = "insert into applicants (firstname,lastname,username,password,ip_address, status_type, activation_key) values(".
	"'$fname','$lname','$email','$password','$ip', 'PENDING_REGISTRATION','$activation_key')";
//echo $query;
$result = mysql_query($query)  or die(mysql_error());
//echo $result;

if($result) { //User created go and create session variable
	$_SESSION['username'] = $_POST['a_email'];
	$_SESSION['firstname'] = $fname;
	$_SESSION['lastname'] = $lname;
	phpMailerSend($activation_key);
	header('location:index.php');
}else {
	header('location:index.php?sub=e');
}
function getRealIpAddr(){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //check if ip from share internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //to check if ip is passed from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}
function phpMailerSend($act_key) {

//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	$url = $_SERVER['HTTP_HOST'].'/activate_user.php?key=';
	$mail             = new PHPMailer();

	$body             = file_get_contents('mailTemplate.html');
	$body             = eregi_replace("[\]",'',$body);
	$body 			  = str_replace('%FIRST_NAME%', $_SESSION['firstname'], $body);
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

$mail->SetFrom('malav@getmereferred.com', 'Get Me Referred');

$mail->AddReplyTo("malav42@gmail.com","Malav Shah");

$mail->Subject    = "Thanks for registering, just 1 more step left from awesomeness";

$mail->AltBody    = "We will soon come here with the activation link, once we do that, you activate and register yoursel, till then, THANK YOU"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $_SESSION['username'];
$mail->AddAddress($address, $_SESSION['firstname'].' '.$_SESSION['lastname']);

//$mail->AddAttachment("img/portrait-3.jpg");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
	echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "Message sent!";
}

}
?>