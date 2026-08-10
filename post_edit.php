<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireLogin();

$id = $_GET['id'];
$error = '';

$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post || (!isAdmin() && $post['user_id'] != $_SESSION['user_id'])) {
    header("Location: post_list.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $module_id = $_POST['module_id'];
    $user_id = isAdmin() ? $_POST['user_id'] : $post['user_id'];

    $errors = [];
    if (strlen(trim($title)) < 3) {
        $errors[] = 'Title must be at least 3 characters.';
    }
    if (strlen(trim($title)) > 200) {
        $errors[] = 'Title must not exceed 200 characters.';
    }
    if (strlen(trim($content)) < 10) {
        $errors[] = 'Content must be at least 10 characters.';
    }
    if (empty($module_id)) {
        $errors[] = 'Please select a module.';
    }

    if (!empty($errors)) {
        $error = implode('<br>', $errors);
    } else {
        $image_name = $post['image'];

        if ($_FILES['image']['name'] != '') {
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $max_size = 5 * 1024 * 1024;
            $check = getimagesize($_FILES['image']['tmp_name']);

            if ($check === false || !in_array($_FILES['image']['type'], $allowed_types)) {
                $error = 'Only JPG, PNG, GIF allowed!';
            } elseif ($_FILES['image']['size'] > $max_size) {
                $error = 'File too large (max 5MB)!';
            } else {
                $old_image = $post['image'];
                $image_name = time() . '_' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image_name);

                if ($old_image && file_exists('uploads/' . $old_image)) {
                    unlink('uploads/' . $old_image);
                }
            }
        }

        if (empty($error)) {
            $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ?, image = ?, user_id = ?, module_id = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image_name, $user_id, $module_id, $id]);

            header("Location: post_list.php");
            exit;
        }
    }
}

$modules = $pdo->query("SELECT * FROM modules")->fetchAll(PDO::FETCH_ASSOC);
$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Edit Post';
include 'templates/header.php';
include 'templates/post_edit_view.php';
include 'templates/footer.php';
?>