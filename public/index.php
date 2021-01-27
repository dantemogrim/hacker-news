<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/header.php';

// Is the user logged in?
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;

if (isset($_GET['new'])) {
    $allPosts = fetchAllPosts($pdo);
} else if (isset($_GET['top'])) {
    $allPosts = fetchAllSmiles($pdo);
} else {
    $allPosts = fetchAllPosts($pdo);
};

?>

<h1 class="main-welcome">🌐 Hacker News 🌐</h1>
<h4 class="main-welcome">Here's the scoop for today:</h4>
<br>

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

    <!-- Article content. -->
    <div class="card">
        <h5 class="card-header"> <small class="tiny-text">URL:</small> 🔗
            <a class="post-title-link" href="<?= $articlePost['link']; ?>" target=”_blank”><?= $articlePost['title']; ?></a>
        </h5>
        <div class="card-body">
            <p class="card-text"><?= $articlePost['description']; ?></p>
            <span class="badge bg-dark author-tag">Posted by: <?= $singlePostAuthor['username']; ?> @ <?= $articlePost['created_at']; ?></span>
            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="d-flex align-items-center">
                    <div class="votes">
                        <button class="smile" data-id="<?= $articlePost['id'] ?>">
                            <span class="badge rounded-pill bg-warning text-dark"><img class="like-icon" src="/public/resources/media/icons/smiley.png"></span>
                        </button>
                        <span class="smiles"><?= fetchSmileAmount($articlePost['id'], $pdo) ?> smiles</span>
                        <a class="" href="/public/front/comments/gui-cmnt-section.php?post_id=<?= $articlePost['id'] ?>">Comment Section</a>
                    </div>
                </div>
            </div>

            <?php if ($ownedBy) : ?>
                <!-- Edit if user is publisher. -->
                <div class="d-flex flex-row bd-highlight mb-3">
                    <form action="/public/front/posts/gui-change-posts.php" method="post">
                        <input type="hidden" name="post_id" id="post_id" value="<?= $articlePost['id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $articlePost['user_id']; ?>">
                        <button type="submit" class="btn btn-light p-2 bd-highlight"><img class="like-icon" src="/public/resources/media/icons/pencil.png"></button>
                    </form>
                    <!-- Delete. -->
                    <form action="/public/back/posts/delete-post.php" method="post">
                        <input type="hidden" name="post_id" id="post_id" value="<?= $articlePost['id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $articlePost['user_id']; ?>">
                        <button type="submit" class="btn btn-light p-2 bd-highlight"><img class="like-icon" src="/public/resources/media/icons/trash.png"></button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <br>

<?php endforeach; ?>

<?php require __DIR__ . '/footer.php'; ?>
