<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/header.php';
// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;


// Fetching all posts from database.
//$posts = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
//$posts->execute();
//$allPosts = $posts->fetchAll(PDO::FETCH_ASSOC);

// print_r($allPosts);

// print_r(fetchPosts($pdo));
// $allPosts = $posts->fetchAll(PDO::FETCH_ASSOC);
$allPosts = fetchAllPosts($pdo);

?>

<h1>HACKER NEWS - ARTICLES</h1>

<?php foreach ($allPosts as $articlePost) : ?>
    <?php $postAuthor = $pdo->prepare('SELECT username FROM users WHERE id = :user_id');
    $postAuthor->bindParam(':user_id', $articlePost['user_id'], PDO::PARAM_STR);
    $postAuthor->execute();
    $singlePostAuthor = $postAuthor->fetch(PDO::FETCH_ASSOC);

    $ownedBy = false;
    if ($articlePost['user_id'] === $_SESSION['loggedIn']['id']) {
        $ownedBy = true;
    }

    ?>

    <div class="card">
        <h5 class="card-header"></h5>
        <a class="post-title-link" href="<?= $articlePost['link']; ?>"><?= $articlePost['title']; ?></a>
        </h5>
        <div class="card-body">
            <p class="card-text"><?= $articlePost['description']; ?></p>
            <span class="badge bg-warning text-dark">By: <?= $singlePostAuthor['username']; ?> @ <?= $articlePost['created_at']; ?></span>
            <!--<span class="badge bg-success"><img class="smiley" src="/public/resources/media/icons/smiley.png"> (amount) smiles</span> -->
            <!-- <img class="smiley" src="/public/resources/media/icons/smiley.png"> -->
            <form action="/public/back/posts/smiles.php" method="post">
                <button type="submit" aria-hidden="true">
                    <img class="smiley" src="/public/resources/media/icons/smiley.png">
                    <img class="smiley" src="/public/resources/media/icons/favicon.svg">
                </button>
            </form>

            <a href="/public/front/posts/gui-view-post.php?post_id=<?= $articlePost['id'] ?>">View Post</a>

            <?php if ($ownedBy) : ?>
                <p> Edit </p>
                <p> Delete </p>
            <?php endif; ?>
        </div>
    </div>

    <br>


<?php endforeach; ?>

<?php require __DIR__ . '/footer.php'; ?>
