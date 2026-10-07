<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Home</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <?= view('partials/nav') ?>

    <h1>Point-of-Sale System</h1>
    <p>Welcome to the CodeIgniter POS application.</p>

    <?php if (session()->get('logged_in')): ?>
        <p>
            You are logged in as
            <strong><?= esc(session()->get('full_name')) ?></strong>.
        </p>
    <?php else: ?>
        <p>
            <a href="<?= site_url('login') ?>">Log in</a>
            to manage customer and user accounts.
        </p>
    <?php endif; ?>
</body>
</html>