<?php 
	function setSessionData( $row) {
		$_SESSION['username'] = $row['username'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION["dob"] = date("d/m/Y",strtotime($row['dob']));
		$_SESSION["contact_no"] =  $row['mobile'];
		$_SESSION['current_city'] = $row['current_city'];
		$_SESSION['pincode'] = $row['pincode'];
		$_SESSION['resume_path'] = $row['resume_path'];
		$_SESSION['company'] = $row['company'];
		$_SESSION['location'] = $row['location'];
		$_SESSION['primary_skill'] = $row['primary_skill'];
		$_SESSION["secondary_skills"] = $row['secondary_skills'];
		$_SESSION["experience"] = $row['experience'];
		$_SESSION['current_company'] = $row['current_company'];
		$_SESSION['notice_period'] = $row['notice_period'];
		$_SESSION['current_ctc'] = $row['current_ctc'];
		print_r($_SESSION);
}
?>