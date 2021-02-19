<?php

require __DIR__ . '/../../header.php';

if (!isset($_SESSION['loggedIn'])) {
    redirect('/public/front/users/gui-ls-login.php');
}

$commentId = (int)$_GET['comment_id'];
$postId = (int)$_GET['post_id'];
$comments = fetchComment($commentId, $pdo);

foreach ($comments as $comment) : ?>

    <article>
        <h1>Reply to this comment:</h1>
        <br>
        <div class="card">
            <h5 class="card-header">by: <?= fetchAlias($comment['user_id'], $pdo); ?></h5>
            <div class="card-body">
                <p class="card-text"><?= $comment['text'] ?></p>
                <span class="badge bg-dark author-tag">Created @ <?= $comment['comment_created'] ?></span>
            </div>
        </div>
        <br>

        <form action="/public/back/comments/reply-cmnt.php" method="post">
            <div class="form-group">
                <input type="hidden" name="comment-id" id="comment-id" value="<?= $comment['id'] ?>">
                <input type="hidden" name="post-id" id="post-id" value="<?= $postId ?>">
                <label for="article">Leave a reply to <?= fetchAlias($comment['user_id'], $pdo); ?>:</label>
                <textarea class="form-control" type="text" name="reply" id="reply" rows="3" maxlength="300" required></textarea>
                <small>(Maximum length is 300 characters long.)</small>
            </div><!-- /form-group -->

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
        </div>
    </article>

<?php endforeach; ?>
