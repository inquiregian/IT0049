<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customer Accounts</a>
        <a href="/users">User Accounts</a>
    </nav>

    <h1>User Accounts</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p class="success-message">
            <?= esc(session()->getFlashdata('success')) ?>
        </p>
    <?php endif; ?>

    <p>
        <a class="button" href="<?= site_url('users/new') ?>">
            Add User
        </a>
    </p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <?php
                    $avatarUrl = ! empty($user['avatar'])
                        ? base_url(
                            'uploads/avatars/'
                            . rawurlencode($user['avatar'])
                        )
                        : base_url('images/avatar-placeholder.svg');
                ?>

                <tr>
                    <td>
                        <img
                            class="user-avatar"
                            src="<?= $avatarUrl ?>"
                            alt="<?= esc($user['full_name']) ?> avatar"
                            width="60"
                            height="60"
                        >
                    </td>

                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['created_at']) ?></td>

                    <td>
                        <a href="<?= site_url(
                            'users/' . $user['id'] . '/edit'
                        ) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>