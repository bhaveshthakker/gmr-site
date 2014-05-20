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
	<!-- <link href="../css/bootstrap.css" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"></link>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/28e7751dbec/integration/jqueryui/dataTables.jqueryui.css"></link>
	<!-- <link href="css/jquery.dataTables_themeroller.min.css" type="text/css" rel="stylesheet"></link> -->
	

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script> 
	<script type="text/javascript" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/plug-ins/28e7751dbec/integration/jqueryui/dataTables.jqueryui.js"></script>
	
<script type="text/javascript">
	$(document).ready(function() {
	    $('#applicants_view').dataTable({
        "order": [[ 10, "asc" ]],
        "pagingType": "full_numbers",
        "scrollY":        "400px",
        "scrollX":        "400px",
        "scrollCollapse": true,
    } );
	});
</script>
</head>
	<body>
		<div class="admin-page-container">
		<table id='applicants_view' class="display cell-border order-column" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>User Name</th>
				<th>Full Name</th>
				<th>Current Company</th>
				<th>Notice Period</th>
				<th>Experience</th>
				<th>Primary Skill</th>
				<th>Current CTC</th>
				<th>Mobile</th>
				<th>Current City</th>
				<th>Resume Path</th>
				<th>Creation Date</th>
				<th>Status Type</th>
			</tr>
		</thead>
<?php
	echo "<tbody>";
	while($row = mysql_fetch_assoc($result)) {
	  if(isset($row['username']) && $row['username'] != null) {
		  echo "<tr id='".$row['username']."'>";
		  echo "<td>" . $row['username'] . "</td>";
		  echo "<td>" . $row['firstname'] . "</td>";
		  echo "<td>" . $row['current_company'] . "</td>";
		  echo "<td>" . $row['notice_period'] . "</td>";
		  echo "<td>" . $row['experience'] . "</td>";
		  echo "<td>" . $row['primary_skill'] . "</td>";
		  echo "<td>" . $row['current_ctc'] . "</td>";
		  echo "<td>" . $row['mobile'] . "</td>";
		  echo "<td>" . $row['current_city'] . "</td>";
		  echo "<td>" . $row['resume_path'] . "</td>";
		  echo "<td>" . $row['creation_date'] . "</td>";
		  echo "<td>" . $row['status_type'] . "</td>";
		  
		  echo "</tr>";
	  }
	  
	}
	echo "</tbody>";

	echo "</table>";
?>
</div>
</body>
</html>