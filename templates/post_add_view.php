<h1>Add new post</h1>

<?php if ($error): ?>
    <p style="color:#A63A2E; font-weight:700; border:2px solid #A63A2E; padding:12px; margin-bottom:20px;">
        <?php echo $error; ?>
    </p>
<?php endif; ?>

<div class="form-card">
    <form method="POST" action="post_add.php" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>

        <select name="module_id" required>
            <option value="">-- Select Module --</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?php echo $module['id']; ?>"><?php echo $module['module_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
        <p style="font-size:12px; color:#6B7A88;">Accepted: JPG, PNG, GIF (Max 5MB)</p>

        <button type="submit" class="btn">Add post</button>
    </form>
</div>