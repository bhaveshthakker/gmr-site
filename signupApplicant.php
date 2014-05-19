<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');
require_once('php_mailer.php');

$fname = test_input($_POST['a_fullname']);
$email = test_input($_POST['a_email']);
$password = test_input($_POST['a_password']);
$password=sha1($password);
$ip = getRealIpAddr();
$salt = 'e8rfdvfgh689kjjkooi';
$activation_key = sha1($email.$salt);

$response=Array();

$query = "insert into applicants (firstname,username,password,ip_address, status_type, activation_key) values(".
	"'$fname','$email','$password','$ip', 'PENDING_REGISTRATION','$activation_key')";
$response['query'] = $query;
$result = mysql_query($query)  or $db_error = mysql_errno();
if(isset($db_error)) {
	$response['error'] = '1';
	$response['error_desc'] = "mysql_".$db_error."-15";
}
else {
	//echo $result;
	if($result) { //User created go and create session variable
		$subject  = "Thanks for registering with us!";
		$url = '/activate_user.php?key=';
		$isMailSent = phpMailerSend($url, $activation_key, $_POST['a_email'], $fname, 'mailTemplate.html', $subject);
		if($isMailSent) {
			$response['error'] = '0';
			$response['error_desc'] = "ACTIVATION_SENT-25";
			//header('location:index.php');
		} else {
			$response['error'] = '1';
			$response['error_desc'] = "Something went wrong. Please try again after some time.-15";
		}
	}else {
		$response['error'] = '1';
		$response['error_desc'] = "Something went wrong. Please try again after some time.-15";
		//header('location:index.php');
	}
}
echo json_encode($response);

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