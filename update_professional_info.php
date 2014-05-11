<?php
require_once('session_initialize.php');
require_once('database.php');

$primary_skill = $_SESSION['primary_skill'] = $_POST["primary_skill"];
echo $_POST["secondary_skills_hidden"];
$secondary_skills = $_SESSION["secondary_skills"] = $_POST["secondary_skills_hidden"];
$experience = $_SESSION["experience"] = $_POST["experience"];
$current_company = $_SESSION['current_company'] = $_POST["current_company"];
$notice_period = $_SESSION['notice_period'] = $_POST["notice_period"];
$current_ctc = $_SESSION['current_ctc'] = $_POST["current_ctc"];

$username = $_SESSION['username'];
$query = "update applicants set primary_skill='$primary_skill', secondary_skills='$secondary_skills', 
experience = '$experience', current_company='$current_company', notice_period='$notice_period', 
current_ctc='$current_ctc'  where username='$username'";
    //$_SESSION['resume_path'] = $_SESSION['resume_path'] = $UploadDirectory.$NewFileName;
echo $query;
$result = mysql_query($query);
if($result) {
    #die( 'Success! Information Updated.');
} else {
    #die('Database update failed'.mysql_error());
}
?>