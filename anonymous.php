<?php
require_once('session_initialize.php'); 
require_once('fbmain.php'); 
?>
 <script type="text/javascript">
            function closePopup() {
              console.log('inside close');
              self.opener.location.href='http://test.getmereferred.com/gmr-site/index.php';
              self.close();
          }
      </script>
<?php
$config['baseurl']="http://test.getmereferred.com/gmr-site/index.php";
if ($fbme) {
  $logoutUrl = $facebook->getLogoutUrl(
    array('next'=> 'http://test.getmereferred.com/gmr-site/signout.php',));
} else {
 $loginUrl = $facebook->getLoginUrl(
  array(
    'display'  => 'popup',
    'redirect_uri'   => $config['baseurl'] . '?loginsucc=1',
    'scope' => 'email, user_birthday, user_location, read_stream, friends_likes'
    )
  );
}
if ($fbme && isset($_REQUEST['loginsucc'])){
    //only if valid session found and loginsucc is set

    //after facebook redirects it will send a session parameter as a json value
    //now decode them, make them array and sort based on keys

  $_SESSION['username'] = $fbme[email];
  $_SESSION['firstname'] =  $fbme[first_name];
    //now set the cookie so that next time user don't need to click login again
  //setCookie('fbs_' . "{$fbconfig['appid']}", $strCookie);
  //print_r($fbme);
  echo '<script type="text/javascript"> closePopup(); </script>';
}
?>
<?php if (isset($loginUrl)) { ?>
      <script type="text/javascript">

      var newwindow;
      var intId;
      function login(){
        var screenX  = typeof window.screenX != 'undefined' ? window.screenX : window.screenLeft,
        screenY  = typeof window.screenY != 'undefined' ? window.screenY : window.screenTop,
        outerWidth = typeof window.outerWidth != 'undefined' ? window.outerWidth : document.body.clientWidth,
        outerHeight = typeof window.outerHeight != 'undefined' ? window.outerHeight : (document.body.clientHeight - 22),
        width  = 500,
        height  = 270,
        left   = parseInt(screenX + ((outerWidth - width) / 2), 10),
        top   = parseInt(screenY + ((outerHeight - height) / 2.5), 10),
        features = (
          'width=' + width +
          ',height=' + height +
          ',left=' + left +
          ',top=' + top
          );
        
        newwindow=window.open('<?=$loginUrl?>','Login_by_facebook',features);
        
        if (window.focus) {newwindow.focus()}
         return false;
     }
      </script>
<?php } ?>
<div id="headerwrap">
  <header class="clearfix">
    <!--<h1><span>Get Me Reffered!</span> A beginning of the end your job search.</h1> -->
    <div class="container">
      <div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>
      <div class="row tabs" id="signupForms">

        <ul>
          <li><a href="#tabs-1">I'm an applicant</a></li>
          <li><a href="#tabs-2">I'm a referrer</a></li>
        </ul>
        <div class="span12 tab1" id="tabs-1">
          <h2>Signup to get yourself reffered</h2>
          <form method="post" action='signupApplicant.php' >
            <input type="text"  id="a_firstname" name="a_firstname" placeholder="First Name" class="cform-text input-half" size="40" title="Your first name" />
            <input type="text"  id="a_lastname" name="a_lastname" placeholder="Last Name" class="cform-text input-half" size="40" title="Your last name" />
            <input type="text"  id="a_email" name ="a_email" placeholder="you@yourmail.com" class="cform-text" size="40" title="Your email" />
            <input type="password"  id="a_password" name ="a_password" placeholder="Password" class="cform-text" title="Your password" />  
            <div id="TnC">
              By clicking Sign Up, you agree to our Terms and conditions.
            </div>
            <input type="submit" value="Sign Up" class="cform-submit">
            <a href="#" id="FBSignUpApplicant" onClick="login();return false;" style="color:#FFFFFF;" class="provider">Sign Up using Facebook </a>
          </form>
        </div>
        <div class="span12 tab2" id="tabs-2">
          <h2>Signup to post a job</h2>
          <form method="post" action='signupReferrer.php' >
            <input type="text"  id="r_firstname" name="r_firstname" placeholder="First Name" class="cform-text input-half" size="40" title="Your first name" />
            <input type="text"  id="r_lastname" name="r_lastname" placeholder="Last Name" class="cform-text input-half" size="40" title="Your last name" />
            <input type="text"  id="r_email" name ="r_email" placeholder="you@yourmail.com" class="cform-text" size="40" title="Your email" />
            <input type="password"  id="r_password" name ="r_password" placeholder="Password" class="cform-text" title="Your password" />  
            <div id="TnC">
              By clicking Sign Up, you agree to our Terms and conditions.
            </div>
            <input type="submit" value="Sign Up" class="cform-submit">
          </form>

        </div>
      </div>
    </div>
  </header>
</div>
<script type="text/javascript">
  $("#signupForms").tabs();
  $('#signupForms').localScroll({
    onBefore:function( e, anchor, $target ){
     e.stop();
   }
 });
</script>
<!--******************** Feature ********************-->
<section id="signin" class="single-page scrollblock">
  <div class="container">
    <div class="row">
      <div class="span12">
           <!-- <article>
              <p>We work to make web a beautiful place.</p>
              <p>We craft beautiful designs and convert them into</p>
              <p>fully functional and user-friendy web app.</p>
            </article> -->
            <h2>Let me Sign in</h2>
            <form method="post" action='signin.php' >
              <input type="text"  id="username" name ="username" placeholder="you@yourmail.com" class="cform-text" size="40" title="Your email" />
              <input type="password"  id="password" name ="password" placeholder="Password" class="cform-text" title="Your password" />  
              <input type="submit" value="Sign In" class="cform-submit">
              <a id="forgot-password" href="#forget_password_popup" class="cform-submit">Forget Password</a>
            </form>
          </div>
          <!-- ./span12 -->
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
    </script>
