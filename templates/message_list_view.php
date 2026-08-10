<h1>Messages</h1>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Sent at</th>
            </tr>
            <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?php echo $msg['name']; ?></td>
                <td><?php echo $msg['email']; ?></td>
                <td><?php echo $msg['message']; ?></td>
                <td><?php echo $msg['created_at']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>