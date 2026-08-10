<h1><?php echo isAdmin() ? 'Manage All Posts' : 'My Posts'; ?></h1>

<?php if (empty($posts)): ?>
    <p style="color:#6B7A88; font-weight:700; font-size:16px; margin-bottom:30px;">
        <?php if (isAdmin()): ?>
            No posts have been submitted yet.
        <?php else: ?>
            No posts yet. <a href="post_add.php" style="color:#EA580C;">Create your first post</a>
        <?php endif; ?>
    </p>
<?php else: ?>
    <div class="feed">
        <?php foreach ($posts as $post): ?>
            <div class="feed-item">
                <div class="feed-meta">
                    <span>Posted by <strong><?php echo htmlspecialchars($post['username']); ?></strong></span>
                    <span class="module-tag"><?php echo htmlspecialchars($post['module_name']); ?></span>
                </div>

                <div class="feed-card">
                    <?php if ($post['image']): ?>
                        <img src="uploads/<?php echo htmlspecialchars($post['image']); ?>" class="feed-image" alt="Image for post: <?php echo htmlspecialchars($post['title']); ?>">
                    <?php endif; ?>

                    <div class="feed-body">
                        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p><?php echo htmlspecialchars($post['content']); ?></p>
                        
                        <?php if (isAdmin() || $post['user_id'] == $_SESSION['user_id']): ?>
                            <div style="margin-top:12px;">
                                <a class="action-link" href="post_edit.php?id=<?php echo $post['id']; ?>">Edit</a>
                                <form method="POST" action="post_delete.php" style="display:inline;" onsubmit="return confirm('Delete this post?')">
                                    <input type="hidden" name="id" value="<?php echo (int)$post['id']; ?>">
                                    <button type="submit" class="action-link delete" style="font-family:inherit;cursor:pointer;">Delete</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div style="margin-top:30px; display:flex; gap:12px;">
    <?php if (!isAdmin()): ?>
        <a href="post_add.php" class="btn">Add new post</a>
    <?php endif; ?>
    <a href="index.php" class="btn" style="background:#94A3B8;">Back Home</a>
</div>