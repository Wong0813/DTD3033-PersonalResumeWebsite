<?php
include 'databaseLink.php';
$result = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY year DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>

<body class="index-page">

<?php
$current_page = 'portfolio';
include 'navigation.php';
?>

<main class="main">
<section id="portfolio" class="portfolio section">

  <div class="container section-title">
    <span class="subtitle">Portfolio</span>
    <h2>Portfolio</h2>
    <p>A collection of projects that reflects my skills and experience.</p>
  </div>

  <div class="container">
    <div class="row gy-4">

      <?php while($row = mysqli_fetch_assoc($result)): ?>
      <div class="col-lg-4 col-md-6">

        <div class="portfolio-card">
          <img src="<?php echo htmlspecialchars($row['image']); ?>"
               class="img-fluid"
               alt="<?php echo htmlspecialchars($row['title']); ?>">

          <h4><?php echo htmlspecialchars($row['title']); ?></h4>
          <small><?php echo htmlspecialchars($row['category']); ?> | <?php echo $row['year']; ?></small>

          <p><?php echo htmlspecialchars($row['description']); ?></p>

          <?php if(!empty($row['pdf'])): ?>
            <a href="<?php echo htmlspecialchars($row['pdf']); ?>"
               target="_blank"
               class="btn btn-sm btn-outline-primary">
               View PDF
            </a>
          <?php endif; ?>
        </div>

      </div>
      <?php endwhile; ?>

    </div>
  </div>

</section>
</main>

<footer>
<?php include 'footer.php'; ?>
</footer>

</body>
</html>
