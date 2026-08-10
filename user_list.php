<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$error = $_GET['error'] ?? '';

$pageTitle = 'Users';
include 'templates/header.php';
include 'templates/user_list_view.php';
include 'templates/footer.php';
?>