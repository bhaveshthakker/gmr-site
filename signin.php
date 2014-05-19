<?php 

require_once('session_initialize.php'); 
require_once('database.php');
require_once('set_session_data.php');

$response=array();
$username = $_POST['username'];
$password = sha1($_POST['password']);

$query = "select * from applicants where username='$username' and password='$password'";

$response['query'] = $query;

$result = mysql_query($query) or die(mysql_error());
$response['result'] = '$result';
if(mysql_num_rows($result)==1) {
	$row = mysql_fetch_assoc($result);
	setSessionData($row);
	$response['error'] = '0';
	$response['error_desc'] = 'Successfully signed in.';
	//header('location:index.php');
} else {
	$response['error'] = '1';
	$response['error_desc'] = 'Username or Password incorrect.-10';
	//header('location:index.php?login-failed=1#signin');
}
echo json_encode($response);
?>