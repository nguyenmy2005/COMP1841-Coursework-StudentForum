<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireLogin();

if (isAdmin()) {
    $stmt = $pdo->query("SELECT posts.*, users.username, modules.module_name 
                          FROM posts 
                          JOIN users ON posts.user_id = users.id 
                          JOIN modules ON posts.module_id = modules.id");
} else {
    $stmt = $pdo->prepare("SELECT posts.*, users.username, modules.module_name 
                           FROM posts 
                           JOIN users ON posts.user_id = users.id 
                           JOIN modules ON posts.module_id = modules.id
                           WHERE posts.user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
}

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Posts';
include 'templates/header.php';
include 'templates/post_list_view.php';
include 'templates/footer.php';
?>