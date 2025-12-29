<?php
require 'db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $course = $_POST['course'];

        $sql = "INSERT INTO students (name, email, course) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $execute = $stmt->execute([$name, $email, $course]);

        if ($execute) {
            echo "<p class='success'>Student Details Successfully Added</p>";
        }
    }
} catch (PDOException $e) {
    die("SQL Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Student Records</a>
        <div class="nav-links">
            <a href="index.php" class="nav-link">Home</a>
            <a href="read.php" class="nav-link">View All</a>
            <a href="create.php" class="nav-link active">Add Student</a>
        </div>
    </div>
</nav>

<h2>Student Details Form</h2>

<form method="POST">
    Student Name:
    <input type="text" name="name" required>

    Email:
    <input type="email" name="email" required>

    Course:
    <input type="text" name="course" required>

    <button type="submit">Submit</button>
</form>

<a href="index.php" class="back">Go Back</a>

</body>
</html>
