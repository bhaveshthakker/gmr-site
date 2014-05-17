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
  <form id="signupApplicant" method="post" action="signupApplicant.php" >
    <div><input type="text"  id="fullname" name="a_fullname" 
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
            By clicking Register Me, you agree to our Terms and conditions.
          </div>
          <input id="signupButton" type="submit" value="Register Me" class="cform-submit">
        </form>
      </div>
      <script>
        $(function() {
          $.validate({
            form : '#signupApplicant',
            modules : 'security',
            validateOnBlur : true,
            scrollToTopOnError : false,
            onSuccess: function() {
              var options = { 
                  //target:   '#signupApplicant',   // target element(s) to be updated with server response 
                  beforeSubmit:  beforeSubmit,  // pre-submit callback 
                  success: afterSuccess,  // post-submit callback 
                  uploadProgress: OnProgress //upload progress callback 
                  //resetForm: true        // reset the form after successful submit 
              }; 
              $("#signupApplicant").ajaxSubmit(options); 
              return false;
            }
      });
          function afterSuccess(response)
          {
            try {
              response = JSON.parse(response);
              gmr.message.showMessages(response.error_desc);
            } catch(e) {
              gmr.message.showMessages("Something went wrong. Please try again or mail us at mail@getmereferred.com-15");
            }
            $("#signupButton").val('Register Me');
            $("#signupButton").removeAttr('disabled');
          }
          function beforeSubmit(){
            $("#signupButton").val('Please wait...');
            $("#signupButton").attr('disabled', 'disabled');
          }

          function OnProgress(event, position, total, percentComplete)
          {

          }
        });
</script>