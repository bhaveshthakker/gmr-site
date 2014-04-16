<?php 
$conn = mysql_connect("localhost", "gmradmin", "gmrPune1") or die("Connection failed"+mysql_error()); 
$db = mysql_select_db("gmr") or die("database gmr failed in making"+mysql_error()); 
//echo $conn.$db;
?>
