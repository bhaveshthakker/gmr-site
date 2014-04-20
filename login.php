<?php
require_once('session_initialize.php'); 
?>
<html lang="en">
<head>
	<script type="text/javascript">
				function closePopup() {
					console.log('inside close');
					window.opener.reload();
					self.close();
				};
</script>
</head>
<body>
<?php
		require 'facebook-php-sdk/src/facebook.php';

		$facebook = new Facebook(array(
			'appId'  => '616490131782862',
			'secret' => '42b7b42fe265f3f5be51120874f88439'
		));
		$user = $facebook->getUser();
	// Login or logout url will be needed depending on current user state.		
	if ($user) {
		/*$params = array( 
			'next' => 'http://test.getmereferred.com/gmr-site/index.php',
		 	'display' => 'popup'
		);
		$logoutUrl = $facebook->getLogoutUrl($params);
		$user= null;
		header('location:'.$logoutUrl);*/
		echo 'if to check facebook user state'
	?>
		<script type="text/javascript">closePopup();</script>
	<?php
	} else {
		echo 'if user state is '.$user.' then login to facebook';
		$params = array( 
			'next' => 'http://test.getmereferred.com/gmr-site/login.php?success=true',
		 	'display' => 'popup'
		);
		$loginUrl = $facebook->getLoginUrl($params);
		echo $loginUrl;
		//header('location:'.$loginUrl);
	}		
	if(isset($_REQUEST['success']) && $_REQUEST['success']==true) {
		// Get User ID
		$user = $facebook->getUser();
		echo $user;
		
		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		if ($user) {
			echo 'inside session integration';
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				print_r($user_profile);
				$_SESSION['username'] = $user_profile['email'];
				//print_r ($user_profile);
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
				$_SESSION['username'] = null;
			}
		}
	}
?>	
</body>
</html>