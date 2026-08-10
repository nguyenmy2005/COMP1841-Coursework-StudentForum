<?php
require 'includes/db_connect.php';
require 'includes/functions.php';
requireLogin();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $module_id = $_POST['module_id'] ?? '';
    
    $errors = [];
    
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
        $image_name = null;
        $image_error = '';

        if ($_FILES['image']['name'] != '') {
            if (!is_dir('uploads')) {
                mkdir('uploads', 0755, true);
            }
            
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            $max_size = 5 * 1024 * 1024;
            
            $file_type = $_FILES['image']['type'];
            if (!in_array($file_type, $allowed_types)) {
                $image_error = 'Only JPG, PNG, GIF allowed!';
            }
            elseif ($_FILES['image']['size'] > $max_size) {
                $image_error = 'File too large (max 5MB)!';
            }
            else {
                $image_name = time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image_name);
            }
        }

        if ($image_error) {
            $error = $image_error;
        } else {
            $user_id = $_SESSION['user_id'];

            $stmt = $pdo->prepare("INSERT INTO posts (title, content, image, user_id, module_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$title, $content, $image_name, $user_id, $module_id]);

            sleep(1);
            echo "Success! <a href='post_list.php'>Click here</a>";
        }
    }
}

$modules = $pdo->query("SELECT * FROM modules")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Add Post';
include 'templates/header.php';
include 'templates/post_add_view.php';
include 'templates/footer.php';
?>