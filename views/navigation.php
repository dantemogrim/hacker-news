<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><?php echo $config['title']; ?></a>

  <ul class="navbar-nav">

    <?php if (isset($_SESSION['loggedIn'])) : ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?>" href="/index.php">Home</a>
      </li><!-- /nav-item -->
    <?php endif; ?>

    <?php if (isset($_SESSION['loggedIn'])) : ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/about.php' ? 'active' : ''; ?>" href="/about.php">About</a>
      </li><!-- /nav-item -->
    <?php endif; ?>

    <?php if (isset($_SESSION['loggedIn'])) : ?>
    <?php else : ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/gui-register.php' ? 'active' : ''; ?>" href="/gui-register.php">Register</a>
      </li><!-- /nav-item -->
    <?php endif; ?>

    <li class="nav-item">
      <?php if (isset($_SESSION['loggedIn'])) : ?>
        <a class="nav-link" href="/app/users/logout.php">Logout</a>
      <?php else : ?>
        <a class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>" href="/gui-login.php">Login</a>
      <?php endif; ?>
    </li><!-- /nav-item -->

  </ul><!-- /navbar-nav -->
</nav><!-- /navbar -->