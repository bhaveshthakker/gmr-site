<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
require_once 'database.php';
require_once 'validation.php';
$fname = test_input($_POST['firstname']);
/*if(!isset($fname) || empty($fname)) {
	$error = $error."First name is required</br>";
}
elseif(!sanity_check($fname,'string',30)) {
	$error = $error."Enter name upto 30 characters</br>";	
}*/
$lname = test_input($_POST['lastname']);
/*if(!isset($lname) || empty($lname)) {
	$error = $error."last name is required</br>";
}*/
$email = test_input($_POST['email']);
/*if(!isset($email) || empty($email)) {
	$error = $error."Email is required</br>";
} elseif(!check_email($email)){
	$error = $error."Please enter valid email address</br>";
}*/
$password = test_input($_POST['password']);
/*if(!isset($password)) {
	$error = $error."Password is required</br>";
}*/
//if(empty($error)) {
$_SESSION['username'] = $_POST['email']; 
$query = "insert into applicants (firstname,lastname,email,password) values(".
	"'$fname','$lname','$email','$password')";
echo $query;
$result = mysql_query($query);
echo $result;
//if($result) {
	$_SESSION['router'] = 'landing';
	header('location:index.php');
//}else {
//	$_SESSION['error'] = $error;
//	$_SESSION['router'] = 'anonymousError';
//	header('location:index.php?sub=e');
//}
?>