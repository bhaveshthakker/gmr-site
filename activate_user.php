<html>
<?php
require_once('session_initialize.php'); 
require_once('database.php');
include_once("analyticstracking.php");
$act_key = $_GET['key'];
/*echo "<br />comming here<br />";
echo $act_key;*/
$query = "select username, firstname from applicants where activation_key = '$act_key'";
/*echo $query;*/
$result = mysql_query($query)  or die(mysql_error());
/*echo $result;*/
//echo $result;
if(mysql_num_rows($result)==1) {
	$row = mysql_fetch_row($result);
	$_SESSION['username'] = $row[0];
	$_SESSION['firstname'] = $row[1];
	/*echo $_SESSION['username'];
	echo $_SESSION['firstname'];*/
	header('location:index.php');
} else {
	die('Username/password incorrect!');
}

?>

</html>