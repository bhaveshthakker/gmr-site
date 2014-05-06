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
            <div style="color: white;margin: 1em;font-weight:bold;">Or signin using your email</div>

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
                <input type="submit" value="Sign In" class="cform-submit" />
                <a id="forgot-password" href="#forget_password_popup" class="cform-submit">Forget Password</a>
              </form>
            </div>
            <!-- ./span12 -->
            <div class="span3"></div>
          </div>
          <!-- .row -->
        </div>
        <!-- ./container -->
      </section>
      <div id="forget_password_popup" style="display: none; position: fixed; opacity: 1; z-index: 11000; left: 50%; margin-left: -202px; top: 200px;">
        <div id="signup-ct">
          <div id="forget_password_popup-header">
            <h2>Please, help us to find you!</h2>
            <p>We need your email address</p>
            <a class="modal_close" href="#"></a>
          </div>
          <form method="post" action='forget_password_submit.php'>
            <div class="txt-fld">
              <input id="forgot_password_email" name="forgot_password_email" placeholder="Your Email address" type="text">
            </div>
            <div>
              <input type="submit" class="cform-submit"></input>
            </div>
          </form>
        </div>
      </div>

      <script type="text/javascript">
        $(function () {
          $("#forgot-password").leanModal({ top : 200, closeButton: ".modal_close" });  
        });
        $.validate({
          form : '#loginForm',
          modules : 'security',
        scrollToTopOnError : false // Set this property to true if you have a long form
      });
      </script>
