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
    <h1><span>Welcome,</span> <?=$_SESSION['firstname'].'!'?></h1>
    <!-- Four columns -->
    <div class="row" id="menu">
      <div class="span1"></div>
      <div class="span10">
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Update my profile</a></li>
            <li><a href="#tab2" data-toggle="tab">Search Jobs</a></li>
            <li><a href="#tab3" data-toggle="tab">Feedback/Questions</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1"><?php require_once 'updateprofile.php'; ?></div>
            <div  class="tab-pane fade" id="tab2">Tab 2</div>
            <div  class="tab-pane fade" id="tab3">Tab 3</div>
            <div  class="tab-pane fade" id="tab4">Tab 4</div>
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