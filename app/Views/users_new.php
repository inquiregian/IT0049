<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <?= view('partials/nav') ?>

    <h1>Add New User</h1>

    <?php if (validation_errors()): ?>
        <div class="validation-errors">
            <?= validation_list_errors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username')) ?>"
                maxlength="50"
                autocomplete="username"
                required
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name')) ?>"
                maxlength="100"
                required
            >
        </div>

        <div>
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                autocomplete="new-password"
                required
            >
        </div>

        <div>
            <label for="password_confirm">Confirm Password</label>
            <input
                type="password"
                id="password_confirm"
                name="password_confirm"
                minlength="8"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit">Save User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>
</body>
</html>