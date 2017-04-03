<nav>
<?php if (loggedIn()): ?>
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="index.php">Login</a>
    <a href="register.php">Register</a>
<?php endif; ?>
</nav>
