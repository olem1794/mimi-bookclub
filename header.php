<?php include("config.php"); ?>
<header id="siteheader">
  <a href="#topnav"><img id="logo" src="img/mimilogo.png"></a>

  <nav id="topnav">
    <ul>
      <li>
        <a class="<?php echo ($current_page == 'index.php') ? 'active' : NULL ?>" href="index.php"> <i class="fas fa-home"></i> </a>
      </li>
      <li>
        <a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>" href="about.php">About</a>
      </li>
      <li>
        <a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>" href="browse.php">Browse Books</a>
      </li>
      <li>
        <a class="<?php echo ($current_page == 'mybooks.php') ? 'active' : NULL ?>" href="mybooks.php"> My Books</a>
      </li>
      <li>
        <a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>" href="contact.php">Contact</a>
      </li>
      <li>
        <a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">Gallery</a>
      </li>
    </ul>
  </nav>
</header>
