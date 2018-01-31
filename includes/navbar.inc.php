<?php
session_start();
if (isset($_GET['page'])) {

    if ($_GET['page'] == 'homepage') {
        $section = 'homepage';
    } elseif ($_GET['page'] == 'blog') {
        $section = "blog";
    } elseif ($_GET['page'] == 'contact') {
        $section = "contact";
    } elseif ($_GET['page'] == 'dashboard') {
        $section = "dashboard";
    } elseif ($_GET['page'] == 'login') {
        $section = "login";
    } elseif ($_GET['page'] == 'register') {
        $section = "register";
    }
}
?>

<header class="header">
  <div class="hamburger">
    <i class="fas fa-bars fa-lg"></i>
  </div>
  <div class="logo">
    <div class="logo_img">
      <a href="index.php?page=homepage"><img src="images/icon/circular-button-with-two-arrows-pointing-both-laterals.svg"></a>
    </div>
    <div class="logo_brand">
      <a href="index.php?page=homepage"><p><span>C</span>oders<span>BD</span></p></a>
    </div>
  </div>
  <div class="navbar">
    <ul id='menu'>
      <li <?php if($section == 'homepage') { echo 'id="active"'; } ?>><a <?php if($section == 'homepage') { echo 'id="on"'; } ?> href="index.php?page=homepage">Home</a></li>
      <li <?php if($section == 'blog') { echo 'id="active"'; } ?>><a <?php if($section == 'blog') { echo 'id="on"'; } ?> href="blog.php?page=blog">Blog</a></li>
      <li <?php if($section == 'contact') { echo 'id="active"'; } ?>><a <?php if($section == 'contact') { echo 'id="on"'; } ?> href="contact.php?page=contact">Contact</a></li>
      <?php
        if(isset($_SESSION['id'])) {
          echo include("link.inc.php");
        }
      ?>
      <?php
        if(!isset($_SESSION['id'])) {
          echo include("link_2.inc.php");
        }
      ?>
    </ul>
  </div>
</header>
