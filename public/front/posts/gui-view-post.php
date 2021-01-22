<?php

require __DIR__ . '../../../header.php';


if (isset($_GET['post_id'])) {
    $postId = (int)filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $post = fetchOnePost($postId, $pdo);
    $postComments = fetchPostComments($postId, $pdo);
} else {
    // redirect user
}

?>

<div class="card">
    <h5 class="card-header">
        <a class="post-title-link" href="<?= $post['link']; ?>"><?= $post['title']; ?></a>
    </h5>
    <div class="card-body">
        <p class="card-text"><?= $post['description']; ?></p>
        <span class="badge bg-warning text-dark">By: <?= fetchAlias($post['user_id'], $pdo) ?> <?= $post['created_at']; ?></span>
        <span class="badge bg-success"><img class="smiley" src="/public/resources/media/icons/smiley.png"> (amount) smiles</span>
    </div>
    <form action="/public/back/comments/add-comment.php" method="post">
        <div class="form-group">
            <label for="comment">
                <h3>Comment this post:</h3>
            </label>
            <textarea class="form-control" type="text" name="comment" id="comment" rows="3" placeholder="Your text here." required></textarea>
            <input type="hidden" name="post_id" id="post_id" value="<?= $postId ?>">
            <small>(max x characters long)</small>
        </div><!-- /form-group -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php foreach ($postComments as $postComment) : ?>
    <div class="card">
        <h5 class="card-header">by: <?= fetchAlias($postComment['user_id'], $pdo); ?></h5>
        <div class="card-body">
            <p class="card-text"><?= $postComment['text']; ?></p>
        </div>
    </div>

    <br>
<?php endforeach ?>


<?php require __DIR__ . '/../../footer.php'; ?>
