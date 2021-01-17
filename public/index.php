<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/header.php';
// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/views/gui-login.php');
endif;


// Checking if e-mail already exists in database.
$posts = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
$posts->execute();
$allPosts = $posts->fetchAll(PDO::FETCH_ASSOC);



// print_r($allPosts);
?>

<h1>HACKER NEWS - ARTICLES</h1>

<?php foreach ($allPosts as $articlePost) : ?>
    <?php $postAuthor = $pdo->prepare('SELECT username FROM users WHERE id = :user_id');
    $postAuthor->bindParam(':user_id', $articlePost['user_id'], PDO::PARAM_STR);
    $postAuthor->execute();
    $singlePostAuthor = $postAuthor->fetch(PDO::FETCH_ASSOC);

    ?>


    <div class="card">
        <h5 class="card-header"><a class="post-title-link" href="<?= $articlePost['link']; ?>"><?= $articlePost['title']; ?></a></h5>
        <div class="card-body">
            <p class="card-text"><?= $articlePost['content']; ?></p>
            <span class="badge bg-warning text-dark">By: <?= $singlePostAuthor['username']; ?> @ <?= $articlePost['created_at']; ?></span>
            <span class="badge bg-success"><img class="smiley" src="/public/resources/media/icons/smiley.png"> (amount) smiles</span>
            <a href="/public/views/gui-comments.php">comments</a>
        </div>
    </div>

    <br>


<?php endforeach; ?>

<?php require __DIR__ . '/footer.php'; ?>