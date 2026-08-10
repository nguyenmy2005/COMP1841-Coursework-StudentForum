<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'student')");
    $stmt->execute([$username, $email, password_hash('123456', PASSWORD_DEFAULT)]);

    header("Location: user_list.php");
    exit;
}

$pageTitle = 'Add User';
include 'templates/header.php';
include 'templates/user_add_view.php';
include 'templates/footer.php';
?>