<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?= view('partials/nav') ?>

    <h1>Edit User</h1>

    <?php if (validation_errors()): ?>
        <div class="validation-errors">
            <?= validation_list_errors() ?>
        </div>
    <?php endif; ?>

    <?php if (! empty($user['avatar'])): ?>
        <div>
            <p>Current Profile Picture</p>
            <img
                class="avatar-preview"
                src="<?= base_url(
                    'uploads/avatars/' . rawurlencode($user['avatar'])
                ) ?>"
                alt="<?= esc($user['full_name']) ?> profile picture"
                width="150"
                height="150"
            >
        </div>
    <?php endif; ?>

    <form
        action="<?= site_url('users/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc(old('username', $user['username'])) ?>"
                maxlength="50"
                required
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name', $user['full_name'])) ?>"
                maxlength="100"
                required
            >
        </div>

        <div>
            <label for="avatar">Profile Picture</label>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
            >
            <small>JPG or PNG only. Maximum file size: 2 MB.</small>
        </div>

        <button type="submit">Update User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>
</body>

</html>