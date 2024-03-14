<div class="container my-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/admin.php') ? 'active' : ''; ?>"
                href="/HealthyBytes/AdminPanel/admin.php">Salads</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/insert.php') ? 'active' : ''; ?>"
                href="/HealthyBytes/AdminPanel/insert.php">Insert</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/users.php') ? 'active' : ''; ?>" href="/HealthyBytes/AdminPanel/users.php">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/orders.php') ? 'active' : ''; ?>" href="/HealthyBytes/AdminPanel/orders.php">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout.php">Logout</a>
        </li>
    </ul>
</div>