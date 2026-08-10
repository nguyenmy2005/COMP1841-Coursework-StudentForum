<h1>Register</h1>

        <div class="form-card">
            <?php if ($error): ?>
                <p style="color:#A63A2E;"><?php echo $error; ?></p>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <input type="text" name="username" placeholder="Full name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Set password" minlength="6" required>
                <input type="password" name="confirm_password" placeholder="Confirm password" minlength="6" required>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>