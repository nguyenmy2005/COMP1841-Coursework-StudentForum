<?php
require 'includes/db_connect.php';
require 'includes/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            $error = 'This email is already registered.';
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'student')");
            $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

            header("Location: login.php");
            exit;
        }
    }
}

$pageTitle = 'Register';
include 'templates/header.php';
include 'templates/register_view.php';
include 'templates/footer.php';
?>