<h1>Login</h1>

        <div class="form-card">
            <?php if ($error): ?>
                <p style="color:#A63A2E;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form method="POST" action="login.php">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>