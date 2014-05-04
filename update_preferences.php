<?php
require_once('session_initialize.php');
require_once('database.php');
	$companies = $_POST["allSelectedCompanies"];
	$username = $_SESSION['username'];
	$query = "update applicants set company='$companies' where username='$username'";
    //$_SESSION['resume_path'] = $_SESSION['resume_path'] = $UploadDirectory.$NewFileName;
        //echo $query;
    $result = mysql_query($query);
    $_SESSION['company'] = $companies;
    if($result) {
        die( 'Success! Preferences Updated.');
    } else {
        die('Database update failed'.mysql_error());
    }


?>