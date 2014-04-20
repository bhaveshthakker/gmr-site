<html>
<?php
require_once('scripts.php');
require_once('session_initialize.php'); 
require_once('database.php');
include_once("analyticstracking.php");
$act_key = $_GET['key'];
/*echo "<br />comming here<br />";*/
/*echo $act_key;*/
$query = "select username, firstname from applicants where activation_key = '$act_key'";
/*echo "<br />".$query;*/
/*echo $query;*/
$result = mysql_query($query)  or die(mysql_error());
/*echo $result;*/
/*echo $result;*/
//echo $result;
if(mysql_num_rows($result)==1) {
	/*echo "Row is ";*/
	$row = mysql_fetch_row($result);
	$username = $row[0];
	$firstname = $row[1];
	/*echo $row[0];*/
	$_SESSION['temp_username'] = $username;
	$_SESSION['temp_firstname'] = $firstname;
	/*echo $_SESSION['username'];
	echo $_SESSION['firstname'];*/
	//header('location:reset_password.php');
} else {
	$_SESSION['alert-message'] = "WRONG_ACTIVATION_KEY-5";
	header('location:index.php');
}

?>
<body>
    <!-- <form method="post" action='forget_password_update.php' >
        <input type="password"  id="password1" name ="password1" placeholder="New Password" class="cform-text" size="40" title="Your email" />
        <input type="password"  id="password2" name ="password2" placeholder="New Password Again" class="cform-text" title="Your password" />  
        <input type="submit" value="Sign In" class="cform-submit">
    </form> -->
<!--     <form method="post" action='forget_password_update.php' >
        <input type="password"  id="password1" name ="password1" placeholder="Enter new password" class="cform-text" size="40" title="Your Password" />
        <input type="password"  id="password2" name ="password2" placeholder="Enter new password again" class="cform-text" title="Your password again" />  
        <input type="submit" value="Reset My Password" class="cform-submit">
    </form> -->
    <section id="signin" class="single-page scrollblock">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h2>Let's reset the password</h2>
			    <form method="post" action='forget_password_update.php' >
			        <input type="password"  id="password1" name ="password1" placeholder="Enter new password" class="cform-text" size="40" title="Your Password" />
			        <input type="password"  id="password2" name ="password2" placeholder="Enter new password again" class="cform-text" title="Your password again" />  
			        <input type="submit" value="Reset Password" class="cform-submit">
			    </form>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- .row -->
      </div>
      <!-- ./container -->
    </section>
</html>