<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $email, $role, $id]);

    header("Location: user_list.php");
    exit;
}

$pageTitle = 'Edit User';
include 'templates/header.php';
include 'templates/user_edit_view.php';
include 'templates/footer.php';
?>