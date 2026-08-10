<h1>Edit user</h1>

        <div class="form-card">
            <form method="POST" action="user_edit.php?id=<?php echo $user['id']; ?>">
                <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

                <select name="role" required>
                    <option value="student" <?php if ($user['role'] == 'student') echo 'selected'; ?>>student</option>
                    <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>admin</option>
                </select>

                <button type="submit" class="btn">Update</button>
            </form>
        </div>