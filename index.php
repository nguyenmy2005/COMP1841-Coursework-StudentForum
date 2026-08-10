<?php
require 'includes/db_connect.php';
require 'includes/functions.php';

$search = $_GET['q'] ?? '';

if (!empty($search)) {
    $stmt = $pdo->prepare("SELECT posts.*, users.username, modules.module_name 
                          FROM posts 
                          JOIN users ON posts.user_id = users.id 
                          JOIN modules ON posts.module_id = modules.id
                          WHERE posts.title LIKE ? OR posts.content LIKE ?
                          ORDER BY posts.created_at DESC");
    $stmt->execute(["%$search%", "%$search%"]);
} else {
    $stmt = $pdo->query("SELECT posts.*, users.username, modules.module_name 
                          FROM posts 
                          JOIN users ON posts.user_id = users.id 
                          JOIN modules ON posts.module_id = modules.id
                          ORDER BY posts.created_at DESC");
}

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$postCount = $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();
$moduleCount = $pdo->query("SELECT COUNT(*) FROM modules")->fetchColumn();
$userCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

$showStats = isLoggedIn() && isAdmin();

$pageTitle = 'Student Forum';
include 'templates/header.php';
include 'templates/index_view.php';
include 'templates/footer.php';
?>