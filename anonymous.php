<?php 
require_once('add_facebook_login_button.php');
?>
<div id="signupForms">
    <h2>Signup to get started</h2>
    
    <div style="color: white;margin: 1em; border-bottom:1px solid #FFFFFF; padding-bottom: 1em">
      <a href="#" id="FBSignUpApplicant" onClick="login();return false;" style="color:#FFFFFF;">
        <img src="img/facebook-login-button.png"/>
      </a>
    </div> 
    <div id="TnC"> Or signup using your email</div>
    <form method="post" action='signupApplicant.php' >
      <div><input type="text"  id="a_firstname" name="a_firstname" 
      placeholder="Full name" class="cform-text input-half" 
      size="40" title="Your full name" data-validation="required" 
      data-validation-error-msg="Please enter your full name" /></div>
      <div><input type="text"  id="a_email" name ="a_email"
      placeholder="Your email" class="cform-text" 
      size="40" title="Your email" 
      data-validation="email" 
      data-validation-error-msg="Please enter your correct email address"/></div>
      <div><input type="password"  id="a_password" name ="a_password" 
      placeholder="Password" class="cform-text" title="Your password" 
      data-validation="required" 
      data-validation-error-msg="Please enter your password"
      /> </div>
      <div id="TnC">
        By clicking Sign Up, you agree to our Terms and conditions.
      </div>
      <input type="submit" value="Register Me" class="cform-submit">
    </form>
</div>
<script>

    $.validate({
      form : '#signupForms',
      modules : 'security',
      validateOnBlur : true,
      scrollToTopOnError : false // Set this property to true if you have a long form
    });
</script>