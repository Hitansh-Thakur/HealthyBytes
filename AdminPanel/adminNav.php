<div class="container my-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/admin.php') ? 'active' : ''; ?>"
                href="/HealthyBytes/admin.php">Salads</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/insert.php') ? 'active' : ''; ?>"
                href="/HealthyBytes/AdminPanel/insert.php">Insert</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/HealthyBytes/AdminPanel/users.php') ? 'active' : ''; ?>" href="/HealthyBytes/AdminPanel/users.php">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
        </li>
    </ul>
</div>