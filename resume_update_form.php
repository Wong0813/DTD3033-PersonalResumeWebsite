<?php
include 'databaseLink.php';

// 获取数据库数据用于表单显示
$result = mysqli_query($conn, "SELECT * FROM resume WHERE id = 1");
$data = mysqli_fetch_assoc($result);

// 提交表单更新
if(isset($_POST['update_resume'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $career_goals = $_POST['career_goals'];
    $experience_json = $_POST['experience'];
    $education_json = $_POST['education'];
    $skills_json = $_POST['skills'];

    $stmt = $conn->prepare("UPDATE resume SET title=?, subtitle=?, description=?, career_goals=?, experience=?, education=?, skills=? WHERE id=1");
    $stmt->bind_param("sssssss", $title, $subtitle, $description, $career_goals, $experience_json, $education_json, $skills_json);

    if($stmt->execute()){
        header("Location: resume.php"); // 更新后跳回 resume.php
        exit();
    } else {
        echo "Error updating resume: " . $conn->error;
    }
    $stmt->close();
}
?>

<div class="container mt-5">
  <h4>Update Resume Section</h4>
  <form method="POST" action="resume_update_form.php">

    <label>Title</label>
    <input type="text" name="title" class="form-control mb-2" value="<?php echo htmlspecialchars($data['title']); ?>" required>

    <label>Subtitle</label>
    <input type="text" name="subtitle" class="form-control mb-2" value="<?php echo htmlspecialchars($data['subtitle']); ?>" required>

    <label>Description</label>
    <textarea name="description" class="form-control mb-2" rows="4"><?php echo htmlspecialchars($data['description']); ?></textarea>

    <label>Career Goals</label>
    <textarea name="career_goals" class="form-control mb-2" rows="4"><?php echo htmlspecialchars($data['career_goals']); ?></textarea>

    <label>Experience (JSON)</label>
    <textarea name="experience" class="form-control mb-2" rows="5"><?php echo htmlspecialchars($data['experience']); ?></textarea>

    <label>Education (JSON)</label>
    <textarea name="education" class="form-control mb-2" rows="5"><?php echo htmlspecialchars($data['education']); ?></textarea>

    <label>Skills (JSON)</label>
    <textarea name="skills" class="form-control mb-2" rows="5"><?php echo htmlspecialchars($data['skills']); ?></textarea>

    <button type="submit" name="update_resume" class="btn btn-primary">Update</button>
  </form>
</div>
