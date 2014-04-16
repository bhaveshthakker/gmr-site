<?php
require_once('session_initialize.php'); 
?>
<div id="headerwrap">
  <header class="clearfix">
    <h1><span>Get Me Reffered!</span> A beginning of the end your job search.</h1>
    <div class="container">
      <div class="row" id="signupForms">

        <ul>
          <li><a href="#applicant">I'm an applicant</a></li>
          <li><a href="#referrer">I'm a referrer</a></li>
        </ul>
        <div class="span12 tab1" id="applicant">
          <h2>Signup to get yourself reffered</h2>
          <?php 
          if(isset($_GET['sub']) && $_GET['sub'] == 'e')
            echo $_SESSION['error'];
          ?>
          <form method="post" action='signupApplicant.php' >
            <input type="text"  id="a_firstname" name="a_firstname" placeholder="First Name" class="cform-text input-half" size="40" title="Your first name" />
            <input type="text"  id="a_lastname" name="a_lastname" placeholder="Last Name" class="cform-text input-half" size="40" title="Your last name" />
            <input type="text"  id="a_email" name ="a_email" placeholder="you@yourmail.com" class="cform-text" size="40" title="Your email" />
            <input type="password"  id="a_password" name ="a_password" placeholder="Password" class="cform-text" title="Your password" />  
            <div id="TnC">
              By clicking Sign Up, you agree to our Terms and conditions.
            </div>
            <input type="submit" value="Sign Up" class="cform-submit">
          </form>
        </div>
        <div class="span12 tab2" id="referrer">
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
            </form>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- .row -->
      </div>
      <!-- ./container -->
    </section>
  <hr>