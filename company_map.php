<?php
require_once('session_initialize.php'); 
include_once 'database.php';

if(isset($_SESSION['username'])) {
	$query = "select id, name from company_details";
	//echo $query."<br />";
	$result = mysql_query($query) or die(mysql_error());
	$info=array();
	if ($result) {
      while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        // do something with the $row
        //echo $row[0]."-	".$row[1]."<br />";	
        //$info = $row;
        array_push($info, $row);
      }
      echo json_encode($info);
    }
    else {
      die(mysql_error());
    }
}

?>