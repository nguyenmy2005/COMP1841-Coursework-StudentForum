<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle ?? 'Student Forum'; ?></title>
    <link rel="stylesheet" href="style.css?v=12">
</head>
<body>

    <header class="site-header">
        <div class="brand">Student Forum</div>
        <nav>
            <a href="index.php" class="<?php echo isActivePage('index.php'); ?>">Home</a>
            <?php if (isLoggedIn()): ?>
                <a href="post_list.php" class="<?php echo isActivePage('post_list.php'); ?>">Manage Posts</a>
                <?php if (isAdmin()): ?>
                    <a href="user_list.php" class="<?php echo isActivePage('user_list.php'); ?>">Manage Users</a>
                    <a href="module_list.php" class="<?php echo isActivePage('module_list.php'); ?>">Manage Modules</a>
                    <a href="message_list.php" class="<?php echo isActivePage('message_list.php'); ?>">Manage Messages</a>
                <?php else: ?>
                    <a href="contact.php" class="<?php echo isActivePage('contact.php'); ?>">Contact</a>
                <?php endif; ?>
                <span class="nav-user">Hi, <?php echo $_SESSION['username']; ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="contact.php" class="<?php echo isActivePage('contact.php'); ?>">Contact</a>
                <a href="login.php" class="<?php echo isActivePage('login.php'); ?>">Login</a>
                <a href="register.php" class="<?php echo isActivePage('register.php'); ?>">Register</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="container">