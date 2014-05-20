<html>
<?php
require_once('session_initialize.php'); 
require_once('database.php');
include_once("analyticstracking.php");
require_once('set_session_data.php');

$act_key = $_GET['key'];
/*echo "<br />comming here<br />";
echo $act_key;*/
$query = "select * from applicants where activation_key = '$act_key'";
/*echo $query;*/
$result = mysql_query($query)  or die(mysql_error());
/*echo $result;*/
echo $result;
if(mysql_num_rows($result)==1) {
/*<<<<<<< HEAD*/
	$row = mysql_fetch_assoc($result);
		echo $row["username"]."<br />";
	$useremail = $row['username'];
	$query = "update applicants set status_type = 'REGISTERED' where username = '$useremail'";
	echo $query;
	$result = mysql_query($query)  or die(mysql_error());
	setSessionData($row);
	header('location:index.php');
} else {
	$_SESSION['alert-message'] = "WRONG_ACTIVATION_KEY-5";
	header('location:index.php');
}

?>

</html>