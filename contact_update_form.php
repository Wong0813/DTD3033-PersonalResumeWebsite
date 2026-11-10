<?php
include 'databaseLink.php';

/* =======================
   STORE CONTACT MESSAGE
======================= */
if (isset($_POST['submit_message'])) {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare(
        "INSERT INTO contact_messages (name, email, subject, message)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();
    $stmt->close();

    header("Location: contact.php");
    exit;
}

/* =======================
   READ CONTACT INFO
======================= */
$result = mysqli_query($conn, "SELECT * FROM contact_info WHERE id = 1");
$info = mysqli_fetch_assoc($result);

/* =======================
   UPDATE CONTACT INFO
======================= */
if (isset($_POST['update_contact_info'])) {

    $address = $_POST['address'];
    $phone   = $_POST['phone'];
    $email_info = $_POST['email_info'];

    $stmt = $conn->prepare(
        "UPDATE contact_info
         SET address = ?, phone = ?, email = ?
         WHERE id = 1"
    );
    $stmt->bind_param("sss", $address, $phone, $email_info);
    $stmt->execute();
    $stmt->close();

    header("Location: contact.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Contact</title>
</head>
<body>

<h2>Update Contact Information</h2>

<form method="post">
    Address:<br>
    <textarea name="address" required><?php echo htmlspecialchars($info['address']); ?></textarea><br><br>

    Phone:<br>
    <input type="text" name="phone"
           value="<?php echo htmlspecialchars($info['phone']); ?>" required><br><br>

    Email:<br>
    <input type="email" name="email_info"
           value="<?php echo htmlspecialchars($info['email']); ?>" required><br><br>

    <input type="submit" name="update_contact_info" value="Update Contact Info">
</form>

</body>
</html>
