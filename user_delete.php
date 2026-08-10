<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$id = $_POST['id'] ?? 0;

if ((int)$id === (int)$_SESSION['user_id']) {
    header("Location: user_list.php?error=self_delete");
    exit;
}

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: user_list.php");
exit;
?>