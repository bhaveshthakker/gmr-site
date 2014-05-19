<?php
	require_once('../session_initialize.php'); 
	require_once('../database.php');
	require_once('../validation.php');
	require_once('../php_mailer.php');
	/*require_once('../scripts.php');*/

	$query = "select * from applicants";
	$result = mysql_query($query)  or $db_error = mysql_errno();

?>
	<!DOCTYPE HTML>
	<html lang="en">
	<head>

</head>
	<body>
		<div class="admin-page-container">
		<table id='applicants_view' class="display cell-border order-column" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>User Name</th>
				
				<th>Resume Path</th>
			</tr>
		</thead>
<?php
	echo "<tbody>";
	while($row = mysql_fetch_assoc($result)) {
	  if(isset($row['username']) && $row['username'] != null) {
		  echo "<tr id='".$row['username']."'>";
		  echo "<td>" . $row['username'] . "</td>";

		  echo "<td>" . $row['resume_path'] . "</td>";

		  
		  echo "</tr>";
	  }
	  
	}
	echo "</tbody>";

	echo "</table>";
?>
</div>
</body>
</html>
