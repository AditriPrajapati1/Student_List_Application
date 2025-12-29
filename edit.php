<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Student ID not provided");
}

$id = $_GET['id'];

try {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $course, $id]);

        echo "<p class='success'>Student Updated Successfully</p>";
    }

    $sql = "SELECT * FROM students WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $student = $stmt->fetch();

    if (!$student) {
        die("Student not found");
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Student Records</a>
        <div class="nav-links">
            <a href="index.php" class="nav-link">Home</a>
            <a href="read.php" class="nav-link">View All</a>
            <a href="create.php" class="nav-link">Add Student</a>
        </div>
    </div>
</nav>

<h2>Edit Student Details</h2>

<form method="POST">
    Student Name:
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>

    Email:
    <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>

    Course:
    <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>

    <button type="submit">Update</button>
</form>

<a href="index.php" class="back">Go Back</a>

</body>
</html>
