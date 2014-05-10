<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');
require_once('php_mailer.php');

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
$result = mysql_query($query)  or $db_error = mysql_errno();
if(isset($db_error)) {
	$_SESSION['alert-message'] = "mysql_".$db_error."-15";
}
//echo $result;

if($result) { //User created go and create session variable
	$subject  = "Thanks for registering with us!";
	$url = '/activate_user.php?key=';
	$isMailSent = phpMailerSend($url, $activation_key, $_POST['a_email'], $fname, 'mailTemplate.html', $subject);
	if($isMailSent) {
		$_SESSION['alert-message'] = "ACTIVATION_SENT-15";
		header('location:index.php');
	}
}else {
	header('location:index.php');
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
?>