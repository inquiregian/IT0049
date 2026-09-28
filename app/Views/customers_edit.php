<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/customers">Customer Accounts</a>
        <a href="/users">User Accounts</a>
    </nav>

    <h1>Edit Customer</h1>

    <?php if (validation_errors()): ?>
        <div class="validation-errors">
            <?= validation_list_errors() ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('customers/' . $customer['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc(old('full_name', $customer['full_name'])) ?>"
                maxlength="100"
                required
            >
        </div>

        <div>
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc(old('email', $customer['email'])) ?>"
                maxlength="100"
                required
            >
        </div>

        <div>
            <label for="phone">Phone Number</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= esc(old('phone', $customer['phone'])) ?>"
                maxlength="20"
            >
        </div>

        <button type="submit">Update Customer</button>
        <a href="<?= site_url('customers') ?>">Cancel</a>
    </form>
</body>

</html>