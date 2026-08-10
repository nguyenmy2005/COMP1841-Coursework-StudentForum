<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireAdmin();

$modules = $pdo->query("SELECT * FROM modules")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Modules';
include 'templates/header.php';
include 'templates/module_list_view.php';
include 'templates/footer.php';
?>