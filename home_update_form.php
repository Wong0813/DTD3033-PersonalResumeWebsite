<!-- UPDATE FORM -->
<?php
include 'databaseLink.php';

// READ for form display
$result = mysqli_query($conn, "SELECT * FROM home WHERE id = 1");
$data = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">
  <h4>Update Home Section</h4>
  <form method="POST" action="index.php" enctype="multipart/form-data">
    <input type="text" name="full_name" class="form-control mb-2"
           value="<?php echo $data['full_name']; ?>">

    <input type="text" name="tagline" class="form-control mb-2"
           value="<?php echo $data['tagline']; ?>">

    <textarea name="introduction" class="form-control mb-2"><?php echo $data['introduction']; ?></textarea>

    <input type="file" name="profile_image" class="form-control mb-2">

    <button type="submit" name="update_home" class="btn btn-primary">
      Update
    </button>
  </form>
</div>