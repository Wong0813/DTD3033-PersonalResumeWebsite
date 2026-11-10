<?php
include 'databaseLink.php';

// read database
$result = mysqli_query($conn, "SELECT * FROM about WHERE id = 2");
$data = mysqli_fetch_assoc($result);
$skills = json_decode($data['skills'], true); // JSON 数据
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Header -->
  <?php include 'header.php';?>
</head>

<!-- Navigation -->
<?php
$current_page = 'about';
include 'navigation.php';
?>

<body class="index-page">
  <main class="main">

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="subtitle"><?php echo htmlspecialchars($data['subtitle']); ?></span>
        <h2><?php echo htmlspecialchars($data['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <!-- PROFILE CARD -->
          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="150">
            <div class="profile-card">
              <div class="profile-header">
                <div class="profile-avatar">
                  <img src="assets/img/profile/about_image.jpeg" class="img-fluid" alt="">
                  <div class="status-indicator"></div>
                </div>
                <h3>WONG CHUN LIANG</h3>
                <span class="role">Educational Software Engineer</span>
                <div class="rating">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                  <span>4.8</span>
                </div>
              </div>

              <div class="profile-stats">
                <div class="stat-item">
                  <h4>5</h4>
                  <p>Projects</p>
                </div>
                <div class="stat-item">
                  <h4>4+</h4>
                  <p>Years</p>
                </div>
                <div class="stat-item">
                  <h4>2</h4>
                  <p>Awards</p>
                </div>
              </div>

              <div class="profile-actions">
                <a href="assets/cv_file/cv_resume.pdf" class="btn-primary"><i class="bi bi-download"></i> Download CV</a>
                <a href="mailto:wongchunliang8158@gmail.com?subject=Portfolio%20Enquiry" class="btn-secondary"><i class="bi bi-envelope"></i> Contact</a>
              </div>

              <div class="social-connect">
                <a href="https://my.linkedin.com/in/%E4%BF%8A%E8%89%AF-%E4%BE%9D%E5%A4%A7-%E9%BB%84-256074357"><i class="bi bi-linkedin"></i></a>
                <a href="https://github.com/Wong0813"><i class="bi bi-github"></i></a>
                <a href="https://www.threads.com/@chun_l813"><i class="bi bi-twitter"></i></a>
                <a href="https://www.instagram.com/chun_l813/"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>

          <!-- CONTENT -->
          <div class="col-lg-8" data-aos="fade-left" data-aos-delay="200">
            <div class="content-wrapper">

              <!-- Details Grid -->
              <div class="details-grid">
                <div class="detail-item" data-aos="fade-up" data-aos-delay="250">
                  <i class="bi bi-briefcase"></i>
                  <div class="detail-content">
                    <span>Experience</span>
                    <strong><?php echo htmlspecialchars($data['experience']); ?></strong>
                  </div>
                </div>

                <div class="detail-item" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-mortarboard"></i>
                  <div class="detail-content">
                    <span>Degree</span>
                    <strong><?php echo htmlspecialchars($data['degree']); ?></strong>
                  </div>
                </div>

                <div class="detail-item" data-aos="fade-up" data-aos-delay="350">
                  <i class="bi bi-geo-alt"></i>
                  <div class="detail-content">
                    <span>University</span>
                    <strong><?php echo htmlspecialchars($data['university']); ?></strong>
                  </div>
                </div>

                <div class="detail-item" data-aos="fade-up" data-aos-delay="100">
                  <i class="bi bi-envelope"></i>
                  <div class="detail-content">
                    <span>Email</span>
                    <strong><?php echo htmlspecialchars($data['email']); ?></strong>
                  </div>
                </div>

                <div class="detail-item" data-aos="fade-up" data-aos-delay="150">
                  <i class="bi bi-phone"></i>
                  <div class="detail-content">
                    <span>Phone</span>
                    <strong><?php echo htmlspecialchars($data['phone']); ?></strong>
                  </div>
                </div>

                <div class="detail-item" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-calendar-check"></i>
                  <div class="detail-content">
                    <span>Availability</span>
                    <strong><?php echo htmlspecialchars($data['availability']); ?></strong>
                  </div>
                </div>
              </div>

              <!-- Coding Skills -->
              <div class="skills-showcase" data-aos="fade-up" data-aos-delay="250">
                <div class="section-tag">Core Skills</div>
                <h3>Coding Language</h3>
                <div class="skills-list skills-animation">
                  <?php
                  foreach($skills['coding'] as $skill){
                    echo '<div class="skill-item">
                      <div class="skill-info">
                        <span class="skill-name">'.htmlspecialchars($skill['name']).'</span>
                        <span class="skill-percent">'.htmlspecialchars($skill['percent']).'%</span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="'.htmlspecialchars($skill['percent']).'" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>

              <!-- Language Skills -->
              <div class="skills-showcase language-skill" data-aos="fade-up" data-aos-delay="250">
                <div class="section-tag">Core Skills</div>
                <h3>My Language</h3>
                <div class="skills-list skills-animation">
                  <?php
                  foreach($skills['language'] as $lang){
                    echo '<div class="skill-item">
                      <div class="skill-info">
                        <span class="skill-name">'.htmlspecialchars($lang['name']).'</span>
                        <span class="skill-percent">'.htmlspecialchars($lang['percent']).'%</span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="'.htmlspecialchars($lang['percent']).'" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>';
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>

  </main>

  <footer>
    <?php include 'footer.php';?>
  </footer>

</body>
</html>
