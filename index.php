<?php
require 'db.php';

try {
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Students Details not found: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records - Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">Student Records</a>
        <div class="nav-links">
            <a href="index.php" class="nav-link active">Home</a>
            <a href="read.php" class="nav-link">View All</a>
            <a href="create.php" class="nav-link">Add Student</a>
        </div>
    </div>
</nav>

<h2>Student Records</h2>

<?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
    <p class="success">Student Deleted Successfully</p>
<?php endif; ?>

<a href="create.php" class="add">Add Student</a>

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php if (empty($students)): ?>
    <tr>
        <td colspan="5" style="text-align: center; padding: 40px; color: #8b5a7a;">
            No students found. <a href="create.php">Add your first student</a>
        </td>
    </tr>
    <?php else: ?>
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
    <?php endif; ?>
</table>

</body>
</html>

