<?php 

require_once('session_initialize.php'); 

include_once 'database.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$query = "select username from applicant where username='$username' and password='$password'";

echo $query;
$result = mysql_query($query) or die(mysql_error());

//echo $result;
if(mysql_num_rows($result)==1) {
	$_SESSION['username'] = $username;
	header('location:home');
} else {
	die('Username/password incorrect!');
}
?>