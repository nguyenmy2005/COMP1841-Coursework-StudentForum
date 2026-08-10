<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$messages = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Messages';
include 'templates/header.php';
include 'templates/message_list_view.php';
include 'templates/footer.php';
?>