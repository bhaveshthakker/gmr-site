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
    <h1><span>Welcome,</span> <?php echo $_SESSION['firstname'].'!'; ?></h1>
    <!-- Four columns -->
    <div class="row" id="menu">
      <div id="tab-1"><?php require_once 'updateprofile.php'; ?></div>
      <div id="tab-2">Tab 2</div>
      <div id="tab-3">Tab 3</div>
      <div id="tab-4">Tab 4</div>
      <ul>
        <li>
          <a href="#tab-1">
            <h2>Update my profile</h2>
          </a>
        </li>
        <li>
          <a href="#tab-2">
            <h2>Tab 2</h2>
          </a>
        </li>
        <li>
          <a href="#tab-3">
           <!-- /.span3 -->
           <h2>Tab 3</h2>
         </a>
       </li>
       <li>
        <a href="#tab-4">
         <h2>Tab 4</h2>
       </a>
     </li>
   </ul>
 </div>
 <!-- /.row -->
</div>
<!-- /.container -->
</section>
<hr>
<script type="text/javascript">
  $('#menu').tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" ).removeClass("ui-widget input");
  
  $('#menu').localScroll({
    onBefore:function( e, anchor, $target ){
      e.stop();
    }
  });
  $( "#menu li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
</script>