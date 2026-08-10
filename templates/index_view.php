<div id="splashScreen">
    <div class="spinner"></div>
    <h2>Welcome to Student Forum</h2>
</div>

<?php if ($showStats): ?>
<div class="stat-strip">
    <div class="stat-block">
        <span class="stat-number"><?php echo $postCount; ?></span>
        <span class="stat-label">Questions</span>
    </div>
    <div class="stat-block">
        <span class="stat-number"><?php echo $moduleCount; ?></span>
        <span class="stat-label">Modules</span>
    </div>
    <div class="stat-block">
        <span class="stat-number"><?php echo $userCount; ?></span>
        <span class="stat-label">Students</span>
    </div>
</div>
<?php endif; ?>

<div class="form-card" style="margin-bottom:30px;">
    <form method="GET" style="display:flex; gap:10px;">
        <input 
            type="text" 
            name="q" 
            placeholder="Search posts..." 
            value="<?php echo htmlspecialchars($search); ?>"
            style="flex:1; margin-bottom:0; padding:12px 14px; border:2px solid #94A3B8; font-size:15px;"
        >
        <button type="submit" class="btn" style="margin-bottom:0; white-space:nowrap;">Search</button>
        <?php if (!empty($search)): ?>
            <a href="index.php" class="btn" style="background:#94A3B8; margin-bottom:0; white-space:nowrap;">Clear</a>
        <?php endif; ?>
    </form>
</div>

<?php if (!empty($search)): ?>
    <p style="color:#334155; margin-bottom:20px; font-weight:700;">
        Found <?php echo count($posts); ?> results for "<?php echo htmlspecialchars($search); ?>"
    </p>
<?php endif; ?>

<h2 class="section-title">List of questions</h2>

<div class="feed">
    <?php if (empty($posts)): ?>
        <p style="color:#6B7A88; font-weight:700;">No posts found.</p>
    <?php else: ?>
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
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>