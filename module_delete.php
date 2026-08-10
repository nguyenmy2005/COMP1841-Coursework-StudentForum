<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$id = $_POST['id'] ?? 0;

$stmt = $pdo->prepare("DELETE FROM modules WHERE id = ?");
$stmt->execute([$id]);

header("Location: module_list.php");
exit;
?>