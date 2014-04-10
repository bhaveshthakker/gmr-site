<!--******************** NAVBAR ********************-->
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
?>
<div class="navbar-wrapper">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
        <h1 class="brand"><a href="#top">Legend!</a></h1>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <nav class="pull-right nav-collapse collapse">
          <ul id="menu-main" class="nav">
            <li><a title="Home" href="#top">Home</a></li>
            <li><a title="portfolio" href="#portfolio">Portfolio</a></li>
            <li><a title="services" href="#services">Services</a></li>
            <li><a title="news" href="#news">News</a></li>
            <li><a title="team" href="#team">Team</a></li>
            <li><a title="contact" href="#contact">Contact</a></li>
            <?php
              if($_SESSION['router'] == 'landing') {
                echo '<li><a title="Sign out" href="signout.php" >Sign Out</a></li>';
              } else {
                echo '<li><a title="Sign In" href="signin.php" >Sign In</a></li>';
              }
            ?>
          </ul>
        </nav>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.navbar-inner -->
  </div>
  <!-- /.navbar -->
</div>
<!-- /.navbar-wrapper -->
<div id="top"></div>