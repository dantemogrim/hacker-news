<?php

require __DIR__ . '../../../header.php';


if (!isset($_SESSION['loggedIn'])) :
    redirect('/public/front/users/gui-ls-login.php');
endif;


if (isset($_GET['post_id'])) {
    $postId = (int)filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $post = fetchOnePost($postId, $pdo);
    $postComments = fetchPostComments($postId, $pdo);
} else {
    // redirect user
}

?>

<!-- Post. -->
<div class="card">
    <h5 class="card-header">
        <a class="post-title-link" href="<?= $post['link']; ?>"><?= $post['title']; ?></a>
    </h5>
    <div class="card-body">
        <p class="card-text"><?= $post['description']; ?></p>
        <span class="badge bg-dark">By: <?= fetchAlias($post['user_id'], $pdo) ?> <?= $post['created_at']; ?></span>
        <div class="votes">
            <button class="smile" data-id="<?= $post['id'] ?>">
                <span class="badge rounded-pill bg-warning text-dark"><img class="like-icon" src="/public/resources/media/icons/smiley.png"></span>
            </button>
            <span class="smiles"><?= fetchSmileAmount($post['id'], $pdo) ?> smiles</span>
            <a class="" href="/public/front/comments/gui-cmnt-section.php?post_id=<?= $post['id'] ?>">Comment Section</a>
        </div>
    </div>
</div>

<br>
<!-- Comment input field. -->
<form action="/public/back/comments/add-cmnt.php" method="post">
    <div class="form-group">
        <label for="comment">
            <h3>Comment this post:</h3>
        </label>
        <textarea class="form-control" type="text" name="comment" id="comment" rows="3" placeholder="Your text here." required></textarea>
        <input type="hidden" name="post_id" id="post_id" value="<?= $postId ?>" maxlength="300">
        <small>(300 characters maximum.)</small>
    </div><!-- /form-group -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>

<?php foreach ($postComments as $postComment) : ?>

    <?php
    $ownedBy = false;
    if ($postComment['user_id'] === $_SESSION['loggedIn']['id']) {
        $ownedBy = true;
    } ?>

    <!-- Comment card. -->
    <div class="card">
        <h5 class="card-header">by: <?= fetchAlias($postComment['user_id'], $pdo); ?></h5>
        <div class="card-body">
            <p class="card-text"><?= $postComment['text']; ?></p>

            <?php if ($ownedBy) : ?>
                <!-- Edit. -->
                <div class="d-flex flex-row bd-highlight mb-3">
                    <form action="/public/front/comments/gui-change-cmnt.php" method="post">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $postComment['user_id']; ?>">
                        <input type="hidden" name="comment_id" id="comment_id" value="<?= $postComment['id']; ?>">
                        <button type="submit" class="btn btn-light"><img class="like-icon" src="/public/resources/media/icons/pencil-bold.png"></button>
                    </form>
                    <!-- Delete. -->
                    <form action="/public/back/comments/delete-cmnt.php" method="post">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $postComment['user_id']; ?>">
                        <input type="hidden" name="comment_id" id="comment_id" value="<?= $postComment['id']; ?>">
                        <button type="submit" class="btn btn-light"><img class="like-icon" src="/public/resources/media/icons/eraser-bold.png"></button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <br>
<?php endforeach ?>

<?php require __DIR__ . '/../../footer.php'; ?>
