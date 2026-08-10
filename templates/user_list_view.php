<h1>Users</h1>

<?php if ($error === 'self_delete'): ?>
    <p style="color:#A63A2E; font-weight:700; border:2px solid #A63A2E; padding:12px; margin-bottom:20px;">
        You cannot delete your own admin account.
    </p>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['role']; ?></td>
        <td>
            <a class="action-link" href="user_edit.php?id=<?php echo $user['id']; ?>">Edit</a>
            <?php if ((int)$user['id'] !== (int)$_SESSION['user_id']): ?>
                <form method="POST" action="user_delete.php" style="display:inline;" onsubmit="return confirm('Delete this user?')">
                    <input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
                    <button type="submit" class="action-link delete" style="font-family:inherit;cursor:pointer;">Delete</button>
                </form>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="user_add.php" class="btn">Add new user</a>