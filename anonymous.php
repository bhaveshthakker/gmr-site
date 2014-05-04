<?php 
require_once('add_facebook_login_button.php');
?>
<div class="row" id="signupForms">
  <div class="span6">
  <h2>Signup to get started</h2>
    
    <div style="color: white;margin: 1em; border-bottom:1px solid #FFFFFF; padding-bottom: 1em">
      <a href="#" id="FBSignUpApplicant" onClick="login();return false;" style="color:#FFFFFF;">
        <img src="img/facebook-login-button.png"/>
      </a>
    </div>
    <div id="TnC"> Or signup using your email</div>
    <form method="post" action='signupApplicant.php' >
      <input type="text"  id="a_firstname" name="a_firstname" placeholder="Full Name" class="cform-text input-half" size="40" title="Your full name" />
      <input type="text"  id="a_email" name ="a_email" placeholder="you@yourmail.com" class="cform-text" size="40" title="Your email" />
      <input type="password"  id="a_password" name ="a_password" placeholder="Password" class="cform-text" title="Your password" />  
      <div id="TnC">
        By clicking Sign Up, you agree to our Terms and conditions.
      </div>
      <input type="submit" value="Register Me" class="cform-submit">
    </form>
  </div>
</div>
<script type="text/javascript">
  $('#signupForms').localScroll({
    onBefore:function( e, anchor, $target ){
     e.stop();
   }
 });
</script>