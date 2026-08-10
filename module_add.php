<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $module_name = $_POST['module_name'];

    $stmt = $pdo->prepare("INSERT INTO modules (module_name) VALUES (?)");
    $stmt->execute([$module_name]);

    header("Location: module_list.php");
    exit;
}

$pageTitle = 'Add Module';
include 'templates/header.php';
include 'templates/module_add_view.php';
include 'templates/footer.php';
?>