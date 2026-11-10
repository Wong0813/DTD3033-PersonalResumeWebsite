<?php
include 'databaseLink.php';

/* ================= DELETE ================= */
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM portfolio WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // 删除后跳转回 portfolio view
    header("Location: portfolio.php");
    exit;
}

/* ================= ADD ================= */
if (isset($_POST['add_portfolio'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $year = $_POST['year'];

    /* image upload */
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $img_dir = "assets/img/portfolio/";
        if (!is_dir($img_dir)) {
            mkdir($img_dir, 0777, true);
        }
        $image = $img_dir . time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    /* pdf upload */
    $pdf = '';
    if (!empty($_FILES['pdf']['name'])) {
        $pdf_dir = "assets/pdf/";
        if (!is_dir($pdf_dir)) {
            mkdir($pdf_dir, 0777, true);
        }
        $pdf = $pdf_dir . time() . "_" . basename($_FILES['pdf']['name']);
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf);
    }

    $stmt = $conn->prepare(
        "INSERT INTO portfolio (title, description, image, pdf, category, year)
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("sssssi", $title, $description, $image, $pdf, $category, $year);
    $stmt->execute();
    $stmt->close();

    // 新增后跳转回 portfolio view
    header("Location: portfolio.php");
    exit;
}

/* ================= UPDATE ================= */
if (isset($_POST['update_portfolio'])) {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $year = $_POST['year'];

    /* image */
    $image = $_POST['existing_image'];
    if (!empty($_FILES['image']['name'])) {
        $img_dir = "assets/img/portfolio/";
        $image = $img_dir . time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    /* pdf */
    $pdf = $_POST['existing_pdf'];
    if (!empty($_FILES['pdf']['name'])) {
        $pdf_dir = "assets/pdf/";
        $pdf = $pdf_dir . time() . "_" . basename($_FILES['pdf']['name']);
        move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf);
    }

    $stmt = $conn->prepare(
        "UPDATE portfolio
         SET title=?, description=?, image=?, pdf=?, category=?, year=?
         WHERE id=?"
    );
    $stmt->bind_param(
        "sssssii",
        $title,
        $description,
        $image,
        $pdf,
        $category,
        $year,
        $id
    );
    $stmt->execute();
    $stmt->close();

    // 更新后跳转回 portfolio view
    header("Location: portfolio.php");
    exit;
}

/* ================= READ (for admin list) ================= */
$result = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY year DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Portfolio Management</title>
</head>

<body>

<h2>Add New Portfolio</h2>
<form method="post" enctype="multipart/form-data">
    Title:<br>
    <input type="text" name="title" required><br>

    Description:<br>
    <textarea name="description"></textarea><br>

    Category:<br>
    <input type="text" name="category"><br>

    Year:<br>
    <input type="number" name="year" value="<?php echo date('Y'); ?>"><br>

    Image:<br>
    <input type="file" name="image"><br>

    PDF:<br>
    <input type="file" name="pdf"><br><br>

    <input type="submit" name="add_portfolio" value="Add Portfolio">
</form>

<hr>

<h2>Existing Portfolio</h2>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
<form method="post" enctype="multipart/form-data"
      style="border:1px solid #ccc;padding:10px;margin-bottom:10px;">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <input type="hidden" name="existing_image" value="<?php echo $row['image']; ?>">
    <input type="hidden" name="existing_pdf" value="<?php echo $row['pdf']; ?>">

    Title:<br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>"><br>

    Description:<br>
    <textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea><br>

    Category:<br>
    <input type="text" name="category" value="<?php echo htmlspecialchars($row['category']); ?>"><br>

    Year:<br>
    <input type="number" name="year" value="<?php echo $row['year']; ?>"><br>

    Image:<br>
    <input type="file" name="image"><br>
    <img src="<?php echo htmlspecialchars($row['image']); ?>" width="120"><br>

    PDF:<br>
    <input type="file" name="pdf"><br>
    <?php if (!empty($row['pdf'])): ?>
        <a href="<?php echo htmlspecialchars($row['pdf']); ?>" target="_blank">
            View PDF
        </a>
    <?php endif; ?>
    <br><br>

    <input type="submit" name="update_portfolio" value="Update">
    |
    <a href="portfolio_update_form.php?delete=<?php echo $row['id']; ?>"
       onclick="return confirm('Delete this portfolio?')">
       Delete
    </a>

</form>
<?php endwhile; ?>

</body>
</html>
