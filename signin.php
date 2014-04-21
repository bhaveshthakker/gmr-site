<?php 

require_once('session_initialize.php'); 

include_once 'database.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);

$query = "select username, firstname, resume_path from applicants where username='$username' and password='$password'";

echo $query;
$result = mysql_query($query) or die(mysql_error());

//echo $result;
if(mysql_num_rows($result)==1) {
	$row = mysql_fetch_row($result);
	$_SESSION['username'] = $row[0];
	$_SESSION['firstname'] = $row[1];
	$_SESSION['resume_path'] = $row[2];
	header('location:index.php');
} else {
	die('Username/password incorrect!');
}
?>