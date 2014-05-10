<?php 

require_once('session_initialize.php'); 
require_once('database.php');
require_once('set_session_data.php');

$username = $_POST['username'];
$password = sha1($_POST['password']);

$query = "select * from applicants where username='$username' and password='$password'";

echo $query;
$result = mysql_query($query) or die(mysql_error());
//echo $result;
if(mysql_num_rows($result)==1) {
	$row = mysql_fetch_assoc($result);
	setSessionData($row);
	header('location:index.php');
} else {
	header('location:index.php?login-failed=1#signin');
}
?>