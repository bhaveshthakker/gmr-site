<?php
require_once('session_initialize.php');
require_once('database.php');
$companies = $_POST["allSelectedCompanies"];
$location = $_POST["allSelectedLocations"];
$username = $_SESSION['username'];
$query = "update applicants set company='$companies', location='$location' where username='$username'";
    //$_SESSION['resume_path'] = $_SESSION['resume_path'] = $UploadDirectory.$NewFileName;
        echo $query;
$result = mysql_query($query);
    if(isset($companies) && $companies!=null) 
        $_SESSION['company'] = $companies;
    else
        $_SESSION['company'] = 'No companies found';
    if(isset($location) && $location!=null) 
        $_SESSION['location'] = $location;
    else
        $_SESSION['location'] = 'No city preferences found';
    if($result) {
        die( 'Success! Preferences Updated.');
    } else {
        die('Database update failed'.mysql_error());
    }


    ?>