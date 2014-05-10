<?php 
	function setSessionData( $row) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION["dob"] = date("d/m/Y",strtotime($row['dob']));
		$_SESSION["contact_no"] =  $row['mobile'];
		$_SESSION['city'] = $row['current_city'];
		$_SESSION['pincode'] = $row['pincode'];
		$_SESSION['resume_path'] = $row['resume_path'];
		$_SESSION['company'] = $row['company'];
		//print_r($_SESSION);
	}
?>