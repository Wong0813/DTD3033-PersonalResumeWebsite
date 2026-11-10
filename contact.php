<?php
include 'databaseLink.php';

//read content
$infoResult = mysqli_query($conn, "SELECT * FROM contact_info WHERE id = 1");
$contactInfo = mysqli_fetch_assoc($infoResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php';?>
</head>

<body class="index-page">
<?php
$current_page = 'contact';
include 'navigation.php';
?>

<main class="main">

<section id="contact" class="contact section">

  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Contact</span>
    <h2>Contact</h2>
    <p>I’m actively seeking opportunities to apply my skills in software development and system design. Feel free to reach out regarding internships, entry-level roles, or project opportunities.</p>
  </div>

  <div class="container">
    <div class="row gy-4">

      <!-- Contact Info -->
      <div class="col-lg-4">
        <div class="info-item">
          <div class="icon-wrapper"><i class="bi bi-geo-alt"></i></div>
          <div>
            <h3>Address</h3>
            <p><?php echo htmlspecialchars($contactInfo['address']); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="icon-wrapper"><i class="bi bi-telephone"></i></div>
          <div>
            <h3>Call Me</h3>
            <p><?php echo htmlspecialchars($contactInfo['phone']); ?></p>
          </div>
        </div>

        <div class="info-item">
          <div class="icon-wrapper"><i class="bi bi-envelope"></i></div>
          <div>
            <h3>Email Me</h3>
            <p><?php echo htmlspecialchars($contactInfo['email']); ?></p>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8">
        <form action="contact_update_form.php" method="post">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>

            <div class="col-md-12">
              <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>

            <div class="col-md-12">
              <textarea name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" name="submit_message" class="btn btn-primary">Send Message</button>
            </div>

          </div>
        </form>
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
