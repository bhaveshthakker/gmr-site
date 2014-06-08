<?php
require_once('session_initialize.php'); 
?>
<!--<div id="headerwrap">
  <header class="clearfix">
    <h1><span>Welcome!</span> <?php //echo $_SESSION['username']; ?>.</h1>
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2>Signup for our Newsletter to be updated</h2>
        </div>
      </div>
    </div>
  </header>
</div> -->
<!--******************** Feature ********************-->
<!--<div class="scrollblock">
  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="span12">
          <article>
            <p>We work to make web a beautiful place.</p>
            <p>We craft beautiful designs and convert them into</p>
            <p>fully functional and user-friendy web app.</p>
          </article>
        </div> -->
        <!-- ./span12 -->
        <!--   </div> -->
        <!-- .row -->
        <!-- </div> -->
        <!-- ./container -->
 <!-- </section>
</div>
<hr> -->

<section id="services" class="single-page scrollblock">
  <div class="container">

    <!--<div class="align"><i class="icon-cog-circled"></i></div> -->
    <h1><span>Welcome</span> <?php echo $_SESSION['fullname'].'!'?></h1>
    <!-- Four columns -->
    <div class="row" id="menu">
      <div class="span1"></div>
      <div class="span10">
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#updateprofile" data-toggle="tab">Update my profile</a></li>
           <li><a href="#searchopenings" data-toggle="tab">Search Openings</a></li>
            <li><a href="#contact" data-toggle="tab">Feedback/Questions</a></li>
          </ul>
          <script type="text/javascript">
            $(function() {
              $('.nav-tabs a:first').tab('show');
              $('#contact-menu-item').click(function() {
                $('.nav-tabs a:last').tab('show');
              });
            });
          </script>
          <div class="tab-content">
            <div class="tab-pane active" id="updateprofile"><?php require_once('updateprofile.php'); ?></div>
            <div class="tab-pane fade" id="searchopenings"><?php require_once('searchopenings.php'); ?></div>
            <div class="tab-pane fade" id="contact"><?php include_once('contactus_form.php') ?></div>
          </div>
        </div>
      </div>
      <div class="span1"></div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->
</section>
<hr>