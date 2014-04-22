(function() {
	function getMessageMap(key) {
		var message = "";
		if(key === 'WRONG_ACTIVATION_KEY') {
			message = "Oops! Seems like the activation link is corrupted. Click <a href='#headerwrap' class='message-anchor'>here</a> to register again"
		} else if(key === 'ACTIVATION_SENT') {
			message = "Thanks! We have sent you an activation link. You are just 1 small step away from being our precious user. Please check your email"
		} else if(key === "mysql_1062") {
			message = "Oops! Seems like you have already registered an account with us. Click <a href='#signin' class='message-anchor'>here</a> if you have forgotten your password"			
		} else if(key === 'PASSWORD_SUCCESSFULLY_CHANGED') {
			message = "Congragulations! Your password has been changed successfully";			
		} else if (key === 'FORGOT_PASSWORD_MAIL_SENT') {
			message = "Hey, we have sent you an email that will help you reset the password.";			
		} else if(key === 'FACEBOOK_REGISTRATION_SUCCESSFULL') {
			message = "Thanks! You are now registered. Go and update your profile."
		} else {
			message = key;
		}
		return message;
	}
	function showMessages (message) {
		$("#message-display span").html(getMessageMap(message.split("-")[0]));
        $("#message-display").show();
        $("#message-display").delay(parseInt(message.split("-")[1])*1000).fadeOut('slow');
	}

	gmr = window.gmr || {};
	gmr.message  = {
		showMessages: showMessages
	}
	

}());
/*$(document).ready(function() {
              var message = <?php echo '"'.$_SESSION['alert-message'].'"';?>;
              $("#message-display span").text(message);
              $("#message-display").show();
              $("#message-display").delay(5000).fadeOut('slow');
 });*/