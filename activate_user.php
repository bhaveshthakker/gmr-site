<html>
<?php
require_once('session_initialize.php'); 
require_once('database.php');
include_once("analyticstracking.php");
$act_key = $_GET['key'];
/*echo "<br />comming here<br />";
echo $act_key;*/
$query = "select username, firstname, resume_path, company from applicants where activation_key = '$act_key'";
/*echo $query;*/
$result = mysql_query($query)  or die(mysql_error());
/*echo $result;*/
echo $result;
if(mysql_num_rows($result)==1) {
	$row = mysql_fetch_row($result);
		echo $row[0]."<br />";
	$query = "update applicants set status_type = 'REGISTERED' where username = '$row[0]'";
	echo $query;
	$result = mysql_query($query)  or die(mysql_error());
	$_SESSION['username'] = $row[0];
	$_SESSION['firstname'] = $row[1];
	$_SESSION['resume_path'] = $row[2];
	$_SESSION['company'] = $row[3];
	/*echo $_SESSION['username'];
	echo $_SESSION['firstname'];*/
	header('location:index.php');
} else {
	$_SESSION['alert-message'] = "WRONG_ACTIVATION_KEY-5";
	header('location:index.php');
}

?>

</html>