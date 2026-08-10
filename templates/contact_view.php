<h1>Contact admin</h1>

<div class="form-card">
    <?php if ($sent): ?>
        <p style="color:#059669; font-weight:700;">Message sent successfully.</p>
    <?php endif; ?>

    <form method="POST" action="contact.php">
        <p style="color:#334155; margin-bottom:14px; font-weight:700;">
            Sending as: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
        </p>

        <textarea name="message" placeholder="Your message" required></textarea>
        <button type="submit" class="btn">Send</button>
    </form>
</div>