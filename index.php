<?php
include 'databaseLink.php';

// READ
$sql = "SELECT * FROM home WHERE id = 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// UPDATE
if (isset($_POST['update_home'])) {

    $full_name = $_POST['full_name'];
    $tagline = $_POST['tagline'];
    $introduction = $_POST['introduction'];

    // PICTURE
    if (!empty($_FILES['profile_image']['name'])) {

        $target_dir = "uploads/";
        $file_name = time() . "_" . basename($_FILES["profile_image"]["name"]);
        $target_file = $target_dir . $file_name;

        move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file);

        $update = "UPDATE home SET 
            full_name='$full_name',
            tagline='$tagline',
            introduction='$introduction',
            profile_image='$target_file'
            WHERE id = 1";

    } else {

        $update = "UPDATE home SET 
            full_name='$full_name',
            tagline='$tagline',
            introduction='$introduction'
            WHERE id = 1";
    }

    mysqli_query($conn, $update);
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- HEADER -->
<head>
  <?php include 'header.php';?>
</head>

<!-- NAVIGATION -->
<?php
// home update buttton
$current_page = 'home';
include 'navigation.php';
?>

<!-- BODY -->
<body class="index-page">

<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <img src="<?php echo $data['profile_image']; ?>" alt="" data-aos="fade-in">

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
        <!-- READ from DB -->
        <h2>Hi, I'm <?php echo $data['full_name']; ?></h2>

        <p>
          I'm a 
          <span class="typed" data-typed-items="<?php echo $data['tagline']; ?>"></span>
        </p>

        <p><?php echo $data['introduction']; ?></p>

        <div class="social-links">
        </div>      
    </div>
  </div>

</section>
</main>

<!-- FOOTER -->
<?php include 'footer.php';?>

</body>
</html>
