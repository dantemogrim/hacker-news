<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/views/header.php';
// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/gui-login.php');
endif;

// Checking if e-mail already exists in database.
$posts = $pdo->prepare('SELECT * FROM posts');
$posts->execute();
$allPosts = $posts->fetchAll(PDO::FETCH_ASSOC);

print_r($allPosts);

?>

<article>

    <?php if (isset($_SESSION['loggedIn'])) : ?>
        <p>MAIN PAGE - ALL ARTICLES GO HERE</p>
    <?php endif; ?>
</article>

<article>(NEWS FEED)</article>

<article>
    <p>
        Title:
    </p>
    <p>
        Article:
    </p>
    <p>
        Link:
    </p>
    <p>
        Date:
    </p>
</article>










<?php require __DIR__ . '/views/footer.php'; ?>