<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

try {
    $sql = "DELETE FROM students WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header("Location: index.php?deleted=1");
    exit();
} catch (PDOException $e) {
    die("Delete failed: " . $e->getMessage());
}
