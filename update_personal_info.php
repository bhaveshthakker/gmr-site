<?php
require_once('session_initialize.php');
require_once('database.php');

$fullname = $_SESSION['firstname'] = $_POST["fullname"];
$dob = $_SESSION["dob"] = $_POST["dob"];
$mobile = $_SESSION["contact_no"] = $_POST["contact_no"];
$current_city = $_SESSION['current_city'] = $_POST["city"];
$pincode = $_SESSION['pincode'] = $_POST["pincode"];

$username = $_SESSION['username'];

$query = "update applicants set firstname='$fullname', dob=STR_TO_DATE('$dob', '%d/%m/%Y'), mobile='$mobile',".

"current_city='$current_city', pincode='$pincode' where username='$username'";
       echo $query;
$result = mysql_query($query);
if($result) {
    die( 'Success! Information Updated.');
} else {
    die('Database update failed'.mysql_error());
}
?>