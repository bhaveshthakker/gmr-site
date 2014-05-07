<?php
require_once('session_initialize.php'); 
require_once('database.php');
require_once('validation.php');

$password1 = test_input($_POST['password1']);
$salt = 'e8rfdvfgh689kjjkooi';
$password=sha1($password1);

/*echo $_SESSION['temp_username'];*/
$temp_username = $_SESSION['temp_username'];

$query = "update applicants set password = '$password' where username = '$temp_username'";
/*echo $query;*/
$result = mysql_query($query)  or $db_error = mysql_errno();

if(isset($db_error)) {
	$_SESSION['alert-message'] = "mysql_".$db_error."-15";
} else {
	$query = "select username,firstname, resume_path, company from applicants where username='$temp_username'";

	$result = mysql_query($query) or  die("Error on checking FB user"+mysql_error());
    //user already registerred using facebook 
    // Go and create session
	if(mysql_num_rows($result)==1) { 
		$row = mysql_fetch_row($result);
		$_SESSION['username'] = $row[0];
		$_SESSION['firstname'] = $row[1];
		$_SESSION['resume_path'] = $row[2];
		
		if(isset($row[3]))
			$_SESSION['company'] = $row[3];
		else
			$_SESSION['company'] = "";
	}
	unset($_SESSION['temp_username']);
	unset($_SESSION['temp_firstname']);
	$_SESSION['alert-message'] = "PASSWORD_SUCCESSFULLY_CHANGED-5";
}
header('location:index.php');
/*echo $result;*/
/*
if($result) { //User created go and create session variable
	$isMailSent = phpMailerSend($activation_key, $_POST['a_email'], $fname, $lname);
	if($isMailSent) {
		$_SESSION['alert-message'] = "ACTIVATION_SENT-15";
		header('location:index.php');
	}
}else {
	header('location:index.php?sub=e');
}*/

?>