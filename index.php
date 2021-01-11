<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/views/header.php';
if (isset($_SESSION['loggedIn'])) {
    print_r($_SESSION['loggedIn']);
    // Array with user info from the 'logged in' session.
} else {
    echo 'You wanna see some news? Ya gotta\' log in first, ya silly!';
}
?>

<article>
    <h1><?php echo $config['title']; ?></h1>

    <?php if (isset($_SESSION['loggedIn'])) : ?>
        <p>Welcome, <?php echo $_SESSION['loggedIn']['username']; ?>!
            You are officially logged in.</p>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>