<nav>
    <a href="<?= site_url('/') ?>">Home</a>
    <a href="<?= site_url('about') ?>">About</a>

    <?php if (session()->get('logged_in')): ?>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('users') ?>">User Accounts</a>

        <span class="nav-user">
            <?= esc(session()->get('full_name')) ?>
        </span>

        <form action="<?= site_url('logout') ?>" method="post" class="logout-form">
            <?= csrf_field() ?>
            <button type="submit" class="logout-button">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?= site_url('login') ?>">Login</a>
    <?php endif; ?>
</nav>