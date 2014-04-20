<!DOCTYPE html>
<html>
<head></head>
<body>
  <style type="text/css">
    .box{
      margin: 5px;
      border: 1px solid #60729b;
      padding: 5px;
      width: 500px;
      height: 200px;
      overflow:auto;
      background-color: #e6ebf8;
    }
  </style>
  <script type="text/javascript">
    function closePopup() {
          console.log('inside close');
          self.opener.location.reload();
          self.close();
        }
  </script>
<?php
require_once('fbmain.php');
$config['baseurl']="http://test.getmereferred.com/gmr-site/index.php";
if ($fbme) {
  $logoutUrl = $facebook->getLogoutUrl(
    array('next'=> 'http://test.getmereferred.com/gmr-site/signout.php',));
} else {
 $loginUrl = $facebook->getLoginUrl(
  array(
    'display'  => 'popup',
    'redirect_uri'   => $config['baseurl'] . '?loginsucc=1',
    'cancel_url'=> $config['baseurl'] . '?cancel=1',
    'scope' => 'email, user_birthday, user_location, read_stream, friends_likes'
    )
  );
}
if ($fbme && isset($_REQUEST['loginsucc'])){
    //only if valid session found and loginsucc is set

    //after facebook redirects it will send a session parameter as a json value
    //now decode them, make them array and sort based on keys
  $sortArray = get_object_vars(json_decode($_GET['session']));
  ksort($sortArray);
  print_r($sortArray);
  $strCookie =  "";
  $flag    =  false;
  foreach($sortArray as $key=>$item){
    if ($flag) $strCookie .= '&';
    $strCookie .= $key . '=' . $item;
    $flag = true;
  }

    //now set the cookie so that next time user don't need to click login again
  //setCookie('fbs_' . "{$fbconfig['appid']}", $strCookie);

  echo '<script type="text/javascript"> closePopup(); </script>';
}

  //if user is logged in and session is valid.
if ($fbme){
    //Retriving movies those are user like using graph api
  try{
    $movies = $facebook->api('/me/movies');
  }
  catch(Exception $o){
    d($o);
  }

    //Calling users.getinfo legacy api call example
  try{
    $param =  array(
      'method' => 'users.getinfo',
      'uids'  => $fbme['id'],
      'fields' => 'name,current_location,profile_url',
      'callback'=> ''
      );
    $userInfo  =  $facebook->api($param);
  }
  catch(Exception $o){
    d($o);
  }

    //update user's status using graph api
  if (isset($_POST['tt'])){
    try {
      $statusUpdate = $facebook->api('/me/feed', 'post', array('message'=> $_POST['tt'], 'cb' => ''));
    } catch (FacebookApiException $e) {
      d($e);
    }
  }

    //fql query example using legacy method call and passing parameter
  try{
      //get user id
    $uid  = $facebook->getUser();
      //or you can use $uid = $fbme['id'];

    $fql  =  "select name, hometown_location, sex, pic_square from user where uid=" . $uid;
    $param =  array(
      'method'  => 'fql.query',
      'query'   => $fql,
      'callback' => ''
      );
    $fqlResult  =  $facebook->api($param);
  }
  catch(Exception $o){
    d($o);
  }
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
   <?php if (!$fbme) { ?>
   You've to login using FB Login Button to see api calling result.
   <?php } ?>
   <p>
    <?php if ($fbme) { ?>
    <a href=<?php echo'"'.$logoutUrl.'"'?>>
     Sign Out
   </a>
   <?php } else{ ?>
   <a href="#" onclick="login();return false;">
     Sign In
   </a>
   <?php } ?>

 </p>

 <!-- all time check if user session is valid or not -->
 <?php if ($fbme){ ?>
 <table border="0" cellspacing="3" cellpadding="3">
  <tr>
    <td>
      <!-- Data retrived from user profile are shown here -->
      <div class="box">
        <b>User Information using Graph API</b>
        <?php d($fbme); ?>
      </div>
    </td>
    <td>
      <div class="box">
        <b>User likes these movies | using graph api</b>
        <?php d($movies); ?>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div class="box">
        <b>User Information by Calling Legacy API method "users.getinfo"</b>
        <?php d($userInfo); ?>
      </div>
    </td>
    <td>
      <div class="box">
        <b>FQL Query Example by calling Legacy API method "fql.query"</b>
        <?php d($fqlResult); ?>
      </div>
    </td>
  </tr>
</table>
<div class="box">
  <form name="" action="<?=$config['baseurl']?>" method="post">
    <label for="tt">Status update using Graph API</label>
    <br />
    <textarea id="tt" name="tt" cols="50" rows="5">Write your status here and click 'Update My Status'</textarea>
    <br />
    <input type="submit" value="Update My Status" />
  </form>
  <?php if (isset($statusUpdate)) { ?>
  <br />
  <b style="color: red">Status Updated Successfully! Status id is <?=$statusUpdate['id']?></b>
  <?php } ?>
</div>
<?php } ?>

</body>
</html>   