<?php require __DIR__ . '/views/header.php'; ?>

<h1><?php echo $_SESSION['loggedIn']['username']; ?> </h1>

Avatar
<br>

Bio:
<br>

Posts:
<ul>Edit Posts</ul>
<br>

Comments:
<ul>Edit Comments</ul>
<br>

<a href="/gui-account-settings.php">
    Account Settings
</a>

<?php require __DIR__ . '/views/footer.php'; ?>