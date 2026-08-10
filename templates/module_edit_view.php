<h1>Edit module</h1>

        <div class="form-card">
            <form method="POST" action="module_edit.php?id=<?php echo $module['id']; ?>">
                <input type="text" name="module_name" value="<?php echo $module['module_name']; ?>" required>
                <button type="submit" class="btn">Update</button>
            </form>
        </div>