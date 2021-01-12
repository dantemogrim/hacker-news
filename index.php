<!-- The header is put together with autoload which activates
the essential functionality of the site. -->
<?php require __DIR__ . '/views/header.php';
// Check if the user is logged in - otherwise redirect.
if (!isset($_SESSION['loggedIn'])) :
    redirect('/gui-login.php');
endif;


// Checking if e-mail already exists in database.
$posts = $pdo->prepare('SELECT * FROM posts ORDER BY created_at DESC');
$posts->execute();
$allPosts = $posts->fetchAll(PDO::FETCH_ASSOC);



// print_r($allPosts);
?>

<p>MAIN PAGE - ALL ARTICLES GO HERE</p>

<?php foreach ($allPosts as $articlePost) : ?>

    <?php $postAuthor = $pdo->prepare('SELECT username FROM users WHERE id = :user_id');
    $postAuthor->bindParam(':user_id', $articlePost['user_id'], PDO::PARAM_STR);
    $postAuthor->execute();
    $singlePostAuthor = $postAuthor->fetch(PDO::FETCH_ASSOC);

    ?>
    <p>


    </p>

    <div class="card">
        <h5 class="card-header"><?= $singlePostAuthor['username']; ?></h5>
        <div class="card-body">
            <h5 class="card-title"><?= $articlePost['title']; ?></h5>
            <p class="card-text"><?= $articlePost['content']; ?></p>
            <a href="<?= $articlePost['link']; ?>" target="_blank">Source Code: <?= $articlePost['link']; ?></a>
            <a href="#" class="btn btn-primary">Read More</a>
            <p>Created:<?= $articlePost['created_at']; ?></p>
        </div>
    </div>

    <br>

<?php endforeach; ?>

<?php require __DIR__ . '/views/footer.php'; ?>