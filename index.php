<?php
require_once('session_initialize.php'); 
?>
<!DOCTYPE HTML>
<html lang="en">
<?php require_once('scripts.php'); ?>    
<body class="main">
  <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '616490131782862',
          xfbml      : true,
          version    : 'v2.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
  <?php
  include_once('analyticstracking.php');
  require_once('header.php');
  if(isset($_SESSION['username']) && $_SESSION['username']!=null) { //user session is active
    require_once('landing.php');  
      //echo '<br>'.'session exist'.$_SESSION['username'];
  } else { //user session is not active --go anonymous
    require_once('informatica.php');
    require_once('loginForm.php');
    require_once('contact.php');
      //echo '<br>'.'session not exist'.$_SESSION['username'];
  }
  ?>
  <!--******************** Portfolio Section ********************-->
  <?php //require_once 'portfolio.php'; ?>
  <!--******************** Services Section ********************-->
  <?php //require_once 'services.php'; ?>
  <!--******************** Testimonials Section ********************-->
  <?php //require_once 'testimonials.php'; ?>
  <!--******************** News Section ********************-->
  <?php //require_once('news.php'); ?>
  <!--******************** Team Section ********************-->
  <?php //require_once('team.php'); ?>
  <!--******************** Contact Section ********************-->
  <?php require_once('footer.php'); ?>
</body>
</html>