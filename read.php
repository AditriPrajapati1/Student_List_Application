<?php
require 'db.php';

try {
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql);  //Query used caused we arre not passing the value which doesnot cause SQL injection so prepare and execute is not required
    $students = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Students Details not found: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Database Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Student Records</a>
        <div class="nav-links">
            <a href="index.php" class="nav-link">Home</a>
            <a href="read.php" class="nav-link active">View All</a>
            <a href="create.php" class="nav-link">Add Student</a>
        </div>
    </div>
</nav>

<h2>Student Records</h2>

<a href="create.php" class="add">Add Student</a>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= htmlspecialchars($student['name']) ?></td>
        <td><?= htmlspecialchars($student['email']) ?></td>
        <td><?= htmlspecialchars($student['course']) ?></td>
        <td>
            <a href="edit.php?id=<?= $student['id'] ?>">Edit</a>
        </td>
        <td>
            <a href="delete.php?id=<?= $student['id'] ?>"
               onclick="return confirm('Are you sure you want to delete?')">
               Delete
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>


