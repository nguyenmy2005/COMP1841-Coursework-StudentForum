<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireLogin();

$sent = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_SESSION['username'];
    $email = $_SESSION['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);

    $sent = true;
}

$pageTitle = 'Contact';
include 'templates/header.php';
include 'templates/contact_view.php';
include 'templates/footer.php';
?>