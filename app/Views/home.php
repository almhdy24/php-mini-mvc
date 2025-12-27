<h1><?= htmlspecialchars($message) ?></h1>

<?php if (!empty($users)): ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= htmlspecialchars($user['email'] ?? 'No email') ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>