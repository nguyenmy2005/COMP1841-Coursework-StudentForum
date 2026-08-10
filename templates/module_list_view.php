<h1>Modules</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Module name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($modules as $module): ?>
            <tr>
                <td><?php echo $module['id']; ?></td>
                <td><?php echo $module['module_name']; ?></td>
                <td>
                    <a class="action-link" href="module_edit.php?id=<?php echo $module['id']; ?>">Edit</a>
                    <form method="POST" action="module_delete.php" style="display:inline;" onsubmit="return confirm('Delete this module?')">
                        <input type="hidden" name="id" value="<?php echo (int)$module['id']; ?>">
                        <button type="submit" class="action-link delete" style="font-family:inherit;cursor:pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <a href="module_add.php" class="btn">Add new module</a>