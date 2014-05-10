<?php
require_once('session_initialize.php'); 
require_once('fbmain.php');
require_once('database.php');
require_once('php_mailer.php');
require_once('set_session_data.php');

$config['baseurl']='http://'.$_SERVER['HTTP_HOST'];
?>
<?php
//print_r($fbme);
// Generating facebook login & logout urls
if(!is_null($fbme)) {
  $logoutUrl = $facebook->getLogoutUrl(array(
    'next'=> $config['baseurl'].'/signout.php')
  );
} else {
  $loginUrl = $facebook->getLoginUrl(
    array(
      'display'  => 'popup',
      'redirect_uri'   => $config['baseurl'] . '/index.php?loginsucc=1',
      'scope' => 'email, user_education_history, user_location, user_work_history'
      )
    );
}
if (!is_null($fbme) && isset($_REQUEST['loginsucc'])){
    //only if valid session found and loginsucc is set

  $email = $fbme['email'];
  $fname =  $fbme['first_name'];
  $lname = $fbme['last_name'];
  $ip = getRealIpAddr();

    //now set the cookie so that next time user don't need to click login again
    //setCookie('fbs_' . "{$fbconfig['appid']}", $strCookie);
    //print_r($fbme);
  $query = "select * from applicants where username='$email'";

  $result = mysql_query($query) or  die("Error on checking FB user"+mysql_error());
    //user already registerred using facebook 
    // Go and create session
  if(mysql_num_rows($result)==1) { 
    $row = mysql_fetch_assoc($result);
    setSessionData($row);
  }
  else {
    $query = "insert into applicants (firstname,lastname,username,ip_address, status_type) values(".
      "'$fname','$lname','$email','$ip', 'FACEBOOK_REGISTRATION')";
echo $query;
$result = mysql_query($query)  or $db_error = mysql_errno();
echo mysql_error();
if(isset($db_error)) {
  $_SESSION['alert-message'] = "mysql_".$db_error."-15";
  unset($_SESSION['username']);
} else {
  $_SESSION['username'] = $email;
  $_SESSION['firstname'] = $fname;
          //$isMailSent = phpMailerSend('', $email, $fname, $lname);
  $_SESSION['alert-message'] = "FACEBOOK_REGISTRATION_SUCCESSFUL-10";
}
}
?>
<script type="text/javascript">
  (function closePopup() {
    //console.log('inside close');
    window.opener.location.href= "<?php echo $config['baseurl']; ?>";
    window.close();
  })();
</script>
<?php
}
function getRealIpAddr(){
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //check if ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //to check if ip is passed from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
?>
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

    var newwindow=window.open('<?php echo $loginUrl ?>','Login_by_facebook',features);

    if (window.focus) {newwindow.focus()}
     return false;
 }
</script>