<?php
include 'databaseLink.php';

// 读取数据库信息
$result = mysqli_query($conn, "SELECT * FROM resume WHERE id = 1");
$data = mysqli_fetch_assoc($result);

$experience = json_decode($data['experience'], true);
$education = json_decode($data['education'], true);
$skills = json_decode($data['skills'], true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php';?>
</head>

<body class="index-page">

<?php
$current_page = 'resume';
include 'navigation.php';
?>

<main class="main">
<section id="resume" class="resume section">

  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle"><?php echo htmlspecialchars($data['subtitle']); ?></span>
    <h2><?php echo htmlspecialchars($data['title']); ?></h2>
    <p><?php echo htmlspecialchars($data['description']); ?></p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">

      <!-- EXPERIENCE -->
      <div class="col-lg-6">
        <div class="experience-section">
          <div class="section-header" data-aos="fade-right" data-aos-delay="200">
            <span class="section-badge">Experience</span>
            <h2>Professional Journey</h2>
          </div>
          <div class="experience-cards">
            <?php foreach($experience as $exp): ?>
            <div class="exp-card" data-aos="zoom-in" data-aos-delay="300">
              <div class="card-header">
                <div class="company-logo"><i class="bi bi-buildings"></i></div>
              </div>
              <div class="card-body">
                <h3><?php echo htmlspecialchars($exp['role']); ?></h3>
                <p class="company-name"><?php echo htmlspecialchars($exp['company']); ?></p>
                <span class="duration"><?php echo htmlspecialchars($exp['duration']); ?></span>
                <p class="description"><?php echo htmlspecialchars($exp['description']); ?></p>
                <div class="skills-tags">
                  <?php foreach($exp['tags'] as $tag) echo '<span class="skill-tag">'.htmlspecialchars($tag).'</span>'; ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- EDUCATION / CAREER GOALS / SKILLS -->
      <div class="col-lg-6">
        <div class="education-section">

          <div class="section-header" data-aos="fade-left" data-aos-delay="200">
            <span class="section-badge">Education</span>
            <h2>Academic Background</h2>
            <p>My academic journey has provided me with a strong foundation in technology, digital systems, and problem-solving. Through coursework, practical assignments, and hands-on projects, I have developed the essential skills and knowledge needed to excel in both technical and creative fields.</p>
          </div>

          <div class="education-timeline" data-aos="fade-left" data-aos-delay="300">
            <div class="timeline-track">
              <?php foreach($education as $edu): ?>
              <div class="timeline-item">
                <div class="timeline-marker"><i class="bi bi-mortarboard-fill"></i></div>
                <div class="timeline-content">
                  <div class="education-meta">
                    <span class="year-range"><?php echo htmlspecialchars($edu['period']); ?></span>
                    <span class="degree-level"><?php echo htmlspecialchars($edu['level']); ?></span>
                  </div>
                  <h4><?php echo htmlspecialchars($edu['title']); ?></h4>
                  <p class="institution"><?php echo htmlspecialchars($edu['institution']); ?></p>
                  <p class="description"><?php echo htmlspecialchars($edu['description']); ?></p>
                  <?php if(isset($edu['achievement']) && !empty($edu['achievement'])): ?>
                  <div class="achievement">
                    <i class="bi bi-award"></i>
                    <span><?php echo htmlspecialchars($edu['achievement']); ?></span>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>

              <!-- Career Goals -->
              <div class="timeline-item">
                <div class="timeline-marker"><i class="bi bi-flag-fill"></i></div>
                <div class="timeline-content">
                  <span class="degree-level">Career Goals</span>
                  <p><?php echo htmlspecialchars($data['career_goals']); ?></p>
                </div>
              </div>

              <!-- Skills -->
              <div class="timeline-item">
                <div class="timeline-marker"><i class="bi bi-lightning-fill"></i></div>
                <div class="timeline-content">
                  <span class="degree-level">Skills</span>
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
