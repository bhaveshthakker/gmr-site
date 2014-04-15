<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
require_once 'database.php';
require_once 'validation.php';
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
$query = "insert into applicant (firstname,lastname,username,password) values(".
	"'$fname','$lname','$email','$password')";
echo $query;
$result = mysql_query($query)  or die(mysql_error());
echo $result;
if($result) { //User created go and create session variable
	$_SESSION['username'] = $_POST['a_email'];
	header('location:home');
}else {
	header('location:home?sub=e');
}
?>