<?php 
function setSessionData($row) {
	$_SESSION['username'] = checkNull($row['username']);
	$_SESSION['fullname'] = checkNull($row['firstname']);
	$_SESSION["dob"] = setDate($row['dob']);
	$_SESSION["contact_no"] =  checkNull($row['mobile']);
	$_SESSION['current_city'] = checkNull($row['current_city']);
	$_SESSION['pincode'] = checkNull($row['pincode']);
	$_SESSION['resume_path'] = checkNull($row['resume_path']);
	$_SESSION['company'] = checkNull($row['company']);
	$_SESSION['location'] = checkNull($row['location']);
	$_SESSION['primary_skill'] = checkNull($row['primary_skill']);
	$_SESSION["secondary_skills"] = checkNull($row['secondary_skills']);
	$_SESSION["experience"] = checkNull($row['experience']);
	$_SESSION['current_company'] = checkNull($row['current_company']);
	$_SESSION['notice_period'] = checkNull($row['notice_period']);
	$_SESSION['current_ctc'] = checkNull($row['current_ctc']);
	print_r($_SESSION);
}
function checkNull($data) {
	if(isset($data) && $data!=null)
		return $data;
	else
		return "";
}
function setDate($date) {
	if(isset($date) && $date!=null)
		return date("d/m/Y",strtotime($date));
	else
		return "";
}
?>