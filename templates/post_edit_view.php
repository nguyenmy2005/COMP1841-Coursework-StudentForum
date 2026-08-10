<h1>Edit post</h1>

        <?php if (!empty($error)): ?>
            <p style="color:#A63A2E; font-weight:700; border:2px solid #A63A2E; padding:12px; margin-bottom:20px;">
                <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <div class="form-card">
            <form method="POST" action="post_edit.php?id=<?php echo $post['id']; ?>" enctype="multipart/form-data">
                <input type="text" name="title" value="<?php echo $post['title']; ?>" required>
                <textarea name="content" required><?php echo $post['content']; ?></textarea>

                <select name="module_id" required>
                    <?php foreach ($modules as $module): ?>
                        <option value="<?php echo $module['id']; ?>" <?php if ($module['id'] == $post['module_id']) echo 'selected'; ?>>
                            <?php echo $module['module_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if (isAdmin()): ?>
                    <select name="user_id" required>
                        <?php foreach ($users as $user): ?>
                            <option value="<?php echo $user['id']; ?>" <?php if ($user['id'] == $post['user_id']) echo 'selected'; ?>>
                                <?php echo $user['username']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>

                <?php if ($post['image']): ?>
                    <img src="uploads/<?php echo $post['image']; ?>" width="80"><br><br>
                <?php endif; ?>

                <input type="file" name="image">

                <button type="submit" class="btn">Update</button>
            </form>
        </div>