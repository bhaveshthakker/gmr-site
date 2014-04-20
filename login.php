<html lang="en">
<head></head>
<body>
<!--<script type="text/javascript">
				function closePopup() {
					console.log('inside close');
					window.opener.reload();
					window.close();
				};
</script>
<form> 
	<fieldset>
		<legend>Sign-in form</legend>
		login   : <input type="text" name="login" /><br /> 
		password: <input type="password" name="password" /><br /> 
 
		<input type="submit" value="Sign-in" />
	<fieldset>
	<fieldset>
    <legend>Or use anohter service</legend>
 
    <a href="login.php?provider=facebook"><img src="images/buttons/facebook.gif" /></a><br />
    <a href="login.php?provider=twitter" ><img src="images/buttons/twitter.gif"  /></a><br />
    <a href="login.php?provider=linkedin"><img src="images/buttons/linkedin.gif" /></a>
</fieldset>
</form> -->
<?php
	// if page requested by submitting login form
	// then we keep the same login flow 
	// include hybridauth lib
	/*$config = dirname(__FILE__) . '/hybridauth/config.php';
	require_once( "hybridauth/Hybrid/Auth.php" );
	if( isset($_REQUEST["login"]) && isset($_REQUEST["password"]) ){
		$user_exist = get_user_by_login_and_password($_REQUEST["login"], $_REQUEST["password"]);
 
		// if user exist on database
		if( $user_exist ){ 
			// then create a session for the user whithin your application 
			// and redirect him back to the profile or dashboard page or something :)
			$_SESSION["user_connected"] = true;
			redirect_to("http://www.example.com/user/home");
		} 		
	}
 
	// else, if login page request by clicking a provider button
	elseif( isset($_REQUEST["provider"]) ){ */
		// the selected provider
		$provider_name = $_REQUEST["provider"];
		require 'facebook-php-sdk/src/facebook.php';

		$facebook = new Facebook(array(
			'appId'  => '616490131782862',
			'secret' => '42b7b42fe265f3f5be51120874f88439',
			'display' => 'popup'
		));
		 // Get User ID
	$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

	if ($user) {
		try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $facebook->api('/me');
			echo $user_profile['email'];
			//print_r ($user_profile);
		} catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		}
	}

// Login or logout url will be needed depending on current user state.

	if ($user) {
		$params = array( 'next' => 'http://test.getmereferred.com/gmr-site/index.php' );
		$logoutUrl = $facebook->getLogoutUrl($params);
		$user= null;
		header('location:'.$logoutUrl);
	} else {
		$loginUrl = $facebook->getLoginUrl(array(		
		));
		header('location:'.$loginUrl);
	}
?>	
</body>
</html>