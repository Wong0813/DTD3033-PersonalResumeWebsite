  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">WONG</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="resume.php">Resume</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
       
      <!-- different page different Update button -->
      <?php if ($current_page == 'home'): ?>
        <a class="btn-getstarted ms-3" href="home_update_form.php">Home Update</a>
      <?php elseif ($current_page == 'about'): ?>
        <a class="btn-getstarted ms-3" href="about_update_form.php">About Update</a>
      <?php elseif ($current_page == 'resume'): ?>
        <a class="btn-getstarted ms-3" href="resume_update_form.php">Resume Update</a>
      <?php elseif ($current_page == 'contact'): ?>
        <a class="btn-getstarted ms-3" href="contact_update_form.php">Contact Update</a>
      <?php elseif ($current_page == 'portfolio'): ?>
        <a class="btn-getstarted ms-3" href="portfolio_update_form.php">Portfolio Update</a>
      <?php endif; ?>

      
    </div>
  </header>