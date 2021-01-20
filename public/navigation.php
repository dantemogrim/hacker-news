<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/public/index.php"><?php echo $config['title']; ?></a>
    <ul class="navbar-nav">

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/front/users/gui-profile.php' ? 'active' : ''; ?>" href="/public/front/users/gui-profile.php">
                    <?php $path = '/public/back/users/avatars/store/'; ?>
                    <img class="navatar" src="<?= $path . $_SESSION['loggedIn']['avatar']; ?>">
                    <?php echo $_SESSION['loggedIn']['username']; ?></a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <?php if (isset($_SESSION['loggedIn'])) : ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/front/posts/gui-add-post.php' ? 'active' : ''; ?>" href="/public/front/posts/gui-add-post.php">Add Post</a>
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
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/front/users/gui-ls-register.php' ? 'active' : ''; ?>" href="/public/front/users/gui-ls-register.php">Register</a>
            </li><!-- /nav-item -->
        <?php endif; ?>

        <li class="nav-item">
            <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/front/faq.php' ? 'active' : ''; ?>" href="/public/front/faq.php">FAQ</a>
        </li><!-- /nav-item -->

        <li class="nav-item">
            <?php if (isset($_SESSION['loggedIn'])) : ?>
                <a class="nav-link" href="/public/back/users/logout.php">Logout</a>
            <?php else : ?>
                <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/public/front/users/gui-ls-login.php' ? 'active' : ''; ?>" href="/public/front/users/gui-ls-login.php">Login</a>
            <?php endif; ?>
        </li><!-- /nav-item -->

    </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->
