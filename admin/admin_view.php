<?php
	require_once('../session_initialize.php'); 
	require_once('../database.php');
	require_once('../validation.php');
	require_once('../php_mailer.php');
	/*require_once('../scripts.php');*/

	$query = "select * from applicants";
	$result = mysql_query($query)  or $db_error = mysql_errno();

?>
	<body>
		<table id='applicants_view' >
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
		  echo "</tr>";
	  }
	  
	}
	echo "</tbody>";

	echo "</table>";
?>
</body>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<link href="css/jquery.dataTables.min.css" type="text/css" rel="stylesheet"></link>
	<!--<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>-->
	<script type="text/javascript" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#applicants_view').dataTable();
	});
</script>