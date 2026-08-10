<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireLogin();

$id = $_POST['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($post && (isAdmin() || $post['user_id'] == $_SESSION['user_id'])) {
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: post_list.php");
exit;
?>