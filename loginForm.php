<!--******************** Feature ********************-->
<section id="signin" class="single-page scrollblock">
  <div class="container">
    <div class="row"  style="padding-top: 3em;padding-bottom: 3em;">
      <div class="span3"></div>
      <div class="span6">
           <!-- <article>
              <p>We work to make web a beautiful place.</p>
              <p>We craft beautiful designs and convert them into</p>
              <p>fully functional and user-friendy web app.</p>
            </article> -->
            <h2>Let me Sign in</h2>
            <div style="color: white;margin: 1em; border-bottom:1px solid #FFFFFF; padding-bottom: 1em">
              <a href="#" id="FBSignUpApplicant" onClick="login();return false;" style="color:#FFFFFF;">
                <img src="img/facebook-login-button.png"/>
              </a>
            </div>
            <div style="color: white;margin: 1em;font-weight:bold;">Or Sign In using your email</div>

            <div style="color: red;margin: 1em;"><?php 
              if(isset($_GET['login-failed']) && $_GET['login-failed']=='1') {
                echo 'Username or password is incorrect!';
              } ?>
            </div>
            <form method="post" action='signin.php' id="loginForm" >
              <div><input type="text"  id="username" name ="username" 
                placeholder="Your Email" class="cform-text" 
                size="40" title="Your email" 
                data-validation="email" 
                data-validation-error-msg="Please enter your correct email address" />
              </div>
              <div><input type="password"  id="password" name ="password" 
                placeholder="Password" class="cform-text" title="Your password" 
                data-validation="required" 
                data-validation-error-msg="Please enter your account password"
                /></div> 
                <input id="signinButton" type="submit" value="Sign In" class="cform-submit" />
                <a id="forgot-password">Forgot Password</a>
                <!-- data-toggle="modal" data-backdrop="true" data-keyboard="true"
                href="#forget_password_modal" -->
              </form>
            </div>
            <!-- ./span12 -->
            <div class="span3"></div>
          </div>
          <!-- .row -->
        </div>
        <!-- ./container -->
      </section>
      <div id="forget_password_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header forget_password_modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2>Please, help us to find you!</h2>
          <h4>We need your email address</h4>
        </div>
        <div class="modal-body">
          <form method="post" id="forget_password_form" action='forget_password_submit.php'>
            <div class="txt-fld">
              <input id="forgot_password_email" name="forgot_password_email" 
              placeholder="Your Email address" type="text" data-validation="required">
            </div>
            <div>
              <input type="submit" id="forget_button" class="cform-submit" value="Reset Password"></input>
            </div>
          </form>
        </div>
      </div>

      <script type="text/javascript">
        $(function () {
          $('#forgot-password').click(function(e) {
           e.preventDefault();
           $('#forget_password_modal').modal({
            show: true, 
            keyboard: true
          });
         });
          /* $("#forgot-password").leanModal({ top : 200, closeButton: ".modal_close" });  */
          $.validate({
            form : '#forget_password_form',
            modules : 'security',
            scrollToTopOnError : false,
            onSuccess : function() {
              $('#forget_button').attr('disabled', 'disabled').val('Please wait...'); 
            }
          });

          $.validate({
            form : '#loginForm',
            modules : 'security',
            scrollToTopOnError : false ,// Set this property to true if you have a long form
            onSuccess : function() {
              var options = { 
                  //target:   '#signupApplicant',   // target element(s) to be updated with server response 
                  beforeSubmit:  beforeSubmit,  // pre-submit callback 
                  success: afterSuccess,  // post-submit callback 
                  uploadProgress: OnProgress //upload progress callback 
                  //resetForm: true        // reset the form after successful submit 
                }; 
                $("#loginForm").ajaxSubmit(options); 
                return false;
              }
            });
          function afterSuccess(response)
          {
            try {
              response = JSON.parse(response);
              /*gmr.message.showMessages(response.error_desc);*/
              if(response && response.error && response.error=='0') {
                window.location.href = window.location.href;
              } else if(response && response.error && response.error=='1') {
                gmr.message.showMessages(response.error_desc);
              } else {
                gmr.message.showMessages("Something went wrong. Please try again or mail us at mail@getmereferred.com-15");  
              }
            } catch(e) {
              gmr.message.showMessages("Something went wrong. Please try again or mail us at mail@getmereferred.com-15");
            }
            $("#signinButton").val('Sign In');
            $("#signinButton").removeAttr('disabled');
          }
          function beforeSubmit(){
            $("#signinButton").val('Please wait...');
            $("#signinButton").attr('disabled', 'disabled');
          }

          function OnProgress(event, position, total, percentComplete)
          {

          }
        });
</script>
