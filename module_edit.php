<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM modules WHERE id = ?");
$stmt->execute([$id]);
$module = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module_name = $_POST['module_name'];

    $stmt = $pdo->prepare("UPDATE modules SET module_name = ? WHERE id = ?");
    $stmt->execute([$module_name, $id]);

    header("Location: module_list.php");
    exit;
}

$pageTitle = 'Edit Module';
include 'templates/header.php';
include 'templates/module_edit_view.php';
include 'templates/footer.php';
?>