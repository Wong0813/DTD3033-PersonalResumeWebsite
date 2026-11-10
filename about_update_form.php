<?php
include 'databaseLink.php';

$result = mysqli_query($conn, "SELECT * FROM about WHERE id = 2");
$data = mysqli_fetch_assoc($result);
$skills = json_decode($data['skills'], true);

if(isset($_POST['update_about'])){
    $subtitle = $_POST['subtitle'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $experience = $_POST['experience'];
    $degree = $_POST['degree'];
    $university = $_POST['university'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $availability = $_POST['availability'];
    $skills_json = $_POST['skills']; // JSON data

    $stmt = $conn->prepare("UPDATE about SET subtitle=?, title=?, description=?, experience=?, degree=?, university=?, email=?, phone=?, availability=?, skills=? WHERE id=2");
    $stmt->bind_param("ssssssssss", $subtitle, $title, $description, $experience, $degree, $university, $email, $phone, $availability, $skills_json);

    if($stmt->execute()){
        header("Location: about.php"); // after refresh back to about.php
        exit;
    } else {
        echo "Error updating: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update About</title>
</head>
<body>
<h2>Update About Section</h2>
<form method="post">
    Subtitle:<br>
    <input type="text" name="subtitle" value="<?php echo htmlspecialchars($data['subtitle']); ?>"><br>
    Title:<br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($data['title']); ?>"><br>
    Description:<br>
    <textarea name="description" rows="5"><?php echo htmlspecialchars($data['description']); ?></textarea><br>
    Experience:<br>
    <input type="text" name="experience" value="<?php echo htmlspecialchars($data['experience']); ?>"><br>
    Degree:<br>
    <input type="text" name="degree" value="<?php echo htmlspecialchars($data['degree']); ?>"><br>
    University:<br>
    <input type="text" name="university" value="<?php echo htmlspecialchars($data['university']); ?>"><br>
    Email:<br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>"><br>
    Phone:<br>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($data['phone']); ?>"><br>
    Availability:<br>
    <input type="text" name="availability" value="<?php echo htmlspecialchars($data['availability']); ?>"><br><br>

    <!-- skills JSON edit-->
    Skills JSON:<br>
    <textarea name="skills" rows="10"><?php echo json_encode($skills, JSON_PRETTY_PRINT); ?></textarea><br><br>

    <input type="submit" name="update_about" value="Update">
</form>
</body>
</html>
