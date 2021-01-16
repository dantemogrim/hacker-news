<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/public/index.php"><?php echo $config['title']; ?></a>
    <ul class="navbar-nav">

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/views/gui-profile.php' ? 'active' : ''; ?>" href="/public/views/gui-profile.php"><?php echo $_SESSION['loggedIn']['username']; ?></a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/views/gui-add-post.php' ? 'active' : ''; ?>" href="/public/views/gui-add-post.php">Add Post</a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '' ? 'active' : ''; ?>" href="#">Feed</a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <?php if (isset($_SESSION['loggedIn'])) : ?>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/views/gui-register.php' ? 'active' : ''; ?>" href="/views/gui-register.php">Register</a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/views/faq.php' ? 'active' : ''; ?>" href="/public/views/faq.php">FAQ</a>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <?php if (isset($_SESSION['loggedIn'])) : ?>
                <a class="nav-link" href="/public/app/users/logout.php">Logout</a>
            <?php else : ?>
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/views/gui-login.php' ? 'active' : ''; ?>" href="/public/views/gui-login.php">Login</a>
            <?php endif; ?>
        </li><!-- /nav-item -->

    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
