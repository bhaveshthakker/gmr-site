<?php
require_once('session_initialize.php');
$_SESSION['captcha'] = array( mt_rand(0,9), mt_rand(1, 9) );
?>

<div class="row">
  <div class="span1"></div>
  <div class="span8">
    <div class="cform" id="theme-form">
      <form id="contactus" action="contactus.php" method="post" class="cform-form">
        <h2 style="text-align: center;margin-bottom: 0.5em;">
          We love to get your feedback or questions.
        </h2>
        <div class="row">
          <div class="span8">
            <div id="contactusMessage" class="alert alert-success" style="opacity: 0;height:20px;"></div>
          </div>
        </div>
        <div class="row">
          <div class="span8"> 
            <span class="your-email">
              <input type="text" id="your-email" name="your-email" placeholder="Your email please" 
              class="cform-text" size="40" title="your email"
              data-validation="email" 
              data-validation-error-msg="Please enter your full name"
              <?php if(isset($_SESSION['username']) && $_SESSION['username']!='') { 
                $username = $_SESSION['username'];
                echo "value='$username'";
                echo " disabled='disabled'" ;
              } ?> 

              >
            </span> 
          </div>
        </div>
        <div class="row top-buffer">
          <div class="span8"> 
            <span class="message">
              <textarea id="message" name="message" placeholder="Please mention your feedback or questions here" class="cform-textarea" cols="40" rows="5" title="drop us a line."></textarea>
            </span>
          </div>
        </div>
        <div class="row">
          <div class="span8"> 
            <span class="your-email">
              <input type="text" id="captcha" name="captcha" 
              placeholder="What is the sum of <?php echo $_SESSION['captcha'][0]; ?> + <?php echo $_SESSION['captcha'][1]; ?>?" 
              class="cform-text"
              data-validation="spamcheck"
              data-validation-captcha="<?php echo ( $_SESSION['captcha'][0] + $_SESSION['captcha'][1] ); ?>"
              />
            </span>
          </div>
        </div>
        <div class="row">
          <div class="span8">
            <input type="submit" id="feedbackButton" value="Submit feedback" class="cform-submit">
          </div>
        </div>
        <div class="cform-response-output"></div>
      </form>
    </div>
  </div>
  <div class="span1"></div>
  <!-- ./span12 -->
</div>
<!-- /.row -->
<script type="text/javascript">
  $.validate({
    form : '#contactus',
    modules : 'security',
    validateOnBlur : true,
    scrollToTopOnError : false,
    reset: true,
    onSuccess : function() {
      var options = { 
        target:   '#contactusMessage',   // target element(s) to be updated with server response   
        success:   afterSuccess,
        beforeSubmit:  beforeSubmit,
        resetForm: true 
      };
      $('#contactus').ajaxSubmit(options);
      return false; // Will stop the submission of the form
    },
  });
  $("#contactus").submit(function(e) { 
    e.preventDefault();
  });
  function afterSuccess(response)
  {
    $('#contactusMessage')
    .html("Thanks! We will get back to you within 24 hours.")
    .visibilityToggle();      
    setTimeout(function(){
      $('#contactusMessage').visibilityToggle();
    }, 8000);
    $("#feedbackButton").val('Submit feedback');
    $("#feedbackButton").removeAttr('disabled');
  }
  function beforeSubmit(){
    $("#feedbackButton").val('Please wait...');
    $("#feedbackButton").attr('disabled', 'disabled');
  }
</script>